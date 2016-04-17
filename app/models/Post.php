<?php

class Post extends Eloquent {
  //restricts columns from modifying
  // protected $guarded = [];
  protected $table = 'posts';

   protected $fillable = ['title', 'body', 'image', 'is_active', 'author_id'];
   public static $rules = array(
     'create' => [
      'title' => 'unique:posts,title|required',
      'body' => 'required|min:5',
      'image' => 'image|max:5'
      ],
      'update' => [
        'title' => 'unique:posts,title|required,:id',
        'body' => 'required|min:5',
        'image' => 'image|max:5kb'
      ]
    );
  public static function rules( $action, $merge=[], $id=false)
  {
      $rules = SELF::$rules[$action];

      if ($id) {
          foreach ($rules as &$rule) {
              $rule = str_replace(':id', $id, $rule);
          }
      }

      return array_merge( $rules, $merge );
  }
  // posts has many comments
  // returns all comments on that post
  public function comments()
  {
    return $this->hasMany('Comment','post_id');
  }
  // returns the instance of the user who is author of that post
  public function author()
  {
    return $this->belongsTo('User','author_id');
  }
}