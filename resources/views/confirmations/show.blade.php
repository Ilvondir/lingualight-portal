<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row">
            <div class="col-9">
                <div><h1>{{ $confirmation->subject }}</h1></div>
                <p>Author: <b>{{ $confirmation->trainer->name }} {{ $confirmation->trainer->surname }}</b></p>
                <p>Sended: <b>{{ $confirmation->date }}</b></p>
            </div>
            <div class="col-3">
                <a href="{{ asset("storage/archives/".$confirmation->file) }}" download>
                    <button style="font-size: 1.8rem" class="btn btn-black"><i class="fa fa-download"></i> Download documents</button>
                </a>
            </div>
        </div>

        <div class="card bg-black text-white mb-2 p-2 rounded ">
            <div class="card-body">
                {{ $confirmation->message }}
            </div>
        </div>

        @if ($confirmation->considered==0)

            <div class="text-center w-100">
                <form action="{{ route("confirmations.verdict", ["id"=>$confirmation->id]) }}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-black mr-5" name="submit" value="Confirm account">
                    <input type="submit" class="btn btn-black ml-5" name="submit" value="Reject confirmation">

                </form>
            </div>

        @else

        <div class="text-center w-100">
            <p>This request is archived.</p>
        </div>

        @endif

        @include("shared.footer")
    </div>
</body>
</html>