<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <h2 class="mb-3">Contact us!</h2>

        <ul style="font-size: 1.2rem">
            <li>Phone number: {{ $phone }}</li>
            <li>Email: {{ $email }}</li>
        </ul>

        @auth
            @if (Auth::user()->role_id==1)
                <a href="{{ route("contact.edit") }}">
                    <button class="mb-5 p-3 btn btn-black"><span style="font-size: 2.3rem">Edit contacts</span></button>
                </a>
            @endif
        @endauth

        <h2 class="mb-3">You can also visit us!</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20503.909084747447!2d21.996486089113958!3d50.030308770588135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473cfaf83c5a9833%3A0x432f7dd9b86f7a01!2sUniwersytet%20Rzeszowski!5e0!3m2!1spl!2spl!4v1685039924282!5m2!1spl!2spl" style="border:0" height="400" class="col-12 col-lg-7" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        @include("shared.footer")
    </div>
</body>
</html>
