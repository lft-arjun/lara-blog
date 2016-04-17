<?php namespace app\Models\Traits\Relationship;

/**
 * Class PostRelationship
 * @package App\Models\Traits\Relationship
 */
trait PostRelationship
{
    /**
     * one-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('Comment','post_id');
    }
    /**
     *Post and user Relationship define 
     *@return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function author()
    {
        return $this->belongsTo('User','author_id');
    }

}
