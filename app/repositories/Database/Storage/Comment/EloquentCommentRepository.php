<?php namespace Database\Storage\Comment;

use Database\Storage\Interfaces\RepositoryInterface;
use Comment;
 
class EloquentCommentRepository implements RepositoryInterface {
 
  public function all()
  {
    return Comment::all();
  }
 
  public function find($id)
  {
    return Comment::find($id);
  }
 
  public function create($input)
  {
    return Comment::create($input);
  }

  public function destroy($ids)
  {
    return Comment::destroy($ids);
  }

  public function update($id, $input)
  {
    $comment = Comment::find($id);
    return $comment->update($input);
  }
 
}