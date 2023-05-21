<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Edit user data</h1>
        </div>

        <div class="form offset-lg-3 col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-100">
                <form action="{{ route("users.update", ["id" => $user->id]) }}" method="POST">
                    @csrf

                    @if ($errors->any())
                        <div class="mb-3 text-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="name" required>

                            <label class="mt-3" for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email" required>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="surname" class="mt-lg-0 mt-3">Surname</label>
                            <input type="text" class="form-control" id="surname" value="{{ $user->surname }}" name="surname" required>

                            <label class="mt-3" for="login">Login</label>
                            <input type="text" class="form-control" id="login" name="login" value="{{ $user->login }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-12">

                            <label class="mt-3" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">

                        </div>
                        <div class="col-lg-6 col-12">

                            <label class="mt-3" for="password2">Repeat password</label>
                            <input type="password" class="form-control" id="password2" name="repeatPassword">

                        </div>
                    </div>

                    <div class="w-100 text-center">
                        <button class="btn btn-dark mt-4 mr-5" type="reset">Reset</button>
                        <button class="btn btn-dark mt-4" type="submit">Update</button>
                    </div>

                </form>
            </div>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
