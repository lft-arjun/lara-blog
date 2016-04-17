<?php
use app\Models\Traits\Relationship\PostRelationship;
class Post extends Eloquent {
  use PostRelationship;
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
 
}