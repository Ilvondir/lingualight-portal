<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollmentRequest $request, int $courseId)
    {
        $enrollment = new Enrollment();

        $enrollment->user_id = Auth::user()->id;
        $enrollment->course_id = $courseId;
        $enrollment->enrollment_date = date("Y-m-d");
        $enrollment->to_pay = Course::find($courseId)->price;
        $enrollment->payment_date = null;

        $enrollment->save();

        return redirect()->route("course.show", ["id"=>$courseId]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
