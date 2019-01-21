<?php

namespace Yeet;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function ownedBy () {
        return $this->morphsTo();
    }

    public function comments () {
        return $this->morphMany("Yeet\Comment", "commentable");
    }
}
