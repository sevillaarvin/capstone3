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

    public function showYeets ($username) {
        return view("user.yeets");
    }

    public function showGreets ($username) {
        return view("user.greets");
    }

    public function showMeets ($username) {
        return view("user.meets");
    }
}
