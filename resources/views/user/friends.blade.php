@extends("layouts.user")

@section("title", "Meets")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Meets</h1>
                @foreach($friends as $friend)
                    <div class="row">
                        <div class="col-3">
                            @if($friend->avatar)
                                <img src="{{ $friend->avatar }}" alt="Friend Avatar" class="img-fluid">
                            @else
                                <i class="fas fa-user-circle fa-3x"></i>
                            @endif
                        </div>
                        <div class="col-6">
                            <p class="font-weight-bold">{{ $friend->name }}</p>
                            @if($friend->pivot->accepted)
                                <p class="text-success">Accepted</p>
                            @else
                                <p class="text-warning">Pending</p>
                            @endif
                        </div>
                        <div class="col-3">
                            <small>{{ $friend->pivot->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
