<?php

namespace Yeet;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        "user_id",
        "liked",
    ];
}
