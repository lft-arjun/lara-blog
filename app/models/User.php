<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $guarded = array('id');
 	protected $fillable = array('first_name', 'last_name', 'email', 'password', 'is_active',
 	 'role' ,'created_at');

 	public static $rules = array(
	    'email' => 'unique:users,email|required',
	    'password' => 'required|min:5',
  	);

 	public function posts()
    {
    	return $this->hasMany('Post','author_id');
    }
	public function comments()
	{
    	return $this->hasMany('Comment','user_id');
   	}

   	public function can_post()
	{
		$role = $this->role;
		if($role == 'author' || $role == 'admin')
		{
		  return true;
		}
		return false;
	}
	public function is_admin()
	{
		$role = $this->role;
		if($role == 'admin')
		{
		  return true;
		}
		return false;
	}
  	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return "remember_token";
	}

	public function getReminderEmail()
	{
		return $this->email;
	}


}
