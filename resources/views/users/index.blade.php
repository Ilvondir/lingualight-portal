<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <h2 class="mb-5">Administrator user panel</h2>

        <table class="table table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Login</th>
                <th>Email</th>
                <th>Role</th>
                <th>Registered</th>
                <th>Delete</th>
            </tr>
            @foreach ($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->surname }}</td>
                    <td>{{ $u->login }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->role->name }}</td>
                    <td>{{ $u->registered }}</td>
                    {{-- <td>
                        <a href="{{ route("users.delete", ["id"=>$u->id]) }}">
                            <button class="btn btn-black">Delete</button>
                        </a>
                    </td> --}}
                    <td>
                        <a href="{{ route("users.delete", ["id"=>$u->id]) }}">
                            <button class="btn btn-black">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

        @include("shared.footer")
    </div>
</body>
</html>
