<nav class="navbar sticky-top bg-dark" data-bs-theme="dark">
    <div class="container-fluid">

        <a class="navbar-brand text-light" href="{{ route("home") }}">
            <img src="{{ asset("storage/img/icon/icon.ico")}}" alt="Logo." width="35" height="35" class="d-inline-block align-text-top">
            LinguaLight
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link @if (str_contains(request()->path(), 'home')) active @endif" href="{{ route("home") }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if (str_contains(request()->path(), 'course') && !str_contains(request()->path(), 'account')) active @endif" href="{{ route("courses.index") }}">Courses</a>
              </li>

              @auth
                <li class="nav-item">
                    <a class="nav-link @if (str_contains(request()->path(), 'account')) active @endif" href="{{ route("account.menu") }}">Account</a>
                </li>
              @endauth
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">
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
    </div>
</nav>
