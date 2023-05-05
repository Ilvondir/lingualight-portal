<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) return redirect()->route('home');
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

        $roleID = 0;
        if ($data["role"]=="Trainer") $roleID = 2;
        if ($data["role"]=="User") $roleID = 3;

        $user->role_id = $roleID;
        $user->registered = date("Y-m-d");
        $user->remember_token = null;

        if ($user->save()) {
            return view("users.success");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
