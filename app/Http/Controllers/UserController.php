<?php

namespace Yeet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yeet\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile ($username) {
        $user = User::where("username", $username)->first();
        return view("user.profile", compact("user"));
    }

    public function updateProfile (Request $request, $username) {
        $user = User::where("username", $username)->first();
        if(Auth::user()->id == $user->id) {
            $rules = [
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,'.$user->id,
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
                'image' => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            ];

            $this->validate($request, $rules);

            if ($request->name != $user->name) {
                $user->name = $request->name;
            }
            if ($request->username != $user->username) {
                $user->username = $request->username;
            }
            if ($request->email != $user->email) {
                $user->email = $request->email;
            }

            if ($request->hasFile("avatar")) {
                $image = $request->file("avatar");
                $image_name = time().".".$image->getClientOriginalExtension();
                $destination = "images/";
                $image->move($destination, $image_name);
                $user->avatar = $destination.$image_name;
            }
            $user->save();
        }
        return redirect(route("user.profile", $user->username));
    }

    public function changePassword (Request $request, $username) {
        $user = User::where("username", $username)->first();
        if(Auth::user()->id == $user->id) {
            $rules = [
                'password' => 'string|min:6',
                'newpassword' => 'string|min:6|confirmed',
            ];

            $this->validate($request, $rules);

            if(Hash::check($request->password, $user->password)) {
                $user->password = bcrypt($request->newpassword);
                $user->save();
            } else {
                $request->session()->flash("status", "Password is not valid");
            }
        }
        return back();
    }

    public function showPosts ($username) {
        $posts = User::where("username", $username)->first()
            ->posts()->orderBy("created_at", "desc")->get();
        return view("user.posts", compact("posts"));
    }

    public function showComments ($username) {
        $comments = User::where("username", $username)->first()
            ->comments()->orderBy("created_at", "desc")->get();
        return view("user.comments", compact("comments"));
    }

    public function showFriends ($username) {
        $friends = User::where("username", $username)->first()
            ->friends()->orderBy("created_at", "desc")->get();
        return view("user.friends", compact("friends"));
    }
}
