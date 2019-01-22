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
            <li class="nav-item">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </li>
        @endauth
    </ul>
</nav>
