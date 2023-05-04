<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <a href="{{ route('home') }}" class="text-white text-decoration-none">
                <h1>Registration was successful. Please return to the homepage and log in to your new account.</h1>
            </a>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
