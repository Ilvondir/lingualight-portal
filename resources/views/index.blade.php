<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body>
    @include("shared.navbar")

    <div id="mainCarousel" class="carousel slide">
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
</body>
</html>
