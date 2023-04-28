<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;

class Index extends Controller
{
    public function show() {
        $courses = Course::count();
        $users = User::count();
        $enrollments = Enrollment::count();

        $temp = [];
        foreach (Enrollment::all() as $e) array_push($temp, $e->course_id);

        $occurrences = [];
        foreach ($temp as $item) {
            if (!isset($occurrences[$item])) {
              $occurrences[$item] = 0;
            }
            $occurrences[$item] += 1;
        }

        $max = 0;
        foreach ($occurrences as $l) {
            if ($l >= $max) $max = $l;
        }
        $key = array_search($max, $occurrences);

        $bestCourse = Course::find($key);

        return view("index", ["courses"=>$courses, "enrollments"=>$enrollments, "users"=>$users, "bestCourse"=>$bestCourse]);
    }
}
