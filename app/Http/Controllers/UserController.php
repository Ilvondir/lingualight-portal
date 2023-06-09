<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditDataRequest;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) return redirect()->route("auth/login");
        if (Auth::user()->role_id != 1) return redirect()->route("home");

        $users = User::with("role")->where([["id", "!=", Auth::user()->id]])->get();
        return view("users.index", ["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->role_id != 1) return redirect()->route('home');
        }
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $user = new User();

        $user->name = $data["name"];
        $user->surname = $data["surname"];
        $user->login = $data["login"];
        $user->email = $data["email"];
        $user->password = Hash::make($data["password"]);

        $roleID = 1;
        if ($data["role"]=="Administrator") $roleID = 1;
        if ($data["role"]=="Trainer") $roleID = 2;
        if ($data["role"]=="User") $roleID = 3;

        $user->role_id = $roleID;
        $user->registered = date("Y-m-d");
        $user->remember_token = null;

        $user->confirmed = null;
        if ($roleID == 2) $user->confirmed = 0;


        if ($user->save()) {
            Auth::login($user);
            return view("users.success");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        if (Auth::user()->role_id != 1) return redirect()->route("account.menu");

        $user = User::find($id);

        return view("users.edit", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminEditDataRequest $request, int $id)
    {
        if (Auth::user()->role_id != 1) return redirect()->route("account.menu");

        $u = User::find($id);

        $data = $request->validated();

        $u->name = $data["name"];
        $u->surname = $data["surname"];
        $u->email = $data["email"];
        $u->login = $data["login"];

        if ($data["password"] != null) $u->password = Hash::make($data["password"]);

        $u->save();

        return redirect()->route("users.index");
    }

    public function delete(int $id) {
        if (Auth::user()->role_id != 1) return redirect()->route("account.menu");
        $user = User::find($id);
        return view("users.delete", ["user"=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (Auth::user()->role_id != 1) return redirect()->route("account.menu");

        $user = User::find($id);
        $user->delete();

        return redirect()->route("users.index");
    }
}
