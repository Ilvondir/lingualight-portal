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


                @auth
                    @if (($c->author_id == Auth::user()->id || Auth::user()->role_id == 1) && $c->visible==1)
                        <div>
                            <a href="{{ route("course.edit", ["id" => $c->id]) }}">
                                <button class="btn btn-black p-3 w-100 mt-3" id="fontUp">Edit course</button>
                            </a>
                        </div>

                        <div>
                            <a href="{{ route("courses.delete", ["id" => $c->id]) }}">
                                <button class="btn btn-black p-3 w-100 mt-3" id="fontUp">Delete course</button>
                            </a>
                        </div>
                    @endif
                @endauth

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

                <div class="row">

                    <div class="col-5">
                        <h3 class="mt-5 mb-5 w-100">Price: {{ $c->price }}$</h3>
                    </div>

                    <div class="col-7">

                    @if (Auth::guest())
                        <div class="w-100 text-left mt-5">
                            <a href="{{ route("auth.login") }}" class="text-white text-decoration-none">
                                <h4>Log in to enroll in the course!</h4>
                            </a>
                        </div>

                    @else

                        @if ($c->visible==0)
                        <div class="w-100 text-left mt-5">
                            <h4>This course is archived.</h4>
                        </div>
                        @endif

                        @if (Auth::user()->role_id==3)
                            @if (!$already)
                                <div class="w-100 text-left mt-4">
                                    <form method="POST" action="{{ route("enrollment.store", ["id"=>request()->id]) }}">
                                        @csrf
                                        <button class="btn btn-black p-3" id="fontUp" type="submit"><i class="fa fa-check"></i> Enroll in the course.</button>
                                    </form>
                                </div>

                            @else
                                <div class="w-100 text-left mt-5">
                                    <a href="{{ route("account.courses") }}" class="text-white text-decoration-none">
                                        <h4>You have already enrolled in this course.</h4>
                                    </a>
                                </div>

                            @endif

                        @endif

                    @endif
                    </div>


                </div>





                <div class="card bg-black text-white mb-2 p-2 rounded ">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <p class="mt-1">Scheduled start: <b>{{ $c->scheduled_start }}</b></p>
                            </div>
                            <div class="col-6">
                                <p class="mt-1">Hours: <b>{{ $c->hours }} of 45 minutes</b></p>
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

        @if (Auth::check())
            @if (Auth::user()->id == $c->author_id || Auth::user()->id == 1)
                <h2 class="mb-5 mt-5">Enrolled users</h2>

                <table class="table table-dark text-white w-100">
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email contact</th>
                        <th>Date of enrollment</th>
                        <th>Payment</th>
                    </tr>

                    @foreach ($enrolled as $e)
                        <tr>
                            <td>{{ $e["name"] }}</td>
                            <td>{{ $e["surname"] }}</td>
                            <td>{{ $e["email"] }}</td>
                            <td>{{ $e["enrolled_date"] }}</td>
                            <td>{{ $e["payment"] }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        @endif

        @include("shared.footer")
    </div>
</body>
</html>
