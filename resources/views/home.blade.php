<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset("storage/img/carousel/carousel1.png") }}" class="d-block w-100" alt="Carousel1.">
                <div class="carousel-caption d-none d-md-block">
                <h5>Unlock a world of opportunity</h5>
                <p>Discover new cultures and connect with people from around the globe by learning a new language.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset("storage/img/carousel/carousel2.png") }}" class="d-block w-100" alt="Carousel2.">
                <div class="carousel-caption d-none d-md-block">
                <h5>Language learning made easy</h5>
                <p>With our expert trainers and user-friendly online platform, mastering a new language has never been more accessible.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset("storage/img/carousel/carousel3.png") }}" class="d-block w-100" alt="Carousel3.">
                <div class="carousel-caption d-none d-md-block">
                <h5>Transform your future with language</h5>
                <p>Gain a competitive edge in the job market and open doors to new opportunities with language skills that will last a lifetime.</p>
                </div>
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="mt-5">
            <h3>On our portal</h3>

            <div class="row text-center fs-3">
                <div class="col-sm">
                    We have
                    <h1 class="mt-5 mb-5 display-1">
                        <input id="courses" value="0" size="2" disabled>
                    </h1>
                    course offers that you can already apply for!
                </div>
                <div class="col-sm">
                    Together we have
                    <h1 id="users" class="mt-5 mb-5 display-1">
                        <input id="users" value="0" size="2" disabled>
                    </h1>
                    registered users who trusted us on their career path!
                </div>
                <div class="col-sm">
                    We have enrolled
                    <h1 id="enrollments" class="mt-5 mb-5 display-1">
                        <input id="enrollments" value="0" size="2" disabled>
                    </h1>
                    people in our courses, which proves our popularity.
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h3>Most popular course</h3>
            <a href="{{ route("course.show", ["id"=>$bestCourse->id]) }}" class="text-decoration-none">
                <div class="card bg-black text-white mt-2 mb-2 p-2 rounded ">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-2 d-flex justify-content-center align-items-center">
                                <img src="@if ($bestCourse->img == NULL) {{asset('storage/img/courses/logo.png')}} @else {{asset('storage/img/courses')."/".$bestCourse->img}} @endif" width="120" height="120" class="rounded">
                            </div>
                            <div class="col-8">
                                <h4>{{ $bestCourse->name }}</h4>

                                <div class="row">
                                    <div class="col-6">
                                        <p class="mt-3">Language: <b>{{ $bestCourse->language }}</b></p>
                                        <p class="mb-0">Difficulty: <b>{{ $bestCourse->difficulty->level }}</b></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mt-3">Form: <b>{{ $bestCourse->form->name }}</b></p>
                                        <p class="mb-0">Headquarters: <b>{{ $bestCourse->headquarter }}</b></p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-2 text-end">
                                <h6>@if ($bestCourse->created != date("Y-m-d")) {{ $bestCourse->price}}$ @else <span style="color: #609097"><s>{{$bestCourse->price}}$</s><br>{{ $bestCourse->price*0.9 }}$</span> @endif</h6>
                            </div>
                        </div>
                        <p class="mb-0 mt-4" style="text-align: justify">{{$bestCourse->description}}</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="mt-5">
            <h3>Top 10 languages on portal</h3>
            <div class="d-flex justify-content-center align-content-center mt-4">
                <table class="table table-dark text-white w-50">
                    <tr>
                        <th>#</th>
                        <th>Language</th>
                        <th>Number of enrollments</th>
                    </tr>
                    @foreach ($ranking as $record)
                        <tr>
                            <td>{{ $record[0] }}.</td>
                            <td>{{ $record[1] }}</td>
                            <td>{{ $record[2] }} in {{ $record[3] }} courses</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="mt-5">
            <h3 class="mb-4">World language ranking</h3>
            <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    @foreach ($descriptions as $description)
                        <div class="carousel-item @if ($description[0][0]=="1. Chinese") active @endif">
                            <div class="row">
                                @foreach ($description as $d)

                                <div class="d-flex col justify-content-center align-items-center">

                                    <div class="card bg-black text-white" style="width: 18rem">
                                        <img src="{{ asset("storage/img/flags")."/".$d[2] }}" class="card-img-top" alt="{{$d[2]}}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $d[0] }}</h5>
                                            <p class="card-text">{{ $d[1] }}</p>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>

        @include("shared.footer")
    </div>
    <script>
        function animation() {
            anime({
                targets: '#courses',
                value: [0, {{ $courses }}],
                round: 1,
                easing: 'linear'
            });
            anime({
                targets: '#users',
                value: [0, {{ $users }}],
                round: 1,
                easing: 'linear'
            });
            anime({
                targets: '#enrollments',
                value: [0, {{ $enrollments }}],
                round: 1,
                easing: 'linear'
            });
        }

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) animation();
            });
        });
        const targetElement = document.querySelector('#courses');
        observer.observe(targetElement);
    </script>
</body>
</html>
