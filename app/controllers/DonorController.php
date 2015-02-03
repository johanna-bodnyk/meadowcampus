<?php

class DonorController extends \BaseController {

	public function __construct() {

        parent::__construct();

		$this->beforeFilter('auth',
			array('except' => array('getIndex')));

	}

	
    public function getIndex($display = 'standard') {
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

        $inaugural = false;

        foreach ($groups as $group_name => $group_values) {
            $group = Donor::group($group_name)->orderBy('last_name')->get();
            $count = $group->count();
            $amount = $group->sum('pledge_amount');
            $groups[$group_name] = $group;
            $total['count'] += $count;
            $total['amount'] += $amount;
            if (in_array(true, $group->lists('inaugural'))) {
                $inaugural = true;
            }
        }

        // Get monthly amount based on total
        $i = .05/12;
        $n = 120;
        $fv = $total['amount'];
        $pmt = (($fv*$i) / (1-pow(1+$i, $n))) * -1;

        $percent = intval(($total['amount']/750000)*100);
        $total['monthly'] = number_format($pmt);
        $total['amount'] = number_format($total['amount']);
        

        $view = (($display == 'display') ? 'donors-display' : 'donors');

        return View::make($view)
            ->with('groups', $groups)
            ->with('total', $total)
            ->with('percent', $percent)
            ->with('inaugural', $inaugural);


}

    // public function setDisplayNames() {
    //     $donors = Donor::where('display', true)->get();

    //     foreach($donors as $donor) {
    //         $donor->display_name = $donor->first_name." ".$donor->last_name;
    //         $donor->save();
    //     }
    // }

    public function getAdmin() {
        $donors = Donor::orderBy('pledge_amount', 'desc')->get();

        return View::make('donors-admin')
            ->with('donors', $donors);
    }

    public function getCreate() {
        return View::make('donors-form');
    }

    public function postCreate()
    {

        $donor = new Donor();
        $fields = Input::except('_token');
        
        if(!Input::has('pledge_made_flag')) { $fields['pledge_made_flag'] = 0; }
        if(!Input::has('display')) { $fields['display'] = 0; }
        if(!Input::has('inaugural')) { $fields['inaugural'] = 0; }

        foreach($fields as $field => $value) {
            $donor->$field = $value;
        }

        $donor->save();

        Session::flash('success_message', 'Donor '.$donor->first_name.' '.$donor->last_name.' has been added.');
        return Redirect::to('donors/admin');  
    }

    public function getEdit($id) {
        try {
            $donor = Donor::findOrFail($id);
        }
        catch (Exception $e) {
            Session::flash('error_message', 'A donor with the id '.$id.' does not exist');
            return Redirect::to('donors/admin');
        }
        return View::make('donors-form')
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
        if(!Input::has('inaugural')) { $fields['inaugural'] = 0; }

        foreach($fields as $field => $value) {
            $donor->$field = $value;
        }

        $donor->save();

        Session::flash('success_message', 'Donor '.$donor->first_name.' '.$donor->last_name.' has been updated.');
        return Redirect::to('donors/admin');  
    }

    public function getConfirmDelete($id)
    {
        try {
            $donor = Donor::findOrFail($id);
        }
        catch (Exception $e) {
            Session::flash('error_message', 'An donor with the id '.$id.' does not exist.');
            return Redirect::to('donors/admin');
        }    

        return View::make('donor-delete')
            ->with('donor', $donor);
    }

    public function postDelete($id)
    {
        try {
            $donor = Donor::findOrFail($id);
        }
        catch (Exception $e) {
            Session::flash('error_message', 'An donor with the id '.$id.' does not exist.');
            return Redirect::to('donors/admin');
        }

        Session::flash('success_message', $donor->first_name.' '.$donor->last_name.' has been successfully deleted.');
        $donor->delete();

        return Redirect::to('donors/admin');
    }

}
