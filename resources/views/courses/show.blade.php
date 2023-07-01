<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="mt-4 row">
            <div class="col-12 col-lg-3">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="@if ($c->img == NULL) {{asset('storage/img/courses/logo.png')}} @else {{asset('storage/img/courses')."/".$c->img}} @endif" width="240" height="240" class="rounded">
                </div>
                @if ($c->author_id!=null) <p class="mt-4">Author: <b>{{ $c->author->name }} {{ $c->author->surname }}</b></p> @endif
                <p @if ($c->author_id==null) class="mt-4" @endif>Created: <b>{{ $c->created }}</b></p>
                @if ($c->author_id!=null) <p>Contact: <b>{{ $c->author->email }}</b></p> @endif


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
            <div class="col-12 mt-lg-0 mt-5 col-lg-9">
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

                    <div class="col-12 col-lg-5">
                        <h3 class="mt-lg-5 mt-4 mb-lg-5 mb-4 w-100">

                            @if (Auth::check())

                                @if (Auth::user()->role_id==3)

                                    @if ($already)
                                        Your price: {{ number_format($price, 2, ".", " ") }}$
                                    @else
                                        Price:
                                        @if ($c->created != date("Y-m-d")) {{ $c->price }}$ @else <span style="color: #609097">{{ number_format($c->price*0.95, 2, ".", " ") }}$</span> @endif
                                    @endif

                                @else
                                    Price:
                                    @if ($c->created != date("Y-m-d")) {{ $c->price }}$ @else <span style="color: #609097">{{ number_format($c->price*0.95, 2, ".", " ") }}$</span> @endif
                                @endif

                            @else
                                Price:
                                @if ($c->created != date("Y-m-d")) {{ $c->price }}$ @else <span style="color: #609097">{{ number_format($c->price*0.95, 2, ".", " ") }}$</span> @endif
                            @endif


                    </h3>
                    </div>

                    <div class="col-12 col-lg-7">

                    @if (Auth::guest())

                        @if (strtotime(date("Y-m-d")) < strtotime($c->scheduled_start))
                            <div class="w-100 text-left mt-5">
                                <a href="{{ route("auth.login") }}" class="text-white text-decoration-none">
                                    <h4>Log in to enroll in the course!</h4>
                                </a>
                            </div>
                        @endif

                    @else

                    @if ($c->visible==0)
                        <div class="w-100 text-left mt-5">
                            <h4>This course is archived.</h4>
                        </div>
                    @endif

                        @if (Auth::user()->role_id==3)
                            @if (!$already)

                                @if (date("Y-m-d")<$c->scheduled_start)
                                    <div class="w-100 text-center mt-0 mb-5 mb-lg-0 mt-lg-4">
                                        <form method="POST" action="{{ route("enrollment.form", ["id"=>$c->id]) }}">
                                            @csrf
                                            <button value="Enroll in the course" name="submit" class="mt-3 mt-lg-0 btn btn-black p-3" id="fontUp" type="submit"><i class="fa fa-check"></i> Enroll in the course</button>
                                        </form>
                                    </div>
                                @endif

                            @else

                                    @if ($payment)

                                        <div class="w-100 text-left mt-5 mb-5">
                                            <a href="{{ route("account.courses") }}" class="text-white text-center text-decoration-none">
                                                <h4>You have already fully enrolled in this course. Please wait for information from trainer.</h4>
                                            </a>
                                        </div>

                                    @else

                                    @if (date("Y-m-d")<$c->scheduled_start)

                                        <div class="w-100 text-center mt-2 mb-4 mb-lg-0 mt-lg-4">
                                            <form method="POST" action="{{ route("enrollment.form", ["id"=>$c->id]) }}">
                                                @csrf
                                                <button type="submit" name="submit" class="btn btn-black p-3" id="fontUp" value="Pay for course"><i class="fa fa-money"></i>  Pay for course</button>

                                                <button class="mt-3 mt-lg-0 btn btn-black p-3" name="submit" value="Unenroll from course" id="fontUp" type="submit"><i class="fa fa-close"></i>  Unenroll from course</button>
                                            </form>
                                        </div>

                                    @endif



                                @endif

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
                <div class="overflow-auto">
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
                </div>
            @endif
        @endif

        @include("shared.footer")
    </div>
</body>
</html>
