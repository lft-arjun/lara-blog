<?php namespace App;

class Comment extends Model {
  //comments table in database
  protected $guarded = [];
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