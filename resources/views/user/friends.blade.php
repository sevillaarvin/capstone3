@extends("layouts.user")

@section("title", "Meets")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Meets</h1>
                @foreach($friends as $friend)
                    <div>
                        <header class="d-flex justify-content-between">
                            <h2>{{ $friend->id }} {{ $friend->name }}</h2>
                            <span>{{ $friend->pivot->created_at->diffForHumans() }}</span>
                        </header>
                        <main>
                            <h4>{{ $friend->pivot->accepted ? "Accepted" : "Pending" }}</h4>
                        </main>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
