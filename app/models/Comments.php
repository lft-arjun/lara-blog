<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Comments extends Model {
  //comments table in database
  protected $guarded = [];
  // user who has commented
  public function author()
  {
    return $this->belongsTo('App\User','user_id');
  }
  // returns post of any comment
  public function post()
  {
    return $this->belongsTo('App\Posts','post_id');
  }
}