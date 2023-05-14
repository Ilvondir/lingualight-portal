<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <a href="{{ route('courses.index') }}" class="text-white text-decoration-none">
                <h1>Your data has been saved! Go to course page to check them.</h1>
            </a>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
