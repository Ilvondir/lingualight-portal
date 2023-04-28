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

        $occurrences = [];
        foreach (Enrollment::all() as $item) {
            if (!isset($occurrences[$item->course_id])) {
              $occurrences[$item->course_id] = 0;
            }
            $occurrences[$item->course_id] += 1;
        }

        $max = 0;
        foreach ($occurrences as $l) if ($l >= $max) $max = $l;
        $key = array_search($max, $occurrences);

        $bestCourse = Course::find($key);

        $languageData = array(
            array("1.3 billion speakers", "16.2%"),
            array("460 million speakers", "5.85%"),
            array("379 million speakers", "4.83%"),
            array("341 million speakers", "4.34%"),
            array("315 million speakers", "4.01%"),
            array("228 million speakers", "2.91%"),
            array("221 million speakers", "2.81%"),
            array("154 million speakers", "1.97%"),
            array("128 million speakers", "1.63%")
        );
        $descriptions = array(
            [
                array("1. Chinese", "Chinese (Mandarin) is the most widely spoken language in the world, with " . $languageData[0][0] . " and is spoken by " . $languageData[0][1] . " of the world's population.", "china.jpg"),
                array("2. Spanish", "Spanish is the second most spoken language in the world, with " . $languageData[1][0] . " and is spoken by " . $languageData[1][1] . " of the world's population.", "spain.jpg"),
                array("3. English", "English is the third most spoken language in the world, with " . $languageData[2][0] . " and is spoken by " . $languageData[2][1] . " of the world's population.", "united-kingdom.jpg")
            ],
            [
                array("4. Hindi", "Hindi is the fourth most spoken language in the world, with " . $languageData[3][0] . " and is spoken by " . $languageData[3][1] . " of the world's population.", "india.jpg"),
                array("5. Arabic", "Arabic is the fifth most spoken language in the world, with " . $languageData[4][0] . " and is spoken by " . $languageData[4][1] . " of the world's population.", "arabia.jpg"),
                array("6. Bengali", "Bengali is the sixth most spoken language in the world, with " . $languageData[5][0] . " and is spoken by " . $languageData[5][1] . " of the world's population.", "bangladesh.jpg"),
            ],
            [
                array("7. Portuguese", "Portuguese is the seventh most spoken language in the world, with " . $languageData[6][0] . " and is spoken by " . $languageData[6][1] . " of the world's population.", "portugal.jpg"),
                array("8. Russian", "Russian is the eighth most spoken language in the world, with " . $languageData[7][0] . " and is spoken by " . $languageData[7][1] . " of the world's population.", "russia.jpg"),
                array("9. Japanese", "Japanese is the ninth most spoken language in the world, with " . $languageData[8][0] . " and is spoken by " . $languageData[8][1] . " of the world's population.", "japan.jpg")
            ]
        );

        return view("home", ["courses"=>$courses, "enrollments"=>$enrollments, "users"=>$users, "bestCourse"=>$bestCourse, "descriptions"=>$descriptions]);
    }
}
