<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function menu() {
        if (!Auth::check()) return redirect()->route("home");
        else return view("account.menu");
    }

    public function password() {
        if (!Auth::check()) return redirect()->route("home");
        else return view("account.password");
    }

    public function change(ChangePasswordRequest $request) {
        if (!Auth::check()) return redirect()->route("home");

        $data = $request->validated();


        if (Hash::check($data["oldPassword"], Auth::user()->password)) {
            $data["password"] = Hash::make($data["password"]);
            $user = User::findOrFail(Auth::user()->id);
            $user->update($data);
            return view("account.success");
        } else {
            return back()->withErrors([
                "error"=>"The old password is wrong.",
            ]);
        }
    }


    public function edit()
    {
        if (!Auth::check()) return redirect()->route("home");
        else return view("account.edit");
    }


    public function update(UpdateUserRequest $request)
    {
        if (!Auth::check()) return redirect()->route("home");
        else {
            $user = User::findOrFail(Auth::user()->id);
            $data = $request->validated();
            $user->name = $data["name"];
            $user->surname = $data["surname"];
            $user->login = $data["login"];
            $user->email = $data["email"];
            $user->save();
            return view("account.success");
        }

    }

    public function delete() {
        if (!Auth::check()) return redirect()->route("home");
        else {
            if (Auth::user()->role_id == 1) return redirect()->route("home");
            else {
                return view("account.delete");
            }
        }
    }

    public function destroy() {
        if (!Auth::check()) return redirect()->route("home");
        else {
            if (Auth::user()->role_id == 1) return redirect()->route("home");
            else {
                $user = User::find(Auth::user()->id);
                Auth::logout();
                $user->delete();
                return redirect()->route("home");
            }
        }
    }
}
