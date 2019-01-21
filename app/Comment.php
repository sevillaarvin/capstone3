<?php

namespace Yeet;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        "user_id",
        "comment",
    ];

    public function ownedBy () {
        return $this->morphsTo();
    }

    public function comments () {
        return $this->morphMany("Yeet\Comment", "commentable");
    }

    public function likes () {
        return $this->morphMany("Yeet\Like", "likeable");
    }
}
