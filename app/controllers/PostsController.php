<?php

class PostsController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('auth',
			array('except' => array('index', 'show')));
		$this->beforeFilter('csrf',
			array('on' => ['store','update','delete']));
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Auth::check()) {
            $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        }
        else {
            $posts = Post::where('published', '=', true)->with('user')->orderBy('created_at', 'desc')->get();
        }
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
        return View::make('post-form');
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
        $post->author = Input::get('author');
        $post->post_date = Input::get('post_date');
        if(Input::has('published')) $post->published = true;
        else $post->published = false;
        $post->user()->associate(Auth::user());
        $post->save();

        $images = Input::get('images');

        if($images) {
            foreach ($images as $filename) {
                    $image = new Image();
                    $image->filename = $filename;
                    $post->images()->save($image);
            }
        }

        Session::flash('success_message', 'Post successfully added!');
        return Redirect::to('updates/'.$post->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        try {
            $post = Post::with('user')->findOrFail($id);
        }
        catch (Exception $e) {
            Session::flash('error_message', 'An update with the id '.$id.' does not exist.');
            return Redirect::to('updates');
        }
        if ($post->published || Auth::check())  {
            return View::make('post')
                ->with('post',$post);
        }
        else {
            return Redirect::to('login');
        }
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
	        $post = Post::with('images')->findOrFail($id);
	    }
	    catch (Exception $e) {
	        Session::flash('error_message', 'An update with the id '.$id.' does not exist.');
	        return Redirect::to('updates');
	    }

	    return View::make('post-form')
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
        $post->author = Input::get('author');
        $post->post_date = Input::get('post_date');
        if(Input::has('published')) $post->published = true;
        else $post->published = false;
        $post->save();

        $images = Input::get('images');

        if($images) {
            foreach ($images as $filename) {
                    $image = new Image();
                    $image->filename = $filename;
                    $post->images()->save($image);
            }
        }

        Session::flash('success_message', 'Your post has been updated.');
        return Redirect::to('updates/'.$post->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function confirmDestroy($id)
    {
        try {
            $post = Post::findOrFail($id);
        }
        catch (Exception $e) {
            Session::flash('error_message', 'An update with the id '.$id.' does not exist.');
            return Redirect::to('updates');
        }    

        return View::make('post-delete')
            ->with('post', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
	{
        try {
            $post = Post::with('images')->findOrFail($id);
        }
        catch (Exception $e) {
            Session::flash('error_message', 'An update with the id '.$id.' does not exist.');
            return Redirect::to('updates');
        }

        if($post->images->count()) {
            foreach ($post->images as $image) {
                File::delete(public_path().'/images/posts/'.$image->filename);
                $image->delete();
            }
        }

        Session::flash('success_message', "Your update has been successfully deleted.");
        $post->delete();
        return Redirect::to('updates');
	}


}
