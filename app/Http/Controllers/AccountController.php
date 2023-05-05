<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangePasswordRequest;
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
            return view("account.passwordSuccess");
        } else {
            return back()->withErrors([
                "error"=>"The old password is wrong.",
            ]);
        }
    }
}
