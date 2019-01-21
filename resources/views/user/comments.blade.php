@extends("layouts.user")

@section("title", "Greets")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Greets</h1>
                @foreach($comments as $comment)
                    <div>
                        <header class="d-flex justify-content-between">
                            <p class="font-weight-bold">{{ Auth::user()->name }}</p>
                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                        </header>
                        <main>
                            <p>{{ $comment->comment }}</p>
                        </main>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
