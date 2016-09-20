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
    $feed = new SimplePie();
    $feed->set_feed_url('http://circleschool.org/blog/meadow-campus/feed/');
    $feed->set_cache_location('./simplepie_cache');
    $feed->init();
    $feed->handle_content_type();
    // TODO: Set cache duration?

    $posts = [];
    for ($i = 0; $i < 3; $i++) {
        $item = $feed->get_item($i);

        // Get the first image from the content
        $content = new DOMDocument('1.0');
        $content->loadHTML($item->get_content());
        $images = $content->getElementsByTagName('img');
        $image = '';
        if ($images->length > 0) {
            $image = $images->item(0)->getAttribute('src');
        }

        // Get a teaser that breaks on a space
        $text_content = strip_tags($item->get_description());
        $breakpoint = strpos($text_content, " ", 100);
        $teaser = substr($text_content, 0, $breakpoint);

        // Get a link to the full post
        $guid = urlencode($item->get_id()); // guid is a url
        $link = "/updates/show?index=".$i."&guid=".$guid;

        // TODO
        //  -- Format date
        //  -- Crop and resize image thumbnails server-side

        $posts[] = [
            'title' => $item->get_title(),
            'date' => $item->get_gmdate('F j, Y'),
            'teaser' => $teaser,
            'image' => $image,
            'link' => $link
        ];
    }

    return View::make('index')
        ->with('posts', $posts);
});


/**
 * Fundraising Section
 */

Route::get('help/{page?}', function($page = 1) {
    if($page == 7) {
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
    }
    elseif ($page == 8) {
        $total = Donor::sum('pledge_amount');
        $remainder = number_format(750000-$total);
        return View::make('help'.$page)
            ->with('remainder', $remainder);
    }
    elseif ($page == 9) {
        $number = Donor::where('pledge_made_flag', '=', true)->count();
        return View::make('help'.$page)
            ->with('number', $number);
    }
    else {
        return View::make('help'.$page);
    }
});

Route::get('scenarios', function() 
{
    return View::make('scenarios');
});

/**
 * About the Project Section
 */

Route::get('meadowcam', function() {
    $images = [
        "http://tunnel.boran.name/meadowcam_2016-09-16_13-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-16_14-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-16_15-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-16_16-00-02.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-16_17-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-16_18-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-16_19-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-17_07-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-17_08-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-17_09-00-02.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-17_10-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-17_11-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-17_12-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-17_13-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-17_14-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-17_15-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-17_16-00-01.jpeg",
        "http://tunnel.boran.name/meadowcam_2016-09-17_17-00-01.jpeg"
    ];
    $gallery = [];

    for ($i = 0; $i < count($images); $i++) {
        $gallery[] = [
            'thumbnail' => $images[$i],
            'image' => $images[$i],
            'title' => 'GET MODIFIED DATE'
        ];
    }

    $video = "http://tunnel.boran.name/testtimelapse.mp4";
    $latest = "http://tunnel.boran.name/meadowcam_latest.jpeg";

    return View::make('meadowcam')
        ->with('latest', $latest)
        ->with('video', $video)
        ->with('gallery', $gallery);
});

Route::get('updates/show', 'NewPostsController@show');
Route::get('updates', 'NewPostsController@index');

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
