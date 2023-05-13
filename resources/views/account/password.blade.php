<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Change password</h1>
        </div>

        <div class="form w-100 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-50">
                <form action="{{ route("account.password.change") }}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    @if ($errors->any())
                        <div class="mb-3 text-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group mb-2">
                        <label for="oldPassword">Old password</label>
                        <input id="oldPassword" name="oldPassword" type="password" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">New password</label>
                        <input id="password" name="password" type="password" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="repeatPassword">Repeat new password</label>
                        <input id="repeatPassword" name="repeatPassword" type="password" class="form-control">
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
