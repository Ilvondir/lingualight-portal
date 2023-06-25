<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Edit data</h1>
        </div>

        <div class="form offset-lg-3 col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-100">
                <form action="{{ route("account.edit.update") }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ Auth::user()->name }}" required>
                            @error ("name")
                                <label for="name" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror

                            <label class="mt-3" for="email">Email</label>
                            <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{ Auth::user()->email }}" required>
                            @error ("email")
                                <label for="email" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror

                        </div>
                        <div class="col-lg-6 col-12">
                            <label class="mt-3 mt-lg-0" for="surname">Surname</label>
                            <input type="text" class="form-control @error("surname") is-invalid @enderror" id="surname" name="surname" value="{{ Auth::user()->surname }}" required>
                            @error ("surname")
                                <label for="surname" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror

                            <label class="mt-3" for="login">Login</label>
                            <input type="text" class="form-control @error("login") is-invalid @enderror" id="login" name="login" value="{{ Auth::user()->login }}" required>
                            @error ("login")
                                <label for="login" class="invalid-feedback">
                                    <b>{{ $message }}</b>
                                </label>
                            @enderror
                        </div>
                    </div>


                    <div class="w-100 text-center">
                        <button class="btn btn-dark mt-4 mr-5" type="reset">Reset</button>
                        <button class="btn btn-dark mt-4" type="submit">Change</button>
                    </div>

                </form>

            </div>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
