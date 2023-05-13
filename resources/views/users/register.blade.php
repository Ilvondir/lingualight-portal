<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Register</h1>
        </div>

        <div class="form w-100 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-50">
                <form action="{{ route("users.store") }}" method="POST">
                    @csrf

                    @if ($errors->any())
                        <div class="mb-3 text-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>

                            <label class="mt-3" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-6">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" required>

                            <label class="mt-3" for="login">Login</label>
                            <input type="text" class="form-control" id="login" name="login" required>
                        </div>
                    </div>

                    <label class="mt-3" for="role">Role</label>
                    <select class="form-select" id="role" name="role" onchange="infobox()" required>
                        <option value="User">User</option>
                        <option value="Trainer">Trainer</option>
                    </select>

                    <div class="mt-2" id="info" style="text-align: justify;">As a user, you can enroll in all courses and use other resources of the application. If you want to create new course offerings, you need to change your role. This choice cannot be changed later!</div>

                    <div class="row">
                        <div class="col-6">

                            <label class="mt-3" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>

                        </div>
                        <div class="col-6">

                            <label class="mt-3" for="password2">Repeat password</label>
                            <input type="password" class="form-control" id="password2" name="repeatPassword" required>

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
        }
    </script>
</body>
</html>
