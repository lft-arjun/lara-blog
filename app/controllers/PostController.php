<?php

class PostController extends \BaseController {

	public function __construct()
	{

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $d = User::find(Auth::id())->is_admin();
		
		// dd($d);
		$posts = Post::all();
		return View::make('posts.index' , compact('posts'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ($this->isPostRequest()) {
			//get all the post data from the form
			$input = Input::all();
	        $validation = Validator::make($input, Post::rules('create'));

	        if ($validation->passes())
	        {
	        	$input['is_active'] = 1;
	        	$input['slug'] = 3;
	        	$input['author_id'] = Auth::id();
	            Post::create($input);

	            return Redirect::route('/')->with('message', 'User successfully created.');
	        }
	       
	        return Redirect::route('posts.create')
	            ->withInput()
	            ->withErrors($validation)
	            ->with('message', 'There were validation errors.');
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		if (is_null($post)) {
			return Redirect::route('users.index')->with('message', 'Invalid Id found');
		}
		// return View::make('users.edit', compact('user'));
		return View::make('posts.edit')->with('post', $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if ($this->isPostRequest()) {
			$input = Input::all();
	
			$validation = Validator::make($input, Post::$rules);
			if ($validation->passes()) {
				$post = Post::find($id);
				$post->update($input);
				return Redirect::route('/')->with('message',"Record $id has updated successfully.");
			}
			return Redirect::route("post.edit", $id)
	            ->withInput()
	            ->withErrors($validation)
	            ->with('message', 'There were validation errors.');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::find($id)->delete();
		return Redirect::route('/')->with('message', "Record $id has deleted successfully.");
	}

	// protected function isPostRequest()
 //    {
 //   		return Input::server("REQUEST_METHOD") == "POST";
 //    }


}