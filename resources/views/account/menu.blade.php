<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row">
            <div class="col-6">
                <h1>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h1>
            </div>
            <div class="col-6">
                <h4 style="text-align:right">Registered: {{ Auth::user()->registered }}</h4>
            </div>
        </div>
        <div><h4>Login: {{ Auth::user()->login }}</h4></div>
        <div><h4>Email: {{ Auth::user()->email }}</h4></div>

        <div class="menu mt-5">

            @if (Auth::user()->role_id==2)
                <a href="{{ route("courses.create") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-3 pb-3 border-top border-bottom" style="font-size: 1.5rem">Create course</div></a>
            @endif

            @if (Auth::user()->role_id==3)
                <a href="{{ route("account.courses") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-3 pb-3 border-top border-bottom" style="font-size: 1.5rem">Enrolled courses</div></a>
            @endif

            @if (Auth::user()->role_id==2)
                <a href="{{ route("account.your_courses") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-3 pb-3 border-bottom" style="font-size: 1.5rem">Your courses</div></a>
            @endif

            <a href="{{ route("account.edit") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-3 pb-3 border-bottom" style="font-size: 1.5rem">Update personal data</div></a>


            <a href=" {{ route("account.password") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-3 pb-3 border-bottom" style="font-size: 1.5rem">Change password</div></a>

            @if (Auth::user()->role_id!=1)
                <a href="{{ route("account.delete") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-3 pb-3 border-bottom" style="font-size: 1.5rem">Delete account</div></a>
            @endif
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
