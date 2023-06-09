<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class EnrollmentController extends Controller
{

    public function payed(int $id) {

        if (Auth::user()->role_id != 3) return redirect()->route("courses.index");

        if (session()->has("session_id")) {

            \Stripe\Stripe::setApiKey(env("STRIPE_SECRET"));
            $sessionId = session("session_id");
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            session()->forget("session_id");
            print_r($session);

            if ($session["payment_status"]=="paid") {

                $enrl = Enrollment::where([["course_id", "=", $id], ["user_id", "=", Auth::user()->id]])->get();
                $e = Enrollment::find($enrl[0]->id);
                $e->payment_date = date("Y-m-d");
                $e->save();

            }
        }

        return redirect()->route("course.show", ["id"=>$id]);

    }

    public function form(int $id) {
        if (Auth::user()->role_id != 3) return redirect()->route("courses.index");
        else {

            if (session()->has("session_id")) session()->forget("session_id");

            $action = $_POST["submit"];

            if ($action == "Unenroll from course") {
                $enrl = Enrollment::where([["course_id", "=", $id], ["user_id", "=", Auth::user()->id]])->get();
                $e = Enrollment::find($enrl[0]->id);
                $e->delete();
                return redirect()->route("course.show", ["id"=>$id]);
            }

            if ($action == "Enroll in the course") {
                $enrollment = new Enrollment();

                $enrollment->user_id = Auth::user()->id;
                $enrollment->course_id = $id;
                $enrollment->enrollment_date = date("Y-m-d");

                $c = Course::find($id);
                $enrollment->to_pay = $c->price;
                if ($c->created == date("Y-m-d")) $enrollment->to_pay =  $enrollment->to_pay*0.95;

                $enrollment->payment_date = null;

                $enrollment->save();

                return redirect()->route("course.show", ["id"=>$id]);
            }

            if ($action == "Pay for course") {

                Stripe::setApiKey(env("STRIPE_SECRET"));

                try {

                    $enrl = Enrollment::where([["course_id", "=", $id], ["user_id", "=", Auth::user()->id]])->get();
                    $e = Enrollment::find($enrl[0]->id);

                    $checkout_session = \Stripe\Checkout\Session::create([
                        "line_items" => [
                            [
                                'price_data' => [
                                    'currency' => 'usd',
                                    'product_data' => [
                                        'name' => $e->course->name,
                                    ],
                                    'unit_amount' => $e->to_pay*100,
                                ],
                                'quantity' => 1,
                            ]
                        ],
                        'mode' => 'payment',
                        'success_url' => route("enrollment.payed", ["id"=>$id]),
                        'cancel_url' => request()->fullUrl(),
                    ]);
                    session()->put('session_id', $checkout_session->id);
                    return redirect($checkout_session->url);

                } catch (Exception $e) {
                    return $e->getMessage();
                }
            }
        }
    }
}
