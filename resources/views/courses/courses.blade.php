<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">
        <h2 class="mb-5">Check our courses</h2>
        <div class="row">
            <div class="col-3">

                <form method="POST" class="form" action="#">
                    @csrf
                    <input type="text" placeholder="Title" title="Title" name="title" class="form-control">

                    <div class="text-center mt-4 w-100">
                        <input type="submit" value="Search" class="btn btn-primary">
                    </div>
                </form>


            </div>
            <div class="col-9">

                @foreach ($courses as $course)

                <a href="{{ route("course.show", ["id"=>$course->id]) }}" class="text-decoration-none">
                    <div class="card bg-black text-white mt-2 mb-2 p-2 rounded ">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-2 d-flex justify-content-center align-items-center">
                                    <img src="@if ($course->img == NULL) {{asset('storage/img/courses/logo.png')}} @else {{asset('storage/img/courses')."/".$course->img}} @endif" width="120" height="120" class="rounded">
                                </div>
                                <div class="col-8">
                                    <h4>{{ $course->name }}</h4>

                                    <div class="row">
                                        <div class="col-6">
                                            <p class="mt-3">Language: <b>{{ $course->language }}</b></p>
                                            <p class="mb-0">Difficulty: <b>{{ $course->difficulty->level }}</b></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mt-3">Form: <b>{{ $course->form->name }}</b></p>
                                            <p class="mb-0">Headquarter: <b>{{ $course->headquarter }}</b></p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-2 text-end">
                                    <h6>@if ($course->created != date("Y-m-d")) {{ $course->price}}$ @else <span style="color: #609097"><s>{{$course->price}}$</s><br>{{ $course->price*0.9 }}$</span> @endif</h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>

                @endforeach

            </div>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
