<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Delete account</h1>
        </div>

        <div class="form offset-lg-3 col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-100">
                <form action="{{ route("users.destroy", ["id"=>$user->id]) }}" method="POST">
                    @csrf
                    <div>Are you sure you want to delete user <b>{{ $user->name }} {{ $user->surname }}</b>? This operation is irreversible.</div>

                    <div class="w-100 text-center">
                        <button class="btn btn-dark mt-4" type="submit"><i class="fa fa-trash"></i>  Delete</button>
                    </div>

                </form>


            </div>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
