<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\FilterCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("courses.courses", ["courses"=>Course::idDescending()->get(), "languages" => $this->getLanguages(), "headquarters" => $this->getHeadquarters()]);
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
        return view("courses.show", ["c"=>$course]);
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
            if ($dif == "Easy") $dif = 1;
            if ($dif == "Medium") $dif = 2;
            if ($dif == "Hard") $dif = 3;
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

        return view("courses.courses", ["courses"=>$courses, "languages" => $this->getLanguages(), "headquarters" => $this->getHeadquarters()]);
    }

    public static function getLanguages() : array
    {
        $languages = [];
        foreach (Course::all() as $course) {
            if (!in_array($course->language, $languages)) array_push($languages, $course->language);
        }

        return $languages;
    }

    public static function getHeadquarters() : array
    {
        $heads = [];
        foreach (Course::all() as $course) {
            if (!in_array($course->headquarter, $heads)) array_push($heads, $course->headquarter);
        }

        return $heads;
    }
}
