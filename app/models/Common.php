<?php
/**
* This is common model class that used to store
* most of common use code
*
* @package Model
* @author Arjun Sunar<arjunkoid@gmail.com>
* @license http://codersblog.herokuapp.com
*/
class Common
{
	
	public function __construct()
	{
		// code...
	}

	public static function loginValidation()
	{
		$messages = array(
    	'email.required' => 'We need to know your email address',
    	'password.required' => 'You have to set a password',
 		);
		$rules = array(
		    'email' => 'required|email',
		    'password' => 'required',
	    );

	    $validation['messages'] = $messages;
	    $validation['rules'] = $rules;

	    return $validation;
	}
}