<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use Exception;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;

class EnrollmentController extends Controller
{
    public function form(int $id) {
        if (!Auth::check()) return redirect()->route("courses.index");
        else {
            if (Auth::user()->role_id != 3) return redirect()->route("courses.index");
            else {

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
                    $enrollment->to_pay = Course::find($id)->price;
                    $enrollment->payment_date = null;

                    $enrollment->save();

                    return redirect()->route("course.show", ["id"=>$id]);
                }

                if ($action == "Pay for course") {

                    Stripe::setApiKey("sk_test_51NA93CDCjkSWfv1NeFTtsT1QE1lEbCn3XX98nX8rtDUWwicIqvK5k5Gt6Nw6gR4iBduVGStXe4g1qtbtk7OiauNV00Cg812Qy0");

                    try {

                        $enrl = Enrollment::where([["course_id", "=", $id], ["user_id", "=", Auth::user()->id]])->get();
                        $e = Enrollment::find($enrl[0]->id);

                        $charge = Charge::create([
                            'amount' => $e->to_pay*100,
                            'currency' => 'usd',
                            'source' => 'tok_visa',
                            'description' => 'Payment for course "'. $e->course->name. '"',
                        ]);

                        $e->payment_date = date("Y-m-d");
                        $e->save();

                        return redirect()->route("course.show", ["id"=>$id]);

                    } catch (Exception $e) {
                        return $e->getMessage();
                    }
                }
            }
        }
    }
}
