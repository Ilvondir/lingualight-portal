<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-12">
                <h1>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h1>
                <div><h4>Login: {{ Auth::user()->login }}</h4></div>
                <div><h4>Email: {{ Auth::user()->email }}</h4></div>
            </div>
            <div class="col-lg-6 col-12 text-lg-end">
                <h4>Registered: {{ Auth::user()->registered }}</h4>
            </div>
        </div>

        <div class="menu bg-black rounded p-2 mt-5 col-12 col-lg-8">

            @if (Auth::user()->role_id==1)
                <a href="{{ route("confirmations.index") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-2 pb-2 border-bottom" style="font-size: 1.1rem">Confirmation requests</div></a>

                <a href="{{ route("users.index") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-2 pb-2 border-bottom" style="font-size: 1.1rem">Users panel</div></a>
            @endif

            @if (Auth::user()->role_id==2 && Auth::user()->confirmed==1)
                <a href="{{ route("courses.create") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-2 pb-2 border-bottom" style="font-size: 1.1rem">Create course</div></a>

                <a href="{{ route("account.your_courses") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-2 pb-2 border-bottom" style="font-size: 1.1rem">Your courses</div></a>
            @elseif (Auth::user()->role_id==2 && Auth::user()->confirmed==0)
                <a href="{{ route("confirmation.create") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-2 pb-2 border-bottom" style="font-size: 1.1rem">Confirm trainer account</div></a>
            @endif

            @if (Auth::user()->role_id==3)
                <a href="{{ route("account.courses") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-2 pb-2 border-bottom" style="font-size: 1.1rem">Enrolled courses</div></a>
            @endif

            <a href="{{ route("account.edit") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-2 pb-2 border-bottom" style="font-size: 1.1rem">Update personal data</div></a>


            <a href=" {{ route("account.password") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-2 pb-2 @if (Auth::user()->role_id != 1) border-bottom @endif" style="font-size: 1.1rem">Change password</div></a>

            @if (Auth::user()->role_id!=1)
                <a href="{{ route("account.delete") }}" class="text-white text-decoration-none"><div class="nav-item w-100 pt-2 pb-2" style="font-size: 1.1rem">Delete account</div></a>
            @endif
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
