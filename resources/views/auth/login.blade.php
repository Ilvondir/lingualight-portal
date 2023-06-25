<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Login</h1>
        </div>

        <div class="form offset-lg-3 col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-100">
                <form action="{{ route("auth.login.authenticate") }}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    <div class="form-group mb-2">
                        <label for="login">Login</label>
                        <input id="login" name="login" type="text" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="pass">Password</label>
                        <input id="pass" name="password" type="password" class="form-control" required>
                    </div>

                    @if ($errors->any())
                        <div class="mb-3 text-danger">
                            @foreach ($errors->all() as $error)
                                <b>{{ $error }}</b>
                            @endforeach
                        </div>
                    @endif

                    <div class="w-100 text-center">
                        <button class="btn btn-dark mt-4" type="submit"><i class="fa fa-key"></i>  Login</button>
                    </div>
                </form>

                <div class="mt-4">Don't have an account? <a class="text-decoration-none text-white" href="{{ route("users.register") }}"><b>Register here now!</b></a></div>

            </div>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
