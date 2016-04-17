<?php namespace app\Models\Traits\Relationship;

/**
 * Class UserRelationship
 * @package App\Models\Traits\Relationship
 */
trait UserRelationship
{
    /**
     * one-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasToMany
     */
    public function posts()
    {
        return $this->hasMany('Post','author_id');
    }
    public function comments()
    {
        return $this->hasMany('Comment','user_id');
    }

}
