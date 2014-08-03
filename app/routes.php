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

Route::get('/', function()
{
	return View::make('index');
});

Route::get('pledge', function() 
{
    return View::make('pledge');
});

Route::get('plans', function() 
{

});

Route::get('donors', function() 
{

});

Route::get('updates', function() 
{

});

Route::get('progress/edit', function() 
{

});

Route::post('progress/edit', function() 
{

});

Route::get('donors/add', function() 
{

});

Route::post('donors/add', function() 
{

});

Route::get('donors/edit/{id}', function($id) 
{

});

Route::post('donors/edit', function() 
{

});

// TODO: Add donor deletion routes

Route::get('updates/add', function() 
{

});

Route::post('updates/add', function() 
{

});

Route::get('updates/edit/{id}', function($id) 
{

});

Route::post('updates/edit', function() 
{

});

// TODO: Add update deletion routes