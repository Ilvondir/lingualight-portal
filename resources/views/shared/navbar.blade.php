<nav class="navbar sticky-top navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">

        <a class="navbar-brand text-light" href="{{ route("home") }}">
            <img src="{{ asset("storage/img/icon/icon.ico")}}" alt="Logo." width="35" height="35" class="d-inline-block align-text-top">
            LinguaLight
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link @if (str_contains(request()->path(), 'home')) active @endif" href="{{ route("home") }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if (str_contains(request()->path(), 'course') && !str_contains(request()->path(), 'account')) active @endif" href="{{ route("courses.index") }}">Courses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if (str_contains(request()->path(), 'contact') && !str_contains(request()->path(), 'account')) active @endif" href="{{ route("contact") }}">Contact</a>
              </li>
            </ul>

            <ul class="nav navbar-nav mb-2 mb-lg-0 mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link @if (str_contains(request()->path(), 'account')) active @endif" href="{{ route("account.menu") }}">Account</a>
                    </li>
                @endauth
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.logout') }}"><b>{{ Auth::user()->name }} {{ Auth::user()->surname }}</b>, logout </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link @if (str_contains(request()->path(), 'login') || str_contains(request()->path(),"register")) active @endif" href="{{ route('auth.login') }}">Login</a>
                    </li>
                @endif
            </ul>
    </div>
</nav>
