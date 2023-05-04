<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Login</h1>
        </div>

        <div class="form w-100 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-50">
                <form action="{{ route("auth.login.authenticate") }}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    <div class="form-group mb-2">
                        <label for="login">Login</label>
                        <input id="login" name="login" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="pass">Password</label>
                        <input id="pass" name="password" type="password" class="form-control">
                    </div>

                    <div class="w-100 text-center">
                        <button class="btn btn-dark mt-4" type="submit"><i class="fa fa-key"></i>  Login</button>
                    </div>
                </form>

                @if ($errors->any())
                    <div class="mt-3">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                <div></div>

            </div>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
