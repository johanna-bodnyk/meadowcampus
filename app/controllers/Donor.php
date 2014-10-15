<?php

class DonorController extends BaseController {

	public function __construct() {
		$this->beforeFilter('auth',
			array('except' => array('donors')));

		$this->beforeFilter('csrf',
			array('on' => 'post'));
	}


Route::get('donors', function() 
{
    $donors = Donor::with('types','user')->orderBy('last_name','asc')->get();

    return View::make('donors')
        ->with('donors', $donors);

});

Route::get('donors/add', 
    array(
        'before' => 'auth',
        function() {
            $types = Type::all();
            return View::make('add-donor')
                ->with('types', $types);
        }
    )
);

Route::post('donors/add', 
    
    array(
        'before' => 'auth|csrf',
        function() {

            $donor = new Donor();
            $donor->first_name = Input::get('first_name');
            $donor->last_name = Input::get('last_name');
            $donor->amount = Input::get('amount');
            $donor->user()->associate(Auth::user());
            $donor->save();

            // TODO: Deal with case where no types are selected
            $types = Input::get('type');
            foreach($types as $type_id) {
                $type = Type::find($type_id);
                $donor->types()->attach($type);
            }

            Session::flash('success_message', 'Donor '.$donor->first_name.' '.$donor->last_name.' has been added.');
            return Redirect::to('donors');

        }
    )
);

Route::get('donors/edit/{id}', function($id) 
{
    $types = Type::all();

    try {
        $donor = Donor::with('types','user')->findOrFail($id);
    }
    catch (Exception $e) {
        Session::flash('error_message', 'A donor with the id '.$id.' does not exist.');
        return Redirect::to('donors');
    }

    $set_types = [];
    foreach ($donor->types as $type) {
        $set_types[] = $type->id;
    }

    return View::make('edit-donor')
        ->with('donor', $donor)
        ->with('types', $types)
        ->with('set_types', $set_types);
});

Route::post('donors/edit', array(
        'before' => 'auth|csrf',
        function() {

            try {
                $donor = Donor::findOrFail(Input::get('id'));
            }
            catch (Exception $e) {
                Session::flash('error_message', 'A donor with the id '.Input::get('id').' does not exist.');
                return Redirect::to('donors');
            }

            $donor->first_name = Input::get('first_name');
            $donor->last_name = Input::get('last_name');
            $donor->amount = Input::get('amount');
            $donor->save();
            $donor->types()->detach();

            // TODO: Deal with case where no types are selected
            $types = Input::get('type');
            foreach($types as $type_id) {
                $type = Type::find($type_id);
                $donor->types()->attach($type);
            }

            Session::flash('success_message', 'Donor '.$donor->first_name.' '.$donor->last_name.' has been updated.');
            return Redirect::to('donors');

        }
    )
);

Route::get('donors/delete/{id}', function($id) 
{
    try {
        $donor = Donor::findOrFail($id);
    }
    catch (Exception $e) {
        Session::flash('error_message', 'A donor with the id '.$id.' does not exist.');
        return Redirect::to('donors');
    }

    return View::make('delete-donor')
        ->with('donor', $donor);
});

Route::post('donors/delete',
    array(
        'before' => 'auth|csrf',
        function() {
            try {
                $donor = Donor::findOrFail(Input::get('id'));
            }
            catch (Exception $e) {
                Session::flash('error_message', 'A donor with the id '.Input::get('id').' does not exist.');
                return Redirect::to('donors');
            }

            Session::flash('success_message', $donor->first_name." ".$donor->last_name." successfully deleted.");
            $donor->types()->detach();
            $donor->delete();
            return Redirect::to('donors');
        }
    )
);



}
