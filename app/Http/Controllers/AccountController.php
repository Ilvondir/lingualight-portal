<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\FilterCourseRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function menu() {
        return view("account.menu");
    }

    public function password() {
        return view("account.password");
    }

    public function change(ChangePasswordRequest $request) {

        $data = $request->validated();

        if (Hash::check($data["oldPassword"], Auth::user()->password)) {
            $data["password"] = Hash::make($data["password"]);
            $user = User::findOrFail(Auth::user()->id);
            $user->update($data);
            return view("account.success");
        } else {
            return back()->withErrors([
                "error"=>"The old password is wrong.",
            ]);
        }
    }


    public function edit()
    {
        return view("account.edit");
    }


    public function update(UpdateUserRequest $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $data = $request->validated();
        $user->name = $data["name"];
        $user->surname = $data["surname"];
        $user->login = $data["login"];
        $user->email = $data["email"];
        $user->save();
        return view("account.success");
    }

    public function delete() {
        if (Auth::user()->role_id == 1) return redirect()->route("account.menu");
        else return view("account.delete");
    }

    public function destroy() {
        if (Auth::user()->role_id == 1) return redirect()->route("account.menu");
        else {
            $user = User::find(Auth::user()->id);
            Auth::logout();
            $user->delete();
            return redirect()->route("auth.login");
        }
    }

    public function courses() {

        if (Auth::user()->role_id != 3) return redirect()->route("account.menu");
        else {

            $enrollments = Enrollment::where("user_id", "=", Auth::user()->id)->get();
            $courses1 = Course::where("visible", "=", 1)->get();
            $thisUserCourses = [];
            foreach ($enrollments as $e) {
                if ($e->course->visible!=0 && !in_array($e->course_id, $thisUserCourses)) array_push($thisUserCourses, $e->course_id);
            }

            $courses = [];
            foreach ($thisUserCourses as $id) {
                array_push($courses, $courses1->find($id));
            }

            return view("courses.courses", ["courses"=>$courses, "languages" => $this->getLanguages($enrollments, $courses1), "headquarters" => $this->getHeadquarters($enrollments, $courses1)]);

        }

    }

    public function filterCourse(FilterCourseRequest $request) {
        if (Auth::user()->role_id != 3) return redirect()->route("account.menu");
        else {
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
                if ($form == "Remote") $form = 1;
                if ($form == "Hybrid") $form = 2;
                array_push($whereTable, ["form_id", "=", $form]);
            }

            if ($minPrice!=null && $maxPrice!=null) {
                array_push($whereTable, ["price", ">=", $minPrice]);
                array_push($whereTable, ["price", "<=", $maxPrice]);
            }

            if ($headquarter != "All") array_push($whereTable, ["headquarter", "=", $headquarter]);

            $filteredCourses = Course::idDescending()->with("form")->where( $whereTable )->get();

            $enrollments = Enrollment::where("user_id", "=", Auth::user()->id)->get();
            $thisUserCourses = [];
            foreach ($enrollments as $e) {
                if ($e->course->visible!=0 && !in_array($e->course_id, $thisUserCourses)) array_push($thisUserCourses, $e->course_id);
            }

            $courses = [];
            foreach ($filteredCourses as $c) {
                if (in_array($c->id, $thisUserCourses)) array_push($courses, $c);
            }

            $crs = Course::get();

            return view("courses.courses", ["courses"=>$courses, "languages" => $this->getLanguages($enrollments, $crs), "headquarters" => $this->getHeadquarters($enrollments, $crs)]);
        }
    }

    public static function getLanguages($enrollments, $crs) : array
    {
        $thisUserCourses = [];
        foreach ($enrollments as $e) {
            if ($e->course->visible!=0 && !in_array($e->course_id, $thisUserCourses)) array_push($thisUserCourses, $e->course_id);
        }

        $courses = [];
        foreach ($thisUserCourses as $id) {
            array_push($courses, $crs->find($id));
        }

        $languages = [];
        foreach ($courses as $c) {
            if (!in_array($c->language, $languages)) array_push($languages, $c->language);
        }

        return $languages;
    }

    public static function getHeadquarters($enrollments, $crs) : array
    {
        $thisUserCourses = [];
        foreach ($enrollments as $e) {
            if ($e->course->visible!=0 && !in_array($e->course_id, $thisUserCourses)) array_push($thisUserCourses, $e->course_id);
        }

        $courses = [];
        foreach ($thisUserCourses as $id) {
            array_push($courses, $crs->find($id));
        }

        $heads = [];
        foreach ($courses as $c) {
            if (!in_array($c->headquarter, $heads)) array_push($heads, $c->headquarter);
        }

        return $heads;
    }

    public function your_courses () {

        if (Auth::user()->role_id != 2 || Auth::user()->confirmed==0) return redirect()->route("account.menu");
        else {

            $courses = Course::where([["author_id", "=", Auth::user()->id], ["visible", "=", 1]])->get();
            return view("courses.courses", ["courses" => $courses, "languages" => $this->getLanguagesForTrainer($courses), "headquarters" => $this->getHeadquartersForTrainer($courses)]);
        }

    }

    public function filter_your_courses (FilterCourseRequest $request) {
        if (Auth::user()->role_id != 2 || Auth::user()->confirmed==0) return redirect()->route("account.menu");
        else {

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
                if ($form == "Remote") $form = 1;
                if ($form == "Hybrid") $form = 2;
                array_push($whereTable, ["form_id", "=", $form]);
            }

            if ($minPrice!=null && $maxPrice!=null) {
                array_push($whereTable, ["price", ">=", $minPrice]);
                array_push($whereTable, ["price", "<=", $maxPrice]);
            }

            if ($headquarter != "All") array_push($whereTable, ["headquarter", "=", $headquarter]);

            array_push($whereTable, ["author_id", "=", Auth::user()->id]);

            $courses = Course::idDescending()->with("form")->where( $whereTable )->get();

            $crs = Course::where([["author_id", "=", Auth::user()->id], ["visible", "=", 1]])->get();

            return view("courses.courses", ["courses"=>$courses, "languages" => $this->getLanguagesForTrainer($crs), "headquarters" => $this->getHeadquartersForTrainer($crs)]);
        }
    }

    public function getLanguagesForTrainer ($courses) {
        $langs = [];
        foreach ($courses as $c) {
            if (!in_array($c->language, $langs)) array_push($langs, $c->language);
        }
        return $langs;
    }

    public function getHeadquartersForTrainer ($courses) {
        $heads = [];
        foreach ($courses as $c) {
            if (!in_array($c->headquarter, $heads)) array_push($heads, $c->headquarter);
        }
        return $heads;
    }
}
