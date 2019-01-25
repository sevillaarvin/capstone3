<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "PostController@index");

Route::resource("yeet", "PostController");
Route::post("yeet/{id}/like", "PostController@like")->name("yeet.like");
Route::post("yeet/{id}/comment", "PostController@comment")->name("yeet.comment");
Route::get("yeet/{postId}/greet/{commentId}", "PostController@showComment")->name("yeet.comment.comment");

Route::resource("greet", "CommentController");
Route::post("greet/{id}/like", "CommentController@like")->name("greet.like");
Route::post("greet/{id}/comment", "CommentController@comment")->name("greet.comment");

Route::resource("meet", "FriendController");
Route::resource("neet", "LikeController");

Route::get("{username}/profile", "UserController@showProfile")->name("user.profile");
Route::patch("{username}/profile", "UserController@updateProfile")->name("user.update");
Route::patch("{username}/change-password", "UserController@changePassword")->name("user.change-password");

Route::get("{username}/yeets", "UserController@showPosts")->name("user.yeets");
Route::get("{username}/greets", "UserController@showComments")->name("user.greets");
Route::get("{username}/meets", "UserController@showFriends")->name("user.meets");

//Route::middleware("auth")->group(function () {
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
