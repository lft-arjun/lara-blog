<?php namespace Database\Storage\User;

use Database\Storage\Interfaces\RepositoryInterface;
use User;
 
class EloquentUserRepository implements RepositoryInterface {
 
  public function all()
  {
    return User::where('is_active', '=', 1)->orderBy('created_at', 'desc')->get();
  }
 
  public function find($id)
  {
    return User::find($id);
  }
 
  public function create($input)
  {
    return User::create($input);
  }

  public function destroy($ids)
  {
    return User::destroy($ids);
  }

  public function update($id, $input)
  {
    $user = User::find($id);
    return $user->update($input);
  }
 
}