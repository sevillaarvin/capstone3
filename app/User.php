<?php

namespace Yeet;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', "username", "role_id",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany("Yeet\Post");
    }

    public function comments()
    {
        return $this->hasMany("Yeet\Comment");
    }

    public function friends()
    {
        return $this->belongsToMany("Yeet\User", "friends", "user_id", "friend_id")
            ->withPivot("accepted")
            ->withTimestamps();
    }
}
