<?php namespace app\Models\Traits\Relationship;

/**
 * Class CommentRelationship
 * @package App\Models\Traits\Relationship
 */
trait CommentRelationship
{
    /**
     * Define relationship between comments and users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function author()
    {
        return $this->belongsTo('User','user_id');
    }
    /**
     * Define relationship between posts and comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function post()
    {
        return $this->belongsTo('Post','post_id');
    }
}
