<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="">URL Shortener</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if (Session::get('email'))
                <li class="{{ Request::routeIs('Shorten') ? "navitem active" : "" }}">
                    <a class="nav-link" href="{{ route('Shorten') }}">New</a>
                </li>
                <li class="{{ Request::routeIs('Shorten.me') ? "navitem active" : "" }}">
                    <a class="nav-link" href="{{ route('Shorten.me') }}">My Links</a>
                </li>
                <li class="navitem">
                    <a class="nav-link" href="{{ route('Logout') }}">Logout</a>
                </li>
            @else
                <li class="{{ Request::routeIs('Register') ? "navitem active" : "" }}">
                    <a class="nav-link" href="{{ route('Register') }}">Register</a>
                </li>
                <li class="{{ Request::routeIs('Login') ? "navitem active" : "" }}">
                    <a class="nav-link" href="{{ route('Login') }}">Login</a>
                </li>
            @endif
        </ul>
    </div>
</nav>