<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Edit contact</h1>
        </div>

        <div class="form offset-lg-3 col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-100">
                <form action="{{ route("contact.update") }}" method="POST">
                    @csrf

                    <div>
                        <label class="mt-3" for="phone">Phone number</label>
                        <input type="text" class="form-control @error("phone") is-invalid @enderror" id="phone" name="phone" value="{{ $phone }}" required>
                        @error ("phone")
                            <label for="phone" class="invalid-feedback">
                                <b>{{ $message }}</b>
                            </label>
                        @enderror

                        <label class="mt-3" for="email">Email</label>
                        <input type="text" class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{ $email }}" required>
                        @error ("email")
                            <label for="email" class="invalid-feedback">
                                <b>{{ $message }}</b>
                            </label>
                        @enderror
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
