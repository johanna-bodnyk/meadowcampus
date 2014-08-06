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

Route::get('function-test', 'HomeController@functionTest');


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
    $donors = Donor::all();

    return View::make('donors')
        ->with('donors', $donors);

});

Route::get('updates', function() 
{

});

Route::get('login', function() {
    return View::make('login');
});

Route::post('login',
    array(
        'before' => 'csrf', 
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

Route::get('progress/edit', function() 
{

});

Route::post('progress/edit', function() 
{

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

            Session::flash('success_message', 'Donor '.$donor->first_name.' '.$donor->last_name.' has been added.');

            return Redirect::to('donors');

        }
    )
);

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

// TEST ROUTES

// Route::get('add_donor', function() {
//     $donor = new Donor();

//     $donor->first_name  =   "Johanna";
//     $donor->last_name   =   "Bodnyk";
//     $donor->save();

//     MISSING USER ID

//     return "Great you added a donor!";

// });

Route::get('read_donors', function() {
    $donors = Donor::all();

    var_dump($donors->toArray());
});

Route::get('update_donors', function() {
    $donor = Donor::find(1);
    $donor->first_name = "Catherine";
    $donor->save();

});

Route::get('delete_donor', function() {
    $donor = Donor::find(2);
    $donor->delete();
});

// DEBUG ROUTE

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});


// Trigger error

Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;

});



// Add admin user route -- uncomment and change values to add an admin user

Route::get('add_admin_user', function() {

    return "This is in a seeder now.";

});