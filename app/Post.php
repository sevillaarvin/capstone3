<?php

namespace Yeet;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "title",
        "content",
        "user_id",
        "image",
    ];

    public function owner() {
        return $this->belongsTo("Yeet\User", "user_id");
    }

    public function comments () {
        return $this->morphMany("Yeet\Comment", "commentable");
    }

    public function likes () {
        return $this->morphToMany("Yeet\User", "likeable", "likes");
    }
}
