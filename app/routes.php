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
    $total = Donor::sum('pledge_amount');
    $percent = intval(($total/750000)*100);
    $total = number_format($total);
	return View::make('index')
        ->with('percent', $percent)
        ->with('total', $total);
});

Route::get('plans', function() {
    echo 'Page coming soon. <a href="/">Return to homepage</a>';
});

Route::get('help', function() {
    return View::make('help');});

Route::get('scenarios', function() 
{
    return View::make('scenarios');
});

Route::get('donors', function() {
    return View::make('donors');
});


//
// Login and logout
//

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
        })
);

Route::get('logout', function() {
    Auth::logout();
    Session::flash('success_message', 'Goodbye!');
    return Redirect::to('/');
});


//
// Admin pages
//

Route::get('dashboard', 'DashboardController@dashboard');

Route::get ('donor-admin', function() {
        $donors = Donor::get();

        return View::make('donor-admin')
            ->with('donors', $donors);
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


 //Route::resource('donors', 'DonorController');

Route::resource('updates', 'PostsController');



// Route::get('/debug', function() {

//     echo '<pre>';

//     echo '<h1>environment.php</h1>';
//     $path   = base_path().'/environment.php';

//     try {
//         $contents = 'Contents: '.File::getRequire($path);
//         $exists = 'Yes';
//     }
//     catch (Exception $e) {
//         $exists = 'No. Defaulting to `production`';
//         $contents = '';
//     }

//     echo "Checking for: ".$path.'<br>';
//     echo 'Exists: '.$exists.'<br>';
//     echo $contents;
//     echo '<br>';

//     echo '<h1>Environment</h1>';
//     echo App::environment().'</h1>';

//     echo '<h1>Debugging?</h1>';
//     if(Config::get('app.debug')) echo "Yes"; else echo "No";

//     echo '<h1>Database Config</h1>';
//     print_r(Config::get('database.connections.mysql'));

//     echo '<h1>Test Database Connection</h1>';
//     try {
//         $results = DB::select('SHOW DATABASES;');
//         echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
//         echo "<br><br>Your Databases:<br><br>";
//         print_r($results);
//     } 
//     catch (Exception $e) {
//         echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
//     }

//     echo '</pre>';

// });
