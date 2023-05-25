<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 mt-5 border-top">
    <p class="col-md-4 mb-0 text-white">© 2023 LinguaLight, Inc</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img src="{{ asset("storage/img/icon/icon.ico") }}" width="60" height="60">
    </a>

    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="{{ route("home") }}" class="nav-link px-2 text-white">Home</a></li>
        <li class="nav-item"><a href="{{ route("courses.index") }}" class="nav-link px-2 text-white">Courses</a></li>
        <li class="nav-item"><a href="{{ route("contact") }}" class="nav-link px-2 text-white">Contact</a></li>


        @auth
            <li class="nav-item"><a href="{{ route("account.menu") }}" class="nav-link px-2 text-white">Account</a></li>
        @endauth

        @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link px-2 text-white" href="{{ route('auth.logout') }}">Logout</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link px-2 text-white" href="{{ route('auth.login') }}">Login</a>
            </li>
        @endif
    </ul>
</footer>
