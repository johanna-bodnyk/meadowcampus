<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('function-test', function() {
//     $test = imAFunction();
//     return $test;
// });


Route::get('/', function()
{
	return View::make('index');
});

Route::get('pledge', function() 
{
    return View::make('pledge');
});

Route::get('scenarios', function() 
{
    return View::make('scenarios');
});


Route::get('faqs', function() 
{
    return View::make('faqs');
});

Route::get('login', 
    array(
        'before' => 'guest',
        function() {
            return View::make('login');
        })
);

Route::post('login',
    array(
        'before' => 'csrf|guest', 
        function() {
            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials)) {
                Session::flash('success_message', 'Welcome back, '.Auth::user()->first_name.'!');
                return Redirect::intended('/');
            }
            else {
                Session::flash('error_message', 'Log in failed, please try again.');
                return Redirect::to('/login');

            }
        }
    )
);

Route::get('logout', function() {
    Auth::logout();
    Session::flash('success_message', 'Goodbye!');
    return Redirect::to('/');
});

Route::get('addimage', function () {
    return View::make('addimage');
});

Route::post('process-addimage', function () {

    $filename = Input::file('file')->getClientOriginalName();
    Input::file('file')->move(public_path().'/images/posts', $filename);

    $image = new Image();
    $image->filename = $filename;
    $image->post_id = 2;
    $image->save();

    echo '<img src="'.$image->getFullPath().'">';

});


// Database-driven sections use RESTful routing

Route::resource('donors', 'DonorController');

Route::resource('updates', 'PostsController');


Route::get('progress/edit', function() 
{

});

Route::post('progress/edit', function() 
{

});
