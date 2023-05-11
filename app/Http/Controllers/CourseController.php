<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\FilterCourseRequest;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::idDescending()->with(["author", "difficulty", "form"])->get();
        return view("courses.courses", ["courses"=>$courses, "languages" => $this->getLanguages($courses), "headquarters" => $this->getHeadquarters($courses)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $course = Course::find($id);
        if (Auth::check()) {
            if (Auth::user()->role_id != 3) return view("courses.show", ["c"=>$course, "already"=>false]);
            else {
                $enrollments = Enrollment::where("user_id", "=", Auth::user()->id)->get();

                $already = false;
                foreach ($enrollments as $e) {
                    if ($e->course_id == $id) $already = true;
                }

                return view("courses.show", ["c"=>$course, "already"=>$already]);
            }
        }

        return view("courses.show", ["c"=>$course, "already"=>false]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    public function filter(FilterCourseRequest $request) {

        $data = $request->validated();

        $name = $data["title"];
        $language = $data["language"];
        $dif = $data["difficulty"];
        $form = $data["form"];
        $headquarter = $data["headquarter"];
        $minPrice = $data["minPrice"];
        $maxPrice = $data["maxPrice"];

        $whereTable = [
            ["name", "LIKE", "%".$name."%"],
        ];

        if ($language != "All") array_push($whereTable, ["language", "LIKE", "%".$language."%"]);

        if ($dif != "All") {
            if ($dif == "A1") $dif = 1;
            if ($dif == "A2") $dif = 2;
            if ($dif == "B1") $dif = 3;
            if ($dif == "B2") $dif = 4;
            if ($dif == "C1") $dif = 5;
            if ($dif == "C2") $dif = 6;
            array_push($whereTable, ["difficulty_id", "=", $dif]);
        }

        if ($form != "All") {
            if ($form == "Stationary") $form = 1;
            if ($form == "Remote") $form = 2;
            if ($form == "Hybrid") $form = 3;
            array_push($whereTable, ["form_id", "=", $form]);
        }

        if ($minPrice!=null && $maxPrice!=null) {
            array_push($whereTable, ["price", ">=", $minPrice]);
            array_push($whereTable, ["price", "<=", $maxPrice]);
        }

        if ($headquarter != "All") array_push($whereTable, ["headquarter", "=", $headquarter]);

        $courses = Course::idDescending()->where( $whereTable )->get();
        $cToF = Course::get();

        return view("courses.courses", ["courses"=>$courses, "languages" => $this->getLanguages($cToF), "headquarters" => $this->getHeadquarters($cToF)]);
    }

    public static function getLanguages($courses) : array
    {
        $languages = [];
        foreach ($courses as $course) {
            if (!in_array($course->language, $languages)) array_push($languages, $course->language);
        }

        return $languages;
    }

    public static function getHeadquarters($courses) : array
    {
        $heads = [];
        foreach ($courses as $course) {
            if (!in_array($course->headquarter, $heads)) array_push($heads, $course->headquarter);
        }

        return $heads;
    }
}
