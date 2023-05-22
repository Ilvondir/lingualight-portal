<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            @if (Auth::user()->role_id!=1)
                <a href="{{ route('home') }}" class="text-white text-decoration-none">
                    <h1>Registration was successful. We've automatically logged you into your new account.</h1>
                </a>
            @else
                <a href="{{ route('users.index') }}" class="text-white text-decoration-none">
                    <h1>User was created. You can go back to users panel.</h1>
                </a>
            @endif
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
