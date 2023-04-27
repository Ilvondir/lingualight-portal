<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                "login"=>"admin", "password"=>hash("sha512", "admin"), "email"=>"administration@lingualight.com", "name"=>"John", "surname"=>"Ricko", "registered"=>date("Y-m-d"), "role_id"=>1,
            ],
            [
                "login"=>"trainer", "password"=>hash("sha512", "trainer"), "email"=>"c.ozzy@gmail.com", "name"=>"Clara", "surname"=>"Ozzy", "registered"=>date("Y-m-d"), "role_id"=>2,
            ],
            [
                "login"=>"user", "password"=>hash("sha512", "user"), "email"=>"k.m.nolly@gmail.com", "name"=>"James", "surname"=>"Knock", "registered"=>date("Y-m-d"), "role_id"=>3,
            ],
        ]
        );
    }
}
