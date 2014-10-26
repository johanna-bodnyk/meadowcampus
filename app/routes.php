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

//
// Login and logout
//

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




//
// Image uploading and deletion used by AJAX calls
//


// Saves image to disk, does not add to database 
// (handled by post saving controller)
Route::post('image-upload', function() {
    $filename = Input::file('file')->getClientOriginalName();
    Input::file('file')->move(public_path().'/images/posts', $filename);
    return $filename;
});

// Removes file from disk, deletes from database
Route::post('image-delete', function() {
    $filename = Input::get('filename');
    File::delete(public_path().'/images/posts/'.$filename);
    Image::where('filename', "=", $filename)->delete();
    return $filename;
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
