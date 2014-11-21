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
 //    $total = Donor::sum('pledge_amount');
 //    $percent = intval(($total/750000)*100);
 //    $total = number_format($total);
	// return View::make('index')
 //        ->with('percent', $percent)
 //        ->with('total', $total);

    return View::make('help1');
});

Route::get('plans', function() {
    echo 'Page coming soon. <a href="/">Return to homepage</a>';
});

Route::get('help/{page?}', function($page = 1) {
    $total = Donor::sum('pledge_amount');
    $percent = intval(($total/750000)*100);
    $remainder = number_format(750000-$total);
    $total = number_format($total);
    $number = Donor::where('pledge_made_flag', '=', true)->count();
    return View::make('help'.$page)
        ->with('percent', $percent)
        ->with('total', $total)
        ->with('remainder', $remainder)
        ->with('number', $number);
});

Route::get('scenarios', function() 
{
    return View::make('scenarios');
});

Route::get('donors', function() {
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
