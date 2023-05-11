<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <a href="{{ route('home') }}" class="text-white text-decoration-none">
                <h1>Your course has been created! Go to your course page to edit it.</h1>
            </a>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
