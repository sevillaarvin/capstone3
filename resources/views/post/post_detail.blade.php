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
                            <i class="far fa-thumbs-up" onclick="likePost({{ $post->id }}, true)"></i>
                            {{ $post->likes()->where("liked", true)->count() }}
                        </span>
                        <span>
                            {{ $post->likes()->where("liked", false)->count() }}
                            <i class="far fa-thumbs-down" onclick="likePost({{ $post->id }}, false)"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 48px 0;">
            <div class="col">
                <form action="{{ route("yeet.comment", $post->id) }}" method="post">
                    {{ csrf_field() }}
                    <textarea name="comment" id="" cols="30" rows="5" placeholder="Greet..."
                              class="form-control"></textarea>
                    <button class="form-control btn btn-primary" type="submit">Greet!</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @foreach($post->comments as $comment)
                    <div class="row border">
                        <div class="col-3">
                            <div>
                                AVATAR {{ $comment->user_id }}
                            </div>
                            <div class="d-flex justify-content-between">
                                <i class="far fa-thumbs-up"></i>
                                <i class="far fa-thumbs-down"></i>
                            </div>
                        </div>
                        <div class="col-9">
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                    @foreach($comment->comments as $comment_comment)
                        <div class="row ml-3 border">
                            <div class="col-3">
                                <p>{{ $comment_comment->id }}</p>
                                <div class="d-flex justify-content-between">
                                    <i class="far fa-thumbs-up"></i>
                                    <i class="far fa-thumbs-down"></i>
                                </div>
                            </div>
                            <div class="col-9">
                                <p>{{ $comment_comment->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script type="application/javascript" src="{{ asset("js/post_detail.js") }}"></script>
@endsection
