<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
|
*/

/**
 * Homepage
 */

Route::get('/', function()
{
    return View::make('index');
});


/**
 * Fundraising Section
 */

// Route::get('campaign', function() 
// {
//     return View::make('campaign');
// });

Route::get('scenarios', function() 
{
    return View::make('scenarios');
});

/**
 * About the Project Section
 */

// Route::get('project', function() 
// {
//     return View::make('project');
// });


Route::get('meadowcam', function() 
{
    return View::make('meadowcam-iframe');
});

Route::get('video', function() 
{
    return View::make('video');
});

// Route::get('meadowcam/latest', 'MeadowcamController@latest');
// Route::get('meadowcam/get-latest-image', 'MeadowcamController@getLatestImage'); // Used by AJAX call
// Route::get('meadowcam', 'MeadowcamController@index');

// Route::get('updates/show', 'NewPostsController@show');
// Route::get('updates', 'NewPostsController@index');

// Route::get('updates/confirm-delete/{id}', 'PostsController@confirmDestroy');
// Route::resource('updates', 'PostsController');


/**
 * Login and Logout
 */

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


/**
 * Admin Pages
 */

Route::get('dashboard', 'DashboardController@getIndex');

Route::get('donors/admin', 'DonorController@getAdmin');

Route::get('donors/add', 'DonorController@getCreate');

Route::post('donors/add', 'DonorController@postCreate');

Route::get('donors/edit/{id}', 'DonorController@getEdit');

Route::post('donors/edit/{id}', 'DonorController@postEdit');

Route::get('donors/confirm-delete/{id}', 'DonorController@getConfirmDelete');

Route::post('donors/delete/{id}', 'DonorController@postDelete');

Route::get('donors/{display?}', 'DonorController@getIndex');



/**
 * Image uploading and deletion used by AJAX calls
 */

// Saves image to disk, does not add to database 
// (handled by post saving controller)
Route::post('image-upload', 
    array(
        'before' => 'auth', 
        function() {
            $filename = Input::file('file')->getClientOriginalName();
            Input::file('file')->move(public_path().'/images/posts', $filename);
            return $filename;
        })
);

// Removes file from disk, deletes from database
Route::post('image-delete', 
    array(
        'before' => 'auth',
        function() {
            $filename = Input::get('filename');
            File::delete(public_path().'/images/posts/'.$filename);
            Image::where('filename', "=", $filename)->delete();
            return $filename;
        })
);




/**
 * Debugging and development routes
 * TODO: Delete before deploy
 */


// Route::get('password-update', function() {
//     $user = User::where('email','=','bodnyk@gmail.com')->firstOrFail();
//     $user->password = Hash::make('p@ssw0rd');
//     $user->save();
// });



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
