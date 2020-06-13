<nav class="navbar p-2 mb-5 navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand d-md-none" href="{{ route('home') }}">Fetish Section</a>
    <button class="ml-md-auto navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav nav-pills container">
            <li class="col-12 col-lg-auto my-2 text-center nav-item mx-auto">
                <a class="text-uppercase nav-link {{ Request::is('home*') ? 'active' : '' }} " href="{{ route('home') }}" href="{{ route('home') }}">Home</a>
            </li>
            <li class="col-12 col-lg-auto my-2 text-center nav-item mx-auto">
                <a class="text-uppercase nav-link {{ Request::is('news*') ? 'active' : '' }} " href="{{ route('news') }}" href="{{ route('news') }}">News</a>
            </li>
            <li class="col-12 col-lg-auto my-2 text-center nav-item mx-auto">
                <a class="text-uppercase nav-link {{ Request::is('tour*') ? 'active' : '' }}"  href="{{ route('tour') }}" href="{{ route('tour') }}">Tour</a>
            </li>
            <li class="col-12 col-lg-auto my-2 text-center nav-item mx-auto">
                <a class="text-uppercase nav-link {{ Request::is('media*') ? 'active' : '' }} " href="{{ route('media') }}" href="{{ route('media') }}">Media</a>
            </li>
            <li class="col-12 col-lg-auto my-2 text-center nav-item mx-auto">
                <a class="text-uppercase nav-link {{ Request::is('contact*') ? 'active' : '' }} " href="{{ route('contact') }}" href="{{ route('contact') }}">Contact</a>
            </li>
            <li class="col-12 col-lg-auto my-2 text-center nav-item d-md-none mx-auto">
                <a class="text-uppercase nav-link {{ Request::is('login*') ? 'active' : '' }} " href="/login">Login</a>
            </li>
        </ul>
    </div>
</nav>
