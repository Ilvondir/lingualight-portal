<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Form;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Form::insert([
            ["name"=>"Stationary"],
            ["name"=>"Remote"],
            ["name"=>"Hybrid"],
        ]);
    }
}
