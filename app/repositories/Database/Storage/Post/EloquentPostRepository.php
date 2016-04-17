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

    public function find($id)
    {
        return Post::find($id);
    }

    public function create($input)
    {
        return Post::create($input);
    }

    public function destroy($ids)
    {
        return Post::destroy($ids);
    }

    public function update($id, $input)
    {
        $post = Post::find($id);
        return $post->update($input);
    }

    public function search($param = null)
    {

    }

}