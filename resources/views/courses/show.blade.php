<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="mt-4 row">
            <div class="col-3">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="@if ($c->img == NULL) {{asset('storage/img/courses/logo.png')}} @else {{asset('storage/img/courses')."/".$c->img}} @endif" width="240" height="240" class="rounded">
                </div>
                <p class="mt-4">Author: <b>{{ $c->author->name }} {{ $c->author->surname }}</b></p>
                <p>Created: <b>{{ $c->created }}</b></p>
                <p>Contact: <b>{{ $c->author->email }}</b></p>
            </div>
            <div class="col-9">
                <h1>{{ $c->name }}</h1>

                <div class="row">
                    <div class="col-6">
                        <p class="mt-3">Language: <b>{{ $c->language }}</b></p>
                        <p class="mb-0">Difficulty: <b>{{ $c->difficulty->level }}</b></p>
                    </div>
                    <div class="col-6">
                        <p class="mt-3">Form: <b>{{ $c->form->name }}</b></p>
                        <p class="mb-0">Headquarter: <b>{{ $c->headquarter }}</b></p>
                    </div>
                </div>

                <h3 class="mt-5 mb-5">Price: {{ $c->price }}$</h3>

                <div class="card bg-black text-white mb-2 p-2 rounded ">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <p class="mt-1">Scheduled start: <b>{{ $c->scheduled_start }}</b></p>
                            </div>
                            <div class="col-6">
                                <p class="mt-1">Hours: <b>{{ $c->hours }}</b></p>
                            </div>
                        </div>

                        <div style="text-align: justify; white-space: pre-wrap;">{{ $c->description }}</div>

                        <div class="row">
                            <div class="col-6">
                                <p class="mt-4" style="white-space: pre-wrap;">Required: <br><b>{{ $c->difficulty->required }}</b></p>
                            </div>
                            <div class="col-6">
                                <p class="mt-4" style="white-space: pre-wrap;">Nice to have: <br><b>{{ $c->difficulty->nice_to_have }}</b></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
