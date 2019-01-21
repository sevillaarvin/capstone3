<?php

namespace Yeet;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "title",
        "content",
        "user_id",
    ];

    public function comments () {
        return $this->morphMany("Yeet\Comment", "commentable");
    }
}
