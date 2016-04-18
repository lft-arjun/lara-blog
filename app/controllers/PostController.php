<?php
use Database\Storage\Post\EloquentPostRepository as PostRepo;

class PostController extends \BaseController
{
	/**
	*@var post
	**/
	protected $post;

	public function __construct(PostRepo $post)
	{
		$this->post = $post;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Search params
		$search = (!empty(Input::only('search'))) ? Input::only('search')['search'] : null;

		$posts = $this->post->all($search);
		return View::make('posts.index')->with(array('posts' =>$posts, 'search' => $search));
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
	 * @todo resize uploaded file and need to add extension validation
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
	        	if (Input::hasFile('image'))
				{
				    $file = Input::file('image');
				    $fileName = $fileName = $file->getFilename() . '' .$file->getClientOriginalExtension();
				    $file->move(public_path().'/uploads/', $fileName);
				    $input['image'] = $fileName;
				}
	        	$input['is_active'] = 1;
	        	$input['author_id'] = Auth::id();
	            $this->post->create($input);

	            return Redirect::route('/')->with('message', Lang::get('messages.post_save'));
	        }
	       
	        return Redirect::route('posts.create')
	            ->withInput()
	            ->withErrors($validation)
	            ->with('message', Lang::get('messages.validation_error'));
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
		if(!is_numeric($id)) {
			return Redirect::route('/')->with('message', Lang::get('messages.record_not_found'));
		}

		$post = $this->post->find($id);
		return View::make('posts.show' , compact('post'));

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->post->find($id);
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
			//Check input are valid or not
			if ($validation->passes()) {
				//Check file is uploaded of not
				if (Input::hasFile('image'))
				{
				    $file = Input::file('image');
				    $fileName = $file->getFilename() . '.' .$file->getClientOriginalExtension();
				    $file->move(public_path().'/uploads/', $fileName);
				    $input['image'] = $fileName;
				}
				$input['is_active'] = isset($input['is_active']) ? 1 : 0;
				$this->post->update($id, $input);
				return Redirect::route('/')->with('message',Lang::get('messages.post_update'));
			}
			return Redirect::route("post.edit", $id)
	            ->withInput()
	            ->withErrors($validation)
	            ->with('message', Lang::get('messages.validation_error'));
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
		$this->post->destroy($id);
		return Redirect::route('posts.list')->with('message', Lang::get('messages.post_delete'));
	}
	/**
	 * List all the posts.
	 *
	 * @return Response
	 */
	public function bloglist()
	{
		$posts = $this->post->all();
		return View::make('posts.list' , compact('posts'));
	}

}
