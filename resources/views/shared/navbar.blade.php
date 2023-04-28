<nav class="navbar sticky-top bg-dark" data-bs-theme="dark">
    <div class="container-fluid">

        <a class="navbar-brand text-light" href="">
            <img src="{{ asset("storage/img/icon/icon.ico")}}" alt="Logo." width="35" height="35" class="d-inline-block align-text-top">
            LinguaLight
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Courses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ Auth::user()->name }}, wyloguj się... </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="#">Logowanie</a>
                    </li>
                @endif
            </ul>
          </div>
    </div>
</nav>
