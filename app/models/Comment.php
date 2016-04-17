<?php
use app\Models\Traits\Relationship\CommentRelationship;
/**
*
**/
class Comment extends Eloquent
{
  use CommentRelationship;

  /**
  *
  *@var $guarded
  *
  **/
  protected $guarded = [];

  protected $fillable = array('body', 'user_id', 'post_id', 'created_at');
  public static $rules = array(
      'body' => 'required|min:5',
    );
  // user who has commented
  public function author()
  {
    return $this->belongsTo('User','user_id');
  }
  // returns post of any comment
  public function post()
  {
    return $this->belongsTo('Post','post_id');
  }
}