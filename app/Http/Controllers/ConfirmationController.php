<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfirmationRequest;
use App\Models\Confirmation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) return redirect()->route("auth.login");
        else {
            if (Auth::user()->role_id!=1) return redirect()->route("account.menu");
            else {
                $requests = Confirmation::with("trainer")->get();
                $new = $requests->where("considered", "=", 0);
                $old = $requests->where("considered", "=", 1);

                return view("confirmations.index", ["new" => $new, "old" => $old]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) return redirect()->route("auth.login");
        else {
            if (Auth::user()->role_id!=2 || Auth::user()->confirmed==1) return redirect()->route("account.menu");
            else {

                $confs = Confirmation::where("trainer_id", "=", Auth::user()->id)->get();
                $confirmation = new Confirmation();

                $allConsidered = true;

                foreach ($confs as $c) if ($c->considered==0) {
                    $allConsidered = false;
                    $confirmation = $c;
                }

                if ($confs->count()==0 || $allConsidered) return view("confirmations.create");
                else return view("confirmations.show", ["confirmation"=>$confirmation]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConfirmationRequest $request)
    {
        $data = $request->validated();

        $c = new Confirmation();
        $c->trainer_id = Auth::user()->id;
        $c->subject = $data["subject"];
        $c->message = $data["message"];
        $c->date = date("Y-m-d");
        $name = Auth::user()->id."-".$_FILES["competences"]["name"];
        $c->file = $name;
        $c->considered = 0;

        if(Storage::exists('public/archives/'.$name)) Storage::delete('public/archives/'.$name);
        Storage::putFileAs("public/archives/", $data["competences"], $name);

        $c->save();

        return view("confirmations.success");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        if (!Auth::check()) return redirect()->route("auth.login");
        else {
            if (Auth::user()->role_id!=1) return redirect()->route("account.menu");
            else {
                $requests = Confirmation::with("trainer")->get();

                $r = $requests->find($id);

                return view("confirmations.show", ["confirmation" => $r]);
            }
        }
    }

    public function verdict(int $id) {
        if (!Auth::check()) return redirect()->route("auth.login");
        else {
            if (Auth::user()->role_id!=1) return redirect()->route("account.menu");
            else {
                $c = Confirmation::find($id);

                $verdict = $_POST["submit"];

                $c->considered = 1;
                $c->save();

                if ($verdict == "Confirm account") {
                    $trainer = User::find($c->trainer_id);
                    $trainer->confirmed = 1;
                    $trainer->save();
                }

                return redirect()->route("confirmations.index");
            }
        }
    }
}
