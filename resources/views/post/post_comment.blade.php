@extends("layouts.user")

@section("title", "Yeet - Comments")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-3">
                        <img src="/{{ $post->image }}" alt="post-image">
                    </div>
                    <div class="col-6">
                        <h2>{{ $post->title }}</h2>
                    </div>
                    <div class="col-3">
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-between">
                        <span>
                            <i class="far fa-thumbs-up" onclick="likePost({{ $post->id }}, true)"></i>
                            {{ $post->likes()->where("liked", true)->count() }}
                        </span>
                        <span>
                            <i class="far fa-thumbs-down" onclick="likePost({{ $post->id }}, false)"></i>
                            {{ $post->likes()->where("liked", false)->count() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @auth
            <div class="row  my-5">
                <div class="col">
                    <form action="{{ route("yeet.comment", $post->id) }}" method="post">
                        {{ csrf_field() }}
                        <textarea name="comment" id="" cols="30" rows="5" placeholder="Greet..."
                                  class="form-control"></textarea>
                        <button class="form-control btn btn-primary" type="submit">Greet!</button>
                    </form>
                </div>
            </div>
        @endauth
        <div class="row">
            <div class="col">
                @include("post._comment", [ "comment" => $maincomment ])
                <div class="row ml-3">
                    <div class="col">
                        @foreach($maincomment->comments as $comment)
                            @include("post._comment", [ "comment" => $comment ])
                            @foreach($comment->comments as $comment_comment)
                                <div class="row ml-3">
                                    <div class="col">
                                        @include("post._comment", [ "comment" => $comment_comment ])
                                        @if($comment_comment->comments->count())
                                            <a href="{{ route("yeet.comment.comment", [ $post->id, $comment_comment->id ]) }}">More
                                                Comments..</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script type="application/javascript" src="{{ asset("js/post_detail.js") }}"></script>
@endsection
