<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <h2 class="mb-5">Administrator user panel</h2>

        <div class="w-100 text-center">
            <a href="{{ route("users.register") }}">
                <button class="mb-5 p-3 btn btn-black"><span style="font-size: 2.3rem">Add new user</span></button>
            </a>
        </div>
        <div class="overflow-auto">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Registered</th>
                    <th>Confirmed</th>
                    <th>Edit</th>
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
                        <td>
                            @if ($u->confirmed === 0) No @endif
                            @if ($u->confirmed === 1) Yes @endif
                            @if ($u->confirmed === null) - @endif
                        </td>
                        <td>
                            <a href="{{ route("users.edit", ["id"=>$u->id]) }}">
                                <button class="btn btn-black">Edit</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route("users.delete", ["id"=>$u->id]) }}">
                                <button class="btn btn-black">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
