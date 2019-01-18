@extends("layouts.user")

@section("title", "Yeets")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Yeets</h1>
                @foreach($posts as $post)
                    <div>
                        <header class="d-flex justify-content-between">
                            <p class="font-weight-bold">{{ $post->title }}</p>
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </header>
                        <main>
                            <p>{{ $post->content }}</p>
                        </main>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
