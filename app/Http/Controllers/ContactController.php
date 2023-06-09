<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Contact::get();
        return view("contact.contact", [ "email"=>$data[0]->email, "phone"=>$data[0]->phone ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        if (Auth::user()->role_id != 1) return redirect()->route("contact");
        else {
            $data = Contact::get();
            return view("contact.edit", [ "email"=>$data[0]->email, "phone"=>$data[0]->phone ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request)
    {
        if (Auth::user()->role_id != 1) return redirect()->route("contact");
        else {
            $data = $request->validated();
            $c = Contact::find(1);
            $c->email = $data["email"];
            $c->phone = $data["phone"];
            $c->save();

            return redirect()->route("contact");
        }
    }
}
