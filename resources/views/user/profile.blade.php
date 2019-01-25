@extends("layouts.user")

@section("title", "Profile")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Profile</h1>
                {{--TODO: Handle errors--}}
                {{ $errors }}
                @auth
                    @if(Auth::user()->id == $user->id)
                        <form action="{{ route("user.update", $user->username) }}" method="post"
                              enctype="multipart/form-data"
                              class="mb-5">
                            {{ csrf_field() }}
                            {{ method_field("patch") }}
                            <div class="profile__avatar-container text-center">
                                @if($user->avatar)
                                    <img src="{{ $user->avatar }}" alt="Avatar" class="profile__avatar">
                                @else
                                    <i class="fas fa-user-circle fa-7x profile__avatar"></i>
                                @endif
                                <input id="profile-upload" type="file" name="avatar" class="profile__upload">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" value="{{ $user->name }}"
                                       class="form-control profile__name">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" name="username" value="{{ $user->username }}"
                                       class="form-control profile__username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" value="{{ $user->email }}"
                                       class="form-control profile__email">
                            </div>
                            <button class="btn btn-primary form-control" type="submit">Update</button>
                        </form>
                        <form action="{{ route("user.change-password", $user->username) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field("patch") }}
                            {{ Session::get("status") }}
                            <div class="profile__password-container">
                                <div class="form-group">
                                    <label for="password">Current Password</label>
                                    <input id="password" type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="newpassword">New Password</label>
                                    <input id="newpassword" type="password" name="newpassword" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="newpassword_confirmation">New Password Confirmation</label>
                                    <input id="newpassword_confirmation" type="password" name="newpassword_confirmation"
                                           class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-info form-control" type="submit">Change Password</button>
                        </form>
                    @else
                        <div class="profile__avatar text-center">
                            @if($user->avatar)
                                <img src="{{ $user->avatar }}" alt="Avatar">
                            @else
                                <i class="fas fa-user-circle fa-7x"></i>
                            @endif
                        </div>
                        <p>Name: {{ $user->name }}</p>
                        <p>Username: {{ $user->username }}</p>
                        <p>Email: {{ $user->email }}</p>
                    @endif
                @else
                    <div class="profile__avatar text-center">
                        @if($user->avatar)
                            <img src="{{ $user->avatar }}" alt="Avatar">
                        @else
                            <i class="fas fa-user-circle fa-7x"></i>
                        @endif
                    </div>
                    <p>Name: {{ $user->name }}</p>
                    <p>Username: {{ $user->username }}</p>
                    <p>Email: {{ $user->email }}</p>
                @endauth
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script type="application/javascript" src="{{ asset("js/profile.js") }}"></script>
@endsection