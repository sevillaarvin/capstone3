<?php

namespace Yeet;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "content",
    ];
}
