@extends("layouts.user")

@section("title", "Yeet")
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
                            <i class="far fa-thumbs-up"></i>
                        </span>
                        <span>
                            <i class="far fa-thumbs-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 48px">
            <div class="col">
                @foreach($post->comments as $comment)
                    <p>{{ $comment->id }}</p>
                    <p>{{ $comment->comment }}</p>
                    @foreach($comment->comments as $comment_comment)
                        <p>{{ $comment_comment->id }}</p>
                        <p>{{ $comment_comment->comment }}</p>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection