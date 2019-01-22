<?php

namespace Yeet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yeet\Comment;
use Yeet\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->get();
        return view("landing", compact("posts"));
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
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];

        $this->validate($request, $rules);

        return Post::create([
            "title" => $request->title,
            "content" => $request->content,
            "user_id" => Auth::user()->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Yeet\Post  $post
     * @return \Illuminate\Http\Response
     */
//    public function show(Post $post)
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view("post.post_detail", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Yeet\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Yeet\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Yeet\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function like (Request $request, $id) {
        if (Auth::check()) {
            $post = Post::findOrFail($id);
            $post->likes()->sync([
                Auth::user()->id => ["liked" => $request->liked]
            ]);
        }
    }

    public function comment (Request $request, $id) {
        if (Auth::check()) {
            $post = Post::findOrFail($id);
            $post->comments()->save(new Comment([
                "comment" => $request->comment,
                "user_id" => Auth::user()->id,
            ]));
        }
        return back();
    }

    public function showComment($postId, $commentId)
    {
        $post = Post::findOrFail($postId);
        $maincomment = Comment::findOrFail($commentId);
        return view("post.post_comment", compact("post", "maincomment"));
    }
}
