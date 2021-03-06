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
		$rulesAndMessage = Common::loginValidation();
		$rules = $rulesAndMessage['rules'];
		$messages = $rulesAndMessage['messages'];
		if ($this->isPostRequest()) {
 			$validation = Validator::make($input, $rules, $messages);
			if ($validation->passes()) {
				if (Auth::attempt(Input::only('email', 'password'))) {
				    return Redirect::route('/')->with('message', Lang::get('messages.login'));
				} else {
					 return Redirect::to('login')->with('message', Lang::get('messages.user_invalid'));
				}
			}
			return Redirect::to('login')->withInput()
	            ->withErrors($validation)
	            ->with('message', Lang::get('messages.empty_input'));
		}
		return View::make('users.login');
	}
	/**
	*
	**/
	public function logout()
	{
		Auth::logout();

    	return Redirect::to('/')->with('message', Lang::get('messages.logout'));
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

	            return Redirect::route('/')->with('message', Lang::get('messages.register'));
	        }

	        return Redirect::route('users.create')
	            ->withInput()
	            ->withErrors($validation)
	            ->with('message', Lang::get('messages.valiation_error'));
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
