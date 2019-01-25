<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/slideout.css") }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Yeet</title>
</head>
<body>
<style>

</style>
@include("_slideout")
<main id="panel" class="panel">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header__title jumbotron text-center">
                    <div class="lead">Yeet,</div>
                    <div class="lead">Rinse,</div>
                    <div class="lead">Repeat!</div>
                </div>
                <nav class="header__navbar navbar navbar-expand-lg navbar-light bg-light">
                    <span class="mr-auto toggle-button">YEET!</span>
                    <span class="ml-auto">
                        @auth
                            @if(Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar }}" alt="">
                            @else
                                <i class="fas fa-user-circle fa-3x"></i>
                            @endif
                        @else
                            <i class="fas fa-user-circle fa-3x"></i>
                        @endauth
                    </span>
                </nav>
                <div class="header__content text-center">
                    @guest
                        <form method="POST" action="{{ route("login") }}">
                            {{ csrf_field() }}
                            <div class="login__username form-group">
                                I beat like <input id="username" name="username" type="text"
                                                   class="login__username-input custom-control-inline"
                                                   placeholder="username">
                                @if ($errors->has('username'))
                                    <div class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="login__password form-group">
                                Poteat <input id="password" name="password" type="password"
                                              class="login__password-input" placeholder="password">!
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
                    <form id="post-form" name="post-form" class="post__form" enctype="multipart/form-data"
                          action="{{ route("yeet.store") }}" method="post">
                        {{ csrf_field() }}
                        <div class="post__upload-container">
                            <i class="fas fa-camera" onclick="document.getElementById('post-upload').click()"></i>
                            <input id="post-upload" name="image" type="file" class="post__upload">
                        </div>
                        <input id="post-title" name="title" type="text" class="form-control" placeholder="Yeet!!">
                        <textarea id="post-content" name="content" cols="30" rows="5" placeholder="Yeet!!!"
                                  class="post__content form-control mb-1"></textarea>
                        <button id="post-submit" class="post__submit btn btn-primary form-control" type="submit">
                            Yeet!
                        </button>
                    </form>
                </div>
            </div>
        @endauth
        <div class="row">
            @foreach($posts as $post)
                <div class="col-12 my-3 post__data" data-toggle="modal" data-target="#modal-{{ $post->id }}">
                    <a href="{{ route("yeet.show", $post->id) }}" class="post__data-link">
                        <div class="row">
                            <div class="col-3 text-center">
                                @if($post->image)
                                    <img src="{{ $post->image }}" alt="Post-image" class="post__data-image">
                                @else
                                    @auth
                                        @if(Auth::user()->avatar)
                                            <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="side-nav__avatar">
                                        @else
                                            <i class="fas fa-user-circle fa-5x"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-user-circle fa-5x"></i>
                                    @endauth
                                @endif
                            </div>
                            <div class="col-6">
                                <h3>
                                    {{ $post->title }}
                                </h3>
                                <p>
                                    {{ $post->content }}
                                </p>
                            </div>
                            <div class="col-3">
                                {{ $post->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js"></script>
<script>
    var slideout = new Slideout({
        'panel': document.getElementById('panel'),
        'menu': document.getElementById('menu'),
        'padding': 256,
        'tolerance': 70
    });

    // Toggle button
    document.querySelector('.toggle-button').addEventListener('click', function () {
        slideout.toggle();
    });

    function close(eve) {
        eve.preventDefault();
        slideout.close();
    }

    slideout
        .on('beforeopen', function () {
            this.panel.classList.add('panel-open');
        })
        .on('open', function () {
            this.panel.addEventListener('click', close);
        })
        .on('beforeclose', function () {
            this.panel.classList.remove('panel-open');
            this.panel.removeEventListener('click', close);
        });
</script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    @auth
    // const postForm = document.querySelector("#post-form")
    // postForm.addEventListener("submit", (e) => {
    //     e.preventDefault()
    //
    //     const postContent = e.target["post-content"]
    //     const content = postContent.value
    //     createPost(content)
    //         .then(() => postContent.value = "")
    //         .catch(handleErrors)
    // })

    const createPost = async (content) => {
        try {
            await axios.post("{{ route("yeet.store") }}", {
                title: content,
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

        const {status} = e.response
        if (status == 422) {
            // TODO: Show error message, yeet cannot be empty
        }
    }
    @endauth
</script>
</body>
</html>