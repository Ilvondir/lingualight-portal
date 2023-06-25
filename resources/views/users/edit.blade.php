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

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error("name") is-invalid @enderror" value="{{ $user->name }}" id="name" name="name" required>
                            @error ("name")
                                <label for="name" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror

                            <label class="mt-3" for="email">Email</label>
                            <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" value="{{ $user->email }}" name="email" required>
                            @error ("email")
                                <label for="email" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror

                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="surname" class="mt-lg-0 mt-3">Surname</label>
                            <input type="text" class="form-control @error("surname") is-invalid @enderror" id="surname" value="{{ $user->surname }}" name="surname" required>
                            @error ("surname")
                                <label for="surname" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror

                            <label class="mt-3" for="login">Login</label>
                            <input type="text" class="form-control  @error("login") is-invalid @enderror" id="login" name="login" value="{{ $user->login }}" required>
                            @error ("login")
                                <label for="login" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-12">

                            <label class="mt-3" for="password">Password</label>
                            <input type="password" class="form-control @error("login") is-invalid @enderror" id="password" name="password">
                            @error ("password")
                                <label for="password" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">

                            <label class="mt-3" for="password2">Repeat password</label>
                            <input type="password" class="form-control @error("repeatPassword") is-invalid @enderror" id="password2" name="repeatPassword">
                            @error ("repeatPassword")
                                <label for="password2" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror
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
