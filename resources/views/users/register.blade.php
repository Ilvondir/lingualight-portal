<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Register</h1>
        </div>

        <div class="form offset-lg-3 col-lg-6 col-12 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-100">
                <form action="{{ route("users.store") }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" value="{{ old("name") }}" name="name" required>
                            @error ("name")
                                <label for="name" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">
                            <label class="mt-3 mt-lg-0" for="surname">Surname</label>
                            <input type="text" class="form-control @error("surname") is-invalid @enderror" id="surname" value="{{ old("surname") }}" name="surname" required>
                            @error ("surname")
                                <label for="surname" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <label class="mt-3" for="email">Email</label>
                            <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" value="{{ old("email") }}" name="email" required>
                            @error ("email")
                                <label for="email" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">
                            <label class="mt-3" for="login">Login</label>
                            <input type="text" class="form-control @error("login") is-invalid @enderror" id="login" value="{{ old("login") }}" name="login" required>
                            @error ("login")
                                <label for="login" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror
                        </div>
                    </div>

                    <label class="mt-3" for="role">Role</label>
                    <select class="form-select @error("role") is-invalid @enderror" id="role" name="role" onchange="infobox()" required>
                        <option value="User">User</option>
                        <option value="Trainer">Trainer</option>
                        @if (Auth::check())
                            <option value="Administrator">Administrator</option>
                        @endif
                    </select>
                        @error ("role")
                            <label for="role" class="invalid-feedback">
                                <b>{{ $message }}</b>
                            </label>
                        @enderror

                    <div class="mt-2" id="info" style="text-align: justify;">As a user, you can enroll in all courses and use other resources of the application. If you want to create new course offerings, you need to change your role. This choice cannot be changed later!</div>

                    <div class="row">
                        <div class="col-lg-6 col-12">

                            <label class="mt-3" for="password">Password</label>
                            <input type="password" class="form-control @error("password") is-invalid @enderror" id="password" name="password" required>
                            @error ("password")
                                <label for="password" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">

                            <label class="mt-3" for="password2">Repeat password</label>
                            <input type="password" class="form-control @error("repeatPassword") is-invalid @enderror" id="password2" name="repeatPassword" required>
                            @error ("repeatPassword")
                                <label for="password2" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror
                        </div>
                    </div>

                    <div class="w-100 text-center">
                        <button class="btn btn-dark mt-4" type="submit"><i class="fa fa-user"></i>  Register</button>
                    </div>

                </form>

                <div class="mt-4">Do you have an account? <a class="text-decoration-none text-white" href="{{ route("auth.login") }}"><b>Login here now!</b></a></div>

            </div>
        </div>

        @include("shared.footer")
    </div>
    <script>
        const sel = document.querySelector("#role");
        const info = document.querySelector("#info");

        function infobox() {
            if (sel.value == "User") info.innerHTML = "As a user, you can enroll in all courses and use other resources of the application. If you want to create new course offerings, you need to change your role. This choice cannot be changed later!";
            if (sel.value == "Trainer") info.innerHTML = "As a trainer, you can create course announcements and recruit students for them. You can see all users who have enrolled in your courses. However, you cannot enroll in courses yourself. If you want to participate in courses, you need to change your role. This choice cannot be changed later!";
            @if (Auth::check())
            if (sel.value == "Administrator") info.innerHTML = "Portal administrator user with access to all application resources.";

            @endif
        }
    </script>
</body>
</html>
