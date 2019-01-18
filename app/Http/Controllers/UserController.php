<?php

namespace Yeet\Http\Controllers;

use Illuminate\Http\Request;
use Yeet\User;

class UserController extends Controller
{
    public function showProfile ($username) {
        $user = User::where("username", $username)->first();
        return view("user.profile", compact("user"));
    }

    public function showPosts ($username) {
        $posts = User::where("username", $username)->first()
            ->posts()->orderBy("created_at", "desc")->get();
        return view("user.posts", compact("posts"));
    }

    public function showComments ($username) {
        return view("user.comments", compact("comments"));
    }

    public function showFriends ($username) {
        return view("user.friends", compact("friends"));
    }
}
