<?php

class DonorController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('auth',
			array('except' => array('index')));

		$this->beforeFilter('csrf',
			array('on' => 'post'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $donors = Donor::with('types','user')->orderBy('last_name','asc')->get();

	    return View::make('donors')
	        ->with('donors', $donors);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $types = Type::all();

        return View::make('add-donor')
            ->with('types', $types);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
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


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// This functionality is not needed for this application (individual donors are not displayed)
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
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
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try {
            $donor = Donor::findOrFail($id);
        }
        catch (Exception $e) {
            Session::flash('error_message', 'A donor with the id '.$id.' does not exist.');
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

    // TODO: Figure out how to implement deletion confirm page with restful routing
	// Route::get('donors/delete/{id}', function($id) 
	// {
	//     try {
	//         $donor = Donor::findOrFail($id);
	//     }
	//     catch (Exception $e) {
	//         Session::flash('error_message', 'A donor with the id '.$id.' does not exist.');
	//         return Redirect::to('donors');
	//     }

	//     return View::make('delete-donor')
	//         ->with('donor', $donor);
	// });

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try {
            $donor = Donor::findOrFail($id);
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


}
