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
            {{ $bestCourse->name }}
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
