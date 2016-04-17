<?php
use Database\Storage\User\EloquentUserRepository as UserRepo;

class UserController extends \BaseController
{

	protected $user;

	public function __construct(UserRepo $user)
	{
		$this->user = $user;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('users.index');
	}

	public function login()
	{
		$input = Input::all();
		$messages = array(
    	'email.required' => 'We need to know your email address',
    	'password.required' => 'You have to set a password',
 		);
		$rules = array(
		    'email' => 'required|email',
		    'password' => 'required',
	    );

		// if ($validation->fails())
		$input = Input::all();

		if ($this->isPostRequest()) {
 			$validation = Validator::make($input, $rules, $messages);
			if ($validation->passes()) {
				if (Auth::attempt(Input::only('email', 'password'))) {
				    return Redirect::route('/');
				} else {
					 return Redirect::to('login')->with('message', 'Username or Password invalid');
				}
			}
			return Redirect::to('login')->withInput()
	            ->withErrors($validation)
	            ->with('message', 'Email or password can not be empty.');
		}
		return View::make('users.login');
	}
	/**
	*
	**/
	public function logout()
	{
		Auth::logout();

    	return Redirect::to('/')->with('message', 'You are successfully logged out.');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.register');
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
	        $validation = Validator::make($input, User::$rules);

	        if ($validation->passes())
	        {
	        	$input['password'] = Hash::make($input['password']);
	        	$input['is_active'] = 1;
	        	$input['role'] = strtolower($input['role']);
	            $this->user->create($input);

	            return Redirect::route('/')->with('message', 'User successfully created.');
	        }

	        return Redirect::route('users.create')
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
		//
	}

}
