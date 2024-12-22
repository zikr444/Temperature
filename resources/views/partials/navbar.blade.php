<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Temperature Monitor</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('features') ? 'active' : '' }}" href="{{ url('/features') }}">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('ruangan*') ? 'active' : '' }}" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ruangan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item {{ Request::is('ruangan/1') ? 'active' : '' }}" href="{{ url('/ruangan/1') }}">Ruang 1</a></li>
                        <li><a class="dropdown-item {{ Request::is('ruangan/2') ? 'active' : '' }}" href="{{ url('/ruangan/2') }}">Ruang 2</a></li>
                        <li><a class="dropdown-item {{ Request::is('ruangan/3') ? 'active' : '' }}" href="{{ url('/ruangan/3') }}">Ruang 3</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
