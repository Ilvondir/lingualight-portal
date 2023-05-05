<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function menu() {
        if (!Auth::check()) return redirect()->route("home");
        else return view("account.menu");
    }
}
