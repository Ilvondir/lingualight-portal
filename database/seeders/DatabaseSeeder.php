<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Enrollment;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\FormSeeder;
use Database\Seeders\EnrollmentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            FormSeeder::class,
            CourseSeeder::class,
            EnrollmentSeeder::class,
        ]);
    }
}
