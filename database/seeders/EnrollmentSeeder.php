<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Enrollment;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enrollment::insert([
            [
                "user_id"=>5, "course_id"=>2, "enrollment_date"=>date("Y-m-d"), "to_pay"=>3550.00, "payment_date"=>null,
            ],
            [
                "user_id"=>6, "course_id"=>1, "enrollment_date"=>date("Y-m-d", strtotime("-1 days")), "to_pay"=>1235.00, "payment_date"=>date("Y-m-d", strtotime("-1 days")),
            ],
            [
                "user_id"=>7, "course_id"=>2, "enrollment_date"=>date("Y-m-d", strtotime("-2 days")), "to_pay"=>3550.00, "payment_date"=>null,
            ],
            [
                "user_id"=>9, "course_id"=>2, "enrollment_date"=>date("Y-m-d", strtotime("-2 days")), "to_pay"=>3550.00, "payment_date"=>null,
            ],
            [
                "user_id"=>8, "course_id"=>3, "enrollment_date"=>date("Y-m-d", strtotime("-2 days")), "to_pay"=>800.00, "payment_date"=>date("Y-m-d", strtotime("-2 days")),
            ],
            [
                "user_id"=>7, "course_id"=>3, "enrollment_date"=>date("Y-m-d", strtotime("-5 days")), "to_pay"=>800.00, "payment_date"=>date("Y-m-d", strtotime("-4 days")),
            ],
            [
                "user_id"=>10, "course_id"=>3, "enrollment_date"=>date("Y-m-d", strtotime("-1 days")), "to_pay"=>800.00, "payment_date"=>null,
            ],
            [
                "user_id"=>10, "course_id"=>4, "enrollment_date"=>date("Y-m-d"), "to_pay"=>617.50,"payment_date"=>null,
            ],
            [
                "user_id"=>5, "course_id"=>4, "enrollment_date"=>date("Y-m-d"), "to_pay"=>617.50, "payment_date"=>date("Y-m-d"),
            ],
            [
                "user_id"=>9, "course_id"=>3, "enrollment_date"=>date("Y-m-d"), "to_pay"=>800.00, "payment_date"=>date("Y-m-d"),
            ],
            [
                "user_id"=>5, "course_id"=>5, "enrollment_date"=>date("Y-m-d"), "to_pay"=>400.00, "payment_date"=>date("Y-m-d"),
            ],
            [
                "user_id"=>7, "course_id"=>5, "enrollment_date"=>date("Y-m-d", strtotime("-1 days")), "to_pay"=>400.00, "payment_date"=>null,
            ],
            [
                "user_id"=>8, "course_id"=>6, "enrollment_date"=>date("Y-m-d", strtotime("-4 days")), "to_pay"=>3500.00, "payment_date"=>date("Y-m-d", strtotime("-4 days")),
            ],
            [
                "user_id"=>6, "course_id"=>6, "enrollment_date"=>date("Y-m-d"), "to_pay"=>3500.00, "payment_date"=>date("Y-m-d"),
            ],
            [
                "user_id"=>10, "course_id"=>6, "enrollment_date"=>date("Y-m-d", strtotime("-1 days")), "to_pay"=>3500.00, "payment_date"=>date("Y-m-d", strtotime("-1 days")),
            ],

            [
                "user_id"=>12, "course_id"=>8, "enrollment_date"=>date("Y-m-d"), "to_pay"=>1450.00, "payment_date"=>null,
            ],
            [
                "user_id"=>13, "course_id"=>8, "enrollment_date"=>date("Y-m-d"), "to_pay"=>1450.00, "payment_date"=>date("Y-m-d"),
            ],
            [
                "user_id"=>5, "course_id"=>8, "enrollment_date"=>date("Y-m-d"), "to_pay"=>1450.00, "payment_date"=>null,
            ],
            [
                "user_id"=>12, "course_id"=>1, "enrollment_date"=>date("Y-m-d"), "to_pay"=>1300.00, "payment_date"=>date("Y-m-d"),
            ],
            [
                "user_id"=>12, "course_id"=>11, "enrollment_date"=>date("Y-m-d"), "to_pay"=>900.00, "payment_date"=>null,
            ],
            [
                "user_id"=>5, "course_id"=>9, "enrollment_date"=>date("Y-m-d"), "to_pay"=>900.00, "payment_date"=>null,
            ],
            [
                "user_id"=>6, "course_id"=>9, "enrollment_date"=>date("Y-m-d"), "to_pay"=>900.00, "payment_date"=>null,
            ],
            [
                "user_id"=>7, "course_id"=>9, "enrollment_date"=>date("Y-m-d"), "to_pay"=>900.00, "payment_date"=>null,
            ],
            [
                "user_id"=>8, "course_id"=>9, "enrollment_date"=>date("Y-m-d"), "to_pay"=>900.00, "payment_date"=>null,
            ],
            [
                "user_id"=>9, "course_id"=>9, "enrollment_date"=>date("Y-m-d"), "to_pay"=>900.00, "payment_date"=>null,
            ],
            [
                "user_id"=>10, "course_id"=>9, "enrollment_date"=>date("Y-m-d"), "to_pay"=>900.00, "payment_date"=>null,
            ],
            [
                "user_id"=>12, "course_id"=>9, "enrollment_date"=>date("Y-m-d"), "to_pay"=>900.00, "payment_date"=>null,
            ],
            [
                "user_id"=>13, "course_id"=>9, "enrollment_date"=>date("Y-m-d"), "to_pay"=>900.00, "payment_date"=>date("Y-m-d"),
            ],
            [
                "user_id"=>13, "course_id"=>10, "enrollment_date"=>date("Y-m-d"), "to_pay"=>2500.00, "payment_date"=>date("Y-m-d"),
            ],
            [
                "user_id"=>7, "course_id"=>7, "enrollment_date"=>date("Y-m-d"), "to_pay"=>950.00, "payment_date"=>null,
            ],
            [
                "user_id"=>8, "course_id"=>7, "enrollment_date"=>date("Y-m-d"), "to_pay"=>950.00, "payment_date"=>null,
            ],
        ]);
    }
}
