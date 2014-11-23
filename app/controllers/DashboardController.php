<?php

class DashboardController extends \BaseController {

	public function __construct() {

        parent::__construct();

		$this->beforeFilter('auth');
    }

    public function getIndex() {
        
        ////
        // Graph 1 - The Area chart with donations over time
        ////
        $q_graph1 = "
            SELECT
                pledge_date
                , DATE_FORMAT(CASE WHEN pledge_date IS NOT NULL THEN pledge_date ELSE CURDATE() END, '%d') AS day
                , DATE_FORMAT(CASE WHEN pledge_date IS NOT NULL THEN pledge_date ELSE CURDATE() END, '%m') AS month
                , DATE_FORMAT(CASE WHEN pledge_date IS NOT NULL THEN pledge_date ELSE CURDATE() END, '%Y') AS year
                , SUM(CASE WHEN donor_group = 'Alumni' THEN pledge_amount ELSE 0 END) AS alumni
                , SUM(CASE WHEN donor_group = 'Alumni Families' THEN pledge_amount ELSE 0 END) AS alumni_families
                , SUM(CASE WHEN donor_group = 'Current Students' THEN pledge_amount ELSE 0 END) AS current_students
                , SUM(CASE WHEN donor_group = 'Current Families' THEN pledge_amount ELSE 0 END) AS current_families
                , SUM(CASE WHEN donor_group = 'Friends' THEN pledge_amount ELSE 0 END) AS friends
                , SUM(CASE WHEN donor_group = 'Staff' THEN pledge_amount ELSE 0 END) AS staff
            FROM
                donors
            WHERE
                pledge_amount > 0
            GROUP BY
                pledge_date
                , DATE_FORMAT(CASE WHEN pledge_date IS NOT NULL THEN pledge_date ELSE CURDATE() END, '%d')
                , DATE_FORMAT(CASE WHEN pledge_date IS NOT NULL THEN pledge_date ELSE CURDATE() END, '%m')
                , DATE_FORMAT(CASE WHEN pledge_date IS NOT NULL THEN pledge_date ELSE CURDATE() END, '%Y')
            ORDER BY
                DATE_FORMAT(CASE WHEN pledge_date IS NOT NULL THEN pledge_date ELSE CURDATE() END, '%Y') ASC
                , DATE_FORMAT(CASE WHEN pledge_date IS NOT NULL THEN pledge_date ELSE CURDATE() END, '%m') ASC
                , DATE_FORMAT(CASE WHEN pledge_date IS NOT NULL THEN pledge_date ELSE CURDATE() END, '%d') ASC
        ";
        
        $q_graph1 = DB::raw($q_graph1);
        $result1 = DB::select($q_graph1);
     
        $graph1_data = "";
        $alumni = 0;
        $alumni_families = 0;
        $current_students = 0;
        $current_families = 0;
        $friends = 0;
        $staff = 0;

        foreach($result1 as $row) {
            $alumni += $row->alumni;
            $alumni_families += $row->alumni_families;
            $current_students += $row->current_students;
            $current_families += $row->current_families;
            $friends += $row->friends;
            $staff += $row->staff;
            $graph1_data .= "data.addRow([new Date(" . $row->year . ", " . $row->month . ", " . $row->day . "), $alumni, $alumni_families, $current_students, $current_families, $friends, $staff]); ";
        }
           
        ////
        // Graph 2 - Number of pledges by group
        ////
        $q_graph2 = "
            SELECT
                donor_group
                , SUM(CASE WHEN pledge_amount > 0 AND pledge_made_flag = 1 THEN 1 ELSE 0 END) AS pledges
                , SUM(CASE WHEN pledge_amount = 0 AND pledge_made_flag = 1 THEN 1 ELSE 0 END) AS no_gift
                , SUM(CASE WHEN pledge_made_flag = 0 AND target_donation > 0 THEN 1 ELSE 0 END) AS left_to_ask
            FROM
                donors
            GROUP BY
                donor_group
            ORDER BY
                SUM(CASE WHEN target_donation > 0 or pledge_made_flag = 1 THEN 1 ELSE 0 END) DESC           
         ";

        $q_graph2 = DB::raw($q_graph2);
        $result2 = DB::select($q_graph2);  
        
        $graph2_data = "";
        $i = 0;

        foreach ($result2 as $row) {
            if($i > 0){
                $graph2_data .= ", ";
            }
            $graph2_data .= "['" . $row->donor_group . "', " . $row->pledges . ", " . $row->no_gift . ", " . $row->left_to_ask ."]";
            $i += 1;        
        }
        
        ////
        // Graph 3 - Pyramid by Donor Group (Alum, Students, etc...)
        ////
        $q_graph3 = "
            SELECT
                donor_group
                , SUM(CASE WHEN target_donation > 0 OR pledge_amount > 0 THEN 1 ELSE 0 END) AS target_pledges
                , SUM(CASE WHEN pledge_amount > 0 THEN 1 ELSE 0 END) AS pledges
                , SUM(pledge_amount) AS pledge_amount
            FROM
                donors
            GROUP BY
                donor_group
            ORDER BY
                SUM(CASE WHEN target_donation > 0 OR pledge_amount > 0 THEN 1 ELSE 0 END) ASC           
        ";
        
        $q_graph3 = DB::raw($q_graph3);
        $result3 = DB::select($q_graph3); 
        
        $graph3_data = "";
        $i = 0;
        $width = 120;

        foreach ($result3 as $row) {
            if($i > 0){
                $graph3_data .= ", ";
            }
            $target = $row->target_pledges;
            $pledge_count = $row->pledges;
            $pledge_value = "$" . number_format($row->pledge_amount, 0);
            
            $pledge_label = $pledge_count . " Pledges for a Total of " . $pledge_value;
            
            if($pledge_count > $target){
                $white_size = ($width - $pledge_count) / 2;
                $green_size = ($pledge_count - $target) / 2;
                $yellow_size = 0;
                $blue_size = $target;
                $target_label = "";
            }else{
                $white_size = ($width - $target) / 2;
                $green_size = 0;
                $yellow_size = ($target - $pledge_count) / 2;
                $blue_size = $pledge_count;
                $target_label = ($target - $pledge_count) . " Left to Hit Target";
            }
            
            $graph3_data .= "['" . $row->donor_group . "'";
            $graph3_data .= ", " . $white_size . ", ' ', 'fill-opacity: .0'";
            $graph3_data .= ", " . $green_size . ", '" . $pledge_label . "'";
            $graph3_data .= ", " . $yellow_size . ", '" . $target_label . "'";
            $graph3_data .= ", " . $blue_size . ", '" . $pledge_label . "'";
            $graph3_data .= ", " . $yellow_size . ", '" . $target_label . "'";
            $graph3_data .= ", " . $green_size . ", '" . $pledge_label . "'";
            $graph3_data .= ", " . $white_size . ", ' ', 'fill-opacity: .0'";
            $graph3_data .= "]";
            
            $i += 1;
        }

        
        ////
        // Graph 4 - Pyramid by Donation Size
        ////
        $q_graph4 = "
            SELECT
                level.donor_level_label
                , SUM(CASE WHEN donor.target_donation > 0 OR donor.pledge_amount > 0 THEN 1 ELSE 0 END) AS target_pledges
                , SUM(CASE WHEN donor.pledge_amount > 0 THEN 1 ELSE 0 END) AS pledges
                , SUM(donor.pledge_amount) AS pledge_amount
            FROM
                donors donor
                    , donor_levels level
            WHERE
                (donor.target_donation > 0 OR pledge_amount > 0)
                    AND CASE WHEN pledge_amount > 0 THEN pledge_amount ELSE target_donation END BETWEEN level.minimum_amount AND level.maximum_amount
            GROUP BY
                level.donor_level_label
            ORDER BY
                level.minimum_amount DESC
        ";

        $q_graph4 = DB::raw($q_graph4);
        $result4 = DB::select($q_graph4); 
        
        $graph4_data = "";
        $i = 0;
        $width = 120;

        foreach ($result4 as $row) {
            if($i > 0){
                $graph4_data .= ", ";
            }
            $target = $row->target_pledges;
            $pledge_count = $row->pledges;
            $pledge_value = "$" . number_format($row->pledge_amount, 0);
             
            $pledge_label = $pledge_count . " Pledges for a Total of " . $pledge_value;
             
            if($pledge_count > $target){
                $white_size = ($width - $pledge_count) / 2;
                $green_size = ($pledge_count - $target) / 2;
                $yellow_size = 0;
                $blue_size = $target;
                $target_label = "";
            }else{
                $white_size = ($width - $target) / 2;
                $green_size = 0;
                $yellow_size = ($target - $pledge_count) / 2;
                $blue_size = $pledge_count;
                $target_label = ($target - $pledge_count) . " Left to Hit Target";
            }
             
            $graph4_data .= "['" . $row->donor_level_label . "'";
            $graph4_data .= ", " . $white_size . ", ' ', 'fill-opacity: .0'";
            $graph4_data .= ", " . $green_size . ", '" . $pledge_label . "'";
            $graph4_data .= ", " . $yellow_size . ", '" . $target_label . "'";
            $graph4_data .= ", " . $blue_size . ", '" . $pledge_label . "'";
            $graph4_data .= ", " . $yellow_size . ", '" . $target_label . "'";
            $graph4_data .= ", " . $green_size . ", '" . $pledge_label . "'";
            $graph4_data .= ", " . $white_size . ", ' ', 'fill-opacity: .0'";
            $graph4_data .= "]";
             
            $i += 1;
        }    

        ////
        // Data for table of number and total of pledges by group
        ////

        $groups = array(
            'Alumni' => array(),
            'Alumni Families' => array(),
            'Current Families' => array(),
            'Current Students' => array(),
            'Staff' => array(),
            'Friends' => array()
            );

        $total = array(
            'count' => 0,
            'amount' => 0
            );

        foreach ($groups as $group_name => $group_values) {
            $group = Donor::group($group_name)->get();
            $count = $group->count();
            $amount = $group->sum('pledge_amount');
            $groups[$group_name]['count'] = $count;
            $groups[$group_name]['amount'] = number_format($amount);
            $total['count'] += $count;
            $total['amount'] += $amount;
        }


        // Get monthly amount based on total
        $i = .05/12;
        $n = 120;
        $fv = $total['amount'];
        $pmt = (($fv*$i) / (1-pow(1+$i, $n))) * -1;
        $total['monthly'] = number_format($pmt);

        ////
        // Data for thermometer
        ////
        $percent = intval(($total['amount']/750000)*100);
        $total['amount'] = number_format($total['amount']);

        return View::make('dashboard')
            ->with('graph1_data', $graph1_data)
            ->with('graph2_data', $graph2_data)
            ->with('graph3_data', $graph3_data)
            ->with('graph4_data', $graph4_data)
            ->with('percent', $percent)
            ->with('total', $total)
            ->with('groups', $groups);
    }


}
