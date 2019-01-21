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

Route::resource("greet", "CommentController");
Route::resource("meet", "FriendController");
Route::resource("neet", "LikeController");

Route::get("{username}/profile", "UserController@showProfile");
Route::get("{username}/yeets", "UserController@showPosts");
Route::get("{username}/greets", "UserController@showComments");
Route::get("{username}/meets", "UserController@showFriends");

//Route::middleware("auth")->group(function () {
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
