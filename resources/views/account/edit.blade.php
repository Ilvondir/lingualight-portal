<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Edit data</h1>
        </div>

        <div class="form w-100 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-50">
                <form action="{{ route("account.edit.update") }}" method="POST">
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
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>

                            <label class="mt-3" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="col-6">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="{{ Auth::user()->surname }}" required>

                            <label class="mt-3" for="login">Login</label>
                            <input type="text" class="form-control" id="login" name="login" value="{{ Auth::user()->login }}" required>
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
