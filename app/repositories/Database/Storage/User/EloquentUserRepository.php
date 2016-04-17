<?php namespace Database\Storage\User;

use Database\Storage\Interfaces\RepositoryInterface;
use User;
 /**
  * Class User repository For Eloquent 
  * All the DB operation handles
  */
class EloquentUserRepository implements RepositoryInterface 
{
 
    /**
     * @param  string $param
     * @return object
     */
    public function all($param = null)
    {
        return User::where('is_active', '=', 1)->orderBy('created_at', 'desc')->get();
    }
    /**
     * @param  int $id
     * @return object
     */
    public function find($id)
    {
        return User::find($id);
    }
    /**
     * @param  array $input
     * @return object
     */
    public function create($input)
    {
        return User::create($input);
    }
    /**
     * @param  int $ids
     * @return array|int
     */
    public function destroy($ids)
    {
        return User::destroy($ids);
    }
    /**
     * @param  int $id
     * @param  array $input
     * @return object
     */
    public function update($id, $input)
    {
        $user = User::find($id);
        return $user->update($input);
    }
    public function search($param = null)
    {

    }
 
}