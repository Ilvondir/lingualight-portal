<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Change password</h1>
        </div>

        <div class="form offset-lg-3 col-lg-6 col-12 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-100">
                <form action="{{ route("account.password.change") }}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    <div class="form-group mb-2">
                        <label for="oldPassword">Old password</label>
                        <input id="oldPassword" name="oldPassword" type="password" class="form-control @error ("oldPassword") is-invalid @enderror">
                        @error ("oldPassword")
                            <label for="oldPassword" class="invalid-feedback">
                                <b>{{ $message }}</b>
                            </label>
                        @enderror

                    </div>
                    <div class="form-group mb-2">
                        <label for="password">New password</label>
                        <input id="password" name="password" type="password" class="form-control @error ("password") is-invalid @enderror">
                        @error ("password")
                            <label for="password" class="invalid-feedback">
                                <b>{{ $message }}</b>
                            </label>
                        @enderror

                    </div>
                    <div class="form-group mb-2">
                        <label for="repeatPassword">Repeat new password</label>
                        <input id="repeatPassword" name="repeatPassword" type="password" class="form-control @error ("repeatPassword") is-invalid @enderror">
                        @error ("repeatPassword")
                        <label for="repeatPassword" class="invalid-feedback">
                            <b>{{ $message }}</b>
                        </label>
                    @enderror

                    </div>

                    <div class="w-100 text-center">
                        <button class="btn btn-dark mt-4" type="submit">Change</button>
                    </div>
                </form>

            </div>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
