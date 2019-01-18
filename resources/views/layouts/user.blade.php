<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/slideout.css") }}">
</head>
<body>
<div id="app">
    <nav id="menu" class="side-nav side-nav--closed">
        <ul class="side-nav__content nav flex-column text-center p-5">
            <li class="nav-item">
                <img src="http://i.pravatar.cc/300" alt="Avatar" class="side-nav__avatar">
            </li>
            @auth
                <li class="nav-item">
                    <a href="/{{ Auth::user()->username }}/profile" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="/{{ Auth::user()->username }}/yeets" class="nav-link">Yeets</a>
                </li>
                <li class="nav-item">
                    <a href="/{{ Auth::user()->username }}/greets" class="nav-link">Greets</a>
                </li>
                <li class="nav-item">
                    <a href="/{{ Auth::user()->username }}/meets" class="nav-link">Meets</a>
                </li>
            @endauth
        </ul>
    </nav>
    <nav class="navbar navbar-default navbar-static-top fixed-header">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"--}}
                        {{--data-target="#app-navbar-collapse" aria-expanded="false">--}}
                    {{--<span class="sr-only">Toggle Navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}
                <button type="button" class="navbar-toggle collapsed toggle-button"
                         aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Yeet') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main id="panel" class="panel panel-with-header">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
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

    var fixed = document.querySelector('.fixed-header');
    slideout
        .on('translate', function (translated) {
            fixed.style.transform = 'translateX(' + translated + 'px)';
        })
        .on('beforeopen', function () {
            this.panel.classList.add('panel-open');
            fixed.style.transition = 'transform 300ms ease';
            fixed.style.transform = 'translateX(256px)';
        })
        .on('open', function () {
            this.panel.addEventListener('click', close);
            fixed.style.transition = '';
        })
        .on('beforeclose', function () {
            this.panel.classList.remove('panel-open');
            this.panel.removeEventListener('click', close);
            fixed.style.transition = 'transform 300ms ease';
            fixed.style.transform = 'translateX(0px)';
        })
        .on('close', function () {
            fixed.style.transition = '';
        })
</script>
</body>
</html>
