<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <h2 class="mb-5">
            Confirmation requests
        </h2>

        <h4 class="mb-2">New requests</h4>
        @forelse ($new as $r)

            <a href="{{ route("confirmations.show", ["id"=>$r->id]) }}" class="text-decoration-none">
                <div class="card bg-black text-white mt-2 mb-2 p-2 rounded ">
                    <div class="card-body">

                        <h4>{{ $r->subject }}</h4>
                        <p class="mb-0">Author: <b>{{ $r->trainer->name }} {{ $r->trainer->surname }}</b></p>

                    </div>
                </div>
            </a>

        @empty
            No new requests
        @endforelse

        <h4 class="mb-2 mt-4">Archived requests</h4>
        @forelse ($old as $r)

            <a href="{{ route("confirmations.show", ["id"=>$r->id]) }}" class="text-decoration-none">
                <div class="card bg-black text-white mt-2 mb-2 p-2 rounded ">
                    <div class="card-body">

                        <h4><s>{{ $r->subject }}</s></h4>
                        <p class="mb-0"><s>Author: <b>{{ $r->trainer->name }} {{ $r->trainer->surname }}</b></s></p>

                    </div>
                </div>
            </a>

        @empty
            No archived requests
        @endforelse


        @include("shared.footer")
    </div>
</body>
</html>
