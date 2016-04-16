<?php namespace Database\Storage\Post;

use Database\Storage\Interfaces\RepositoryInterface;
use Post;
 
class EloquentPostRepository implements RepositoryInterface {
 
  public function all()
  {
    return Post::where('is_active', '=', 1)->orderBy('created_at', 'desc')->get();
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
 
}