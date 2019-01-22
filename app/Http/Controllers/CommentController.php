<?php

namespace Yeet\Http\Controllers;

use Yeet\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Yeet\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Yeet\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Yeet\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Yeet\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function comment (Request $request, $id) {
        if (Auth::check()) {
            $comment = Comment::findOrFail($id);
            $comment->comments()->save(new Comment([
                "comment" => $request->comment,
                "user_id" => Auth::user()->id,
            ]));
        }
        return back();
    }

    public function like (Request $request, $id) {
        if (Auth::check()) {
            $comment = Comment::findOrFail($id);
            $comment->likes()->sync([
                Auth::user()->id => ["liked" => filter_var($request->liked, FILTER_VALIDATE_BOOLEAN)]
            ]);
        }
        return back();
    }
}
