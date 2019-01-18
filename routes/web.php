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
Route::resource("greet", "CommentController");
Route::resource("meet", "FriendController");

Route::get("{username}/profile", "UserController@showProfile");
Route::get("{username}/yeets", "UserController@showYeets");
Route::get("{username}/greets", "UserController@showGreets");
Route::get("{username}/meets", "UserController@showMeets");

//Route::middleware("auth")->group(function () {
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
