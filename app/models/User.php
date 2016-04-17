<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use app\Models\Traits\Relationship\UserRelationship;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, UserRelationship;

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
 	  	
}
