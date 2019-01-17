<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Yeet</title>
</head>
<body>
<style>
</style>
<nav class="side-nav side-nav--closed">
    <div class="side-nav__overlay">
        &nbsp;
    </div>
    <ul class="side-nav__content nav">
        <li class="nav-item">
            <a href="#" class="nav-link">Test</a>
        </li>
    </ul>
</nav>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header__title jumbotron text-center">
                    <div class="lead">Yeet,</div>
                    <div class="lead">Rinse,</div>
                    <div class="lead">Repeat!</div>
                </div>
                <nav class="header__navbar navbar navbar-expand-lg navbar-light bg-light">
                    <span class="mr-auto">MENU TOGGLE</span>
                    <span class="ml-auto">
                        AVATAR
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </span>
                </nav>
                <div class="header__content text-center">
                    @guest
                        <form method="POST" action="{{ route("login") }}">
                            {{ csrf_field() }}
                            <div class="login__username">
                                I beat like <input id="username" name="username" type="text">
                                @if ($errors->has('username'))
                                    <div class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="login__password">
                                Poteat <input id="password" name="password" type="password">!
                                @if ($errors->has('password'))
                                    <div class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <input type="submit" style="display: none;">
                        </form>
                    @endguest
                </div>
            </div>
        </div>
        @auth
            <div class="row">
                <div class="col">
                    <div class="post__form">
                        <textarea id="post" cols="30" rows="5" placeholder="Yeet!!!"
                                  class="post__content form-control mb-1"></textarea>
                        <button id="post-submit" class="post__submit btn btn-primary form-control" type="button">
                            Yeet!
                        </button>
                    </div>
                </div>
            </div>
        @endauth
        <div class="row">
            @foreach($posts as $post)
                <div class="col-12 my-3">
                        <div>
                            <div>
                                {{ $post->created_at->diffForHumans() }}
                            </div>
                            <div>
                                {{ $post->content }}
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
            @auth
    const post = document.querySelector("#post")
    post.addEventListener("keydown", (e) => {
        const key = e.which || e.keyCode || 0
        if (key === 13) {
            createPost(post, post.value)
                .then(() => post.value = "")
                .catch(handleErrors)
        }
    })
    const postSubmit = document.querySelector("#post-submit")
    postSubmit.addEventListener("click", (e) => {
        createPost(post, post.value)
            .then(() => post.value = "")
            .catch(handleErrors)
    })

    const createPost = async (post, content) => {
        try {
            await axios.post("{{ route("yeet.store") }}", {
                content,
            })
            return
        } catch (e) {
            return Promise.reject(e)
        }
    }

    const handleErrors = (e) => {
        if (!e || !e.response) {
            return
        }

        const { status } = e.response
        if (status == 422) {
            // TODO: Show error message, yeet cannot be empty
        }
    }
    @endauth
</script>
</body>
</html>