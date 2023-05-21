<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\FilterCourseRequest;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::idDescending()->with(["author", "difficulty", "form"])->where("visible", "=", 1)->get();
        return view("courses.courses", ["courses"=>$courses, "languages" => $this->getLanguages($courses), "headquarters" => $this->getHeadquarters($courses)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->role_id==2) return view("courses.form");
            else return redirect()->route("courses.index");
        }
        return redirect()->route("courses.index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();

        $c = new Course();

        $c->name = $data["name"];
        $c->language = $data["language"];
        $c->headquarter = $data["headquarter"];
        $c->scheduled_start = $data["start"];
        $c->hours = $data["hours"];
        $c->img = null;
        $c->description = $data["description"];
        $c->price = $data["price"];
        $c->author_id = Auth::user()->id;
        $c->created = date("Y-m-d");
        $c->visible = 1;

        if ($data["difficulty"]=="A1") $c->difficulty_id = 1;
        if ($data["difficulty"]=="A2") $c->difficulty_id = 2;
        if ($data["difficulty"]=="B1") $c->difficulty_id = 3;
        if ($data["difficulty"]=="B2") $c->difficulty_id = 4;
        if ($data["difficulty"]=="C1") $c->difficulty_id = 5;
        if ($data["difficulty"]=="C2") $c->difficulty_id = 6;

        if ($data["form"]=="Stationary") $c->form_id = 1;
        if ($data["form"]=="Remote") $c->form_id = 2;
        if ($data["form"]=="Hybrid") $c->form_id = 3;

        if ($data["img"]!=null) {
            $max = Course::max("id")+1;
            $name = $max.".png";
            $c->img = $name;

            if(Storage::exists('public/img/courses/'.$name)) Storage::delete('public/img/courses/'.$name);
            Storage::putFileAs("public/img/courses", $data["img"], $name);
        }

        $c->save();

        return view("courses.success");

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $course = Course::find($id);
        if (Auth::check()) {

            if ($course->visible==0 && Auth::user()->role_id!=1) return redirect()->route("courses.index");

            if (Auth::user()->role_id == 3) {
                $enrollments = Enrollment::where("user_id", "=", Auth::user()->id)->get();

                $already = false;
                $payment = false;
                foreach ($enrollments as $e) {
                    if ($e->course_id == $id) {
                        $already = true;
                        if ($e->payment_date != null) $payment = true;
                    }
                }

                return view("courses.show", ["c"=>$course, "already"=>$already, 'payment'=>$payment]);
            }

            if ($course->author_id == Auth::user()->id || Auth::user()->id == 1) {
                $enrollments = Enrollment::where("course_id", "=", $course->id)->get();
                $users = User::all();

                $enrolled = [];

                foreach ($enrollments as $e) {

                    $tab = [];
                    $user = $users->find($e->user_id);
                    $tab["name"] = $user->name;
                    $tab["surname"] = $user->surname;
                    $tab["email"] = $user->email;
                    $tab["enrolled_date"] = $e->enrollment_date;
                    $tab["payment"] = "No";
                    if ($e->payment_date != null) $tab["payment"] = "Yes";


                    array_push($enrolled, $tab);
                }

                return view("courses.show", ["c"=>$course, "enrolled" => $enrolled]);
            }
        }

        if ($course->visible==1) return view("courses.show", ["c"=>$course, "already"=>false]);
        else return redirect()->route("courses.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        if (Auth::check()) {
            if (Auth::user()->id == 3) return redirect()->route("courses.index");
            return view("courses.form", ["c" => Course::find($id)]);
        }
        return redirect()->route("auth.login");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, int $id)
    {
        if (Auth::user()->id == 3) return redirect()->route("auth.login");
        else {
            $c = Course::find($id);
            $data = $request->validated();

            $c->name = $data["name"];
            $c->language = $data["language"];
            $c->headquarter = $data["headquarter"];
            $c->scheduled_start = $data["start"];
            $c->hours = $data["hours"];
            $c->description = $data["description"];
            $c->price = $data["price"];

            if ($data["difficulty"]=="A1") $c->difficulty_id = 1;
            if ($data["difficulty"]=="A2") $c->difficulty_id = 2;
            if ($data["difficulty"]=="B1") $c->difficulty_id = 3;
            if ($data["difficulty"]=="B2") $c->difficulty_id = 4;
            if ($data["difficulty"]=="C1") $c->difficulty_id = 5;
            if ($data["difficulty"]=="C2") $c->difficulty_id = 6;

            if ($data["form"]=="Stationary") $c->form_id = 1;
            if ($data["form"]=="Remote") $c->form_id = 2;
            if ($data["form"]=="Hybrid") $c->form_id = 3;

            $c->save();

            return view("courses.success");
        }
    }


    public function delete(int $id) {
        if (!Auth::check()) return redirect()->route("auth.login");
        if (Auth::user()->role_id == 3) return redirect()->route("home");
        $c = Course::find($id);
        return view("courses.delete", ["c" => $c]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (!Auth::check()) return redirect()->route("auth.login");
        if (Auth::user()->role_id == 3) return redirect()->route("home");
        $c = Course::find($id);
        $c->visible = 0;
        $c->save();
        return redirect()->route("courses.index");
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
            ["visible", "=", 1],
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
