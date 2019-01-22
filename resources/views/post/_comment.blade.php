<div class="row border">
    <div class="col-4">
        <div>
            <div>
                AVATAR {{ $comment->user_id }}
            </div>
        </div>
    </div>
    <div class="col-8">
        <p>{{ $comment->comment }}</p>
    </div>
    <div class="col-12 d-flex justify-content-between">
        <div class="d-flex justify-content-between">
            <form action="{{ route("greet.like", $comment->id) }}" method="post" class="comment__form">
                {{ csrf_field() }}
                <input type="hidden" name="liked">
                <label class="comment__like">
                    <i class="far fa-thumbs-up"></i>
                    {{ $comment->likes()->where("liked", true)->count() }}
                </label>
                <label class="comment__dislike">
                    <i class="far fa-thumbs-down"></i>
                    {{ $comment->likes()->where("liked", false)->count() }}
                </label>
            </form>
        </div>
        <div>
            <small>{{ $comment->created_at->diffForHumans() }}</small>
        </div>
        <div>
            <small onclick="document.getElementById('comment-{{ $comment->id }}').classList.toggle('d-none')">Reply
            </small>
        </div>
    </div>
    <div id="comment-{{ $comment->id }}" class="col-12 d-none">
        <form action="{{ route("greet.comment", $comment->id) }}" method="post">
            {{ csrf_field() }}
            <textarea name="comment" id="" cols="30" rows="10" placeholder="Greet.." class="form-control"></textarea>
            <button class="form-control btn btn-primary" type="submit">Greet!</button>
        </form>
    </div>
</div>
