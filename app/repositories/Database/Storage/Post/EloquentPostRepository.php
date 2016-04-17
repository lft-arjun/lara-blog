<?php namespace Database\Storage\Post;

use Database\Storage\Interfaces\RepositoryInterface;
use Post;
 
class EloquentPostRepository implements RepositoryInterface 
{
    const PAGELIMIT = 5;
    /**
    *@todo Make Dynamic query instead of two 
    **/
    public function all($param = null)
    {
        if (empty($param)) {
            return Post::where('is_active', '=', 1)->orderBy('created_at', 'desc')->paginate(static::PAGELIMIT);
        } else {

          return Post::where('is_active', '=', 1)->where('title', 'like', '%'.$param.'%')->orderBy('created_at', 'desc')->paginate(static::PAGELIMIT);
        }

    }
    /**
     * @param  int $id
     * @return object
     */
    public function find($id)
    {
        return Post::find($id);
    }
    /**
     * @param  array $input
     * @return object
     */
    public function create($input)
    {
        return Post::create($input);
    }
    /**
     * @param  int|array $ids
     * @return object
     */
    public function destroy($ids)
    {
        return Post::destroy($ids);
    }
    /**
     * @param  int $id
     * @param  array $input
     * @return object
     */
    public function update($id, $input)
    {
        $post = Post::find($id);
        return $post->update($input);
    }
    /**
     * @param  string
     * @return [type]
     */
    public function search($param = null)
    {

    }

}