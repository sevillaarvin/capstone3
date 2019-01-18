@extends("layouts.user")

@section("title", "Profile")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Profile</h1>
                <p>Name: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Username: {{ $user->username }}</p>
            </div>
        </div>
    </div>
@endsection