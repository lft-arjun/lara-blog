<?php
use Database\Storage\Comment\EloquentCommentRepository as CommentRepo;

class CommentController extends \BaseController
{
	protected $comment;

	public function __construct(CommentRepo $comment)
	{
		$this->comment = $comment;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$comments = $this->comment->all();
		return View::make('comments.list' , compact('comments'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('comments.create');
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
	        $validation = Validator::make($input, Comment::$rules);

	        if ($validation->passes())
	        {
	        	$input['user_id'] = Auth::id();
	        	$input['post_id'] = $input['post_id'];
	            $this->comment->create($input);

	            return Redirect::route('/')->with('message', ' commented .');
	        }

	        return Redirect::route('post.show', Input::only('post_id'))
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
		$comment = $this->comment->find($id);
		return Response::json(array('comment' => $comment->body));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->comment->destroy($id);
		return Response::json(array('status' => true));
	}


}
