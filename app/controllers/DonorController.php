<?php

class DonorController extends \BaseController {

	public function __construct() {

        parent::__construct();

		$this->beforeFilter('auth',
			array('except' => array('getIndex')));

	}

	
    public function getIndex() {
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
            $group = Donor::group($group_name)->orderBy('last_name')->get();
            $count = $group->count();
            $amount = $group->sum('pledge_amount');
            $groups[$group_name] = $group;
            $total['count'] += $count;
            $total['amount'] += $amount;
        }

        // Get monthly amount based on total
        $i = .05/12;
        $n = 120;
        $fv = $total['amount'];
        $pmt = (($fv*$i) / (1-pow(1+$i, $n))) * -1;

        $percent = intval(($total['amount']/750000)*100);
        $total['monthly'] = number_format($pmt);
        $total['amount'] = number_format($total['amount']);
        
        return View::make('donors')
            ->with('groups', $groups)
            ->with('total', $total)
            ->with('percent', $percent);
    }

    public function getAdmin() {
        $donors = Donor::get();

        return View::make('donors-admin')
            ->with('donors', $donors);
    }

    public function getEdit($id) {
        try {
            $donor = Donor::findOrFail($id);
        }
        catch (Exception $e) {
            Session::flash('error_message', 'A donor with the id '.$id.' does not exist');
            return Redirect::to('donors/admin');
        }
        return View::make('donors-edit')
            ->with('donor', $donor);
    }

    public function postEdit($id) {
        try {
            $donor = Donor::findOrFail($id);
        }
        catch (Exception $e) {
            Session::flash('error_message', 'A donor with the id '.$id.' does not exist');
            return Redirect::to('donor-admin');
        }

        $fields = Input::except('_token');
        
        if(!Input::has('pledge_made_flag')) { $fields['pledge_made_flag'] = 0; }
        if(!Input::has('display')) { $fields['display'] = 0; }

        foreach($fields as $field => $value) {
            $donor->$field = $value;
        }

        $donor->save();

        Session::flash('success_message', 'Donor '.$donor->first_name.' '.$donor->last_name.' has been updated.');
        return Redirect::to('donors/admin');  
    }

}
