<?php

class PostsController extends \BaseController {

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
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

	    return View::make('posts')
            ->with('posts',$posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('add-post');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$post = new Post();
        $post->title = Input::get('title');
        $post->body = Input::get('body');
        $post->user()->associate(Auth::user());
        $post->save();

        Session::flash('success_message', 'Post successfully added!');
        return Redirect::to('updates');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $posts = Post::whereId($id)->with('user')->get();

        return View::make('posts')
            ->with('posts',$posts);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	    try {
	        $post = Post::findOrFail($id);
	    }
	    catch (Exception $e) {
	        Session::flash('error_message', 'An update with the id '.$id.' does not exist.');
	        return Redirect::to('updates');
	    }

	    return View::make('edit-post')
	        ->with('post', $post);
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
            $post = Post::findOrFail($id);
        }
        catch (Exception $e) {
            Session::flash('error_message', 'An update with the id '.$id.' does not exist.');
            return Redirect::to('updates');
        }

        $post->title = Input::get('title');
        $post->body = Input::get('body');
        $post->save();

        Session::flash('success_message', 'Your post has been updated.');
        return Redirect::to('updates');	
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
            $post = Post::findOrFail($id);
        }
        catch (Exception $e) {
            Session::flash('error_message', 'An update with the id '.$id.' does not exist.');
            return Redirect::to('updates');
        }

        Session::flash('success_message', "Your update has been successfully deleted.");
        $post->delete();
        return Redirect::to('updates');
	}


}
