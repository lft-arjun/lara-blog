<?php namespace Database\Storage\Comment;

use Database\Storage\Interfaces\RepositoryInterface;
use Comment;
 
class EloquentCommentRepository implements RepositoryInterface
{
    const PAGELIMIT = 5;
    public function all($param = null)
    {
        return Comment::where('is_active', '=', 1)->orderBy('created_at', 'desc')->paginate(static::PAGELIMIT);
    }

    public function find($id)
    {
        return Comment::findOrFail($id);
    }
    /**
     * @param array $input
     * @return object
     * */
    public function create($input)
    {
        try {
            return Comment::create($input);
        } catch (Exception $e) {
            throw new Exception('Something went wrong while creating comment');
        }
    }

    public function destroy($ids)
    {
        return Comment::destroy($ids);
    }
    /**
     * @param int $id
     * @param array $input
     * @return object
     * */
    public function update($id, $input)
    {
        try {
            $comment = Comment::find($id);
            return $comment->update($input); 
        } catch (Exception $e) {
            throw new Exception('Something went wrong while update comment');
        }
    }
    public function search($param = null)
    {

    }
 
}