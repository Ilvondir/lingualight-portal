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
                "login"=>"admin", "password"=>hash("sha512", "admin"), "email"=>"administration@lingualight.com", "name"=>"John", "surname"=>"Ricko", "registered"=>date("Y-m-d", strtotime("-14 days")), "role_id"=>1,
            ],
            [
                "login"=>"trainer", "password"=>hash("sha512", "1234"), "email"=>"c.ozzy@gmail.com", "name"=>"Clara", "surname"=>"Ozzy", "registered"=>date("Y-m-d", strtotime("-10 days")), "role_id"=>2,
            ],
            [
                "login"=>"agatha", "password"=>hash("sha512", "1234"), "email"=>"forester@gmail.com", "name"=>"James", "surname"=>"Knock", "registered"=>date("Y-m-d", strtotime("-9 days")), "role_id"=>2,
            ],
            [
                "login"=>"john", "password"=>hash("sha512", "1234"), "email"=>"doe@gmail.com", "name"=>"John", "surname"=>"Doe", "registered"=>date("Y-m-d", strtotime("-3 days")), "role_id"=>2,
            ],
            [
                "login"=>"Ilvondir", "password"=>hash("sha512", "user"), "email"=>"ilvondir@gmail.com", "name"=>"Micheal", "surname"=>"Fuzzy", "registered"=>date("Y-m-d", strtotime("-1 days")), "role_id"=>3,
            ],
            [
                "login"=>"user", "password"=>hash("sha512", "user"), "email"=>"user@gmail.com", "name"=>"Lucy", "surname"=>"Bing", "registered"=>date("Y-m-d", strtotime("-2 days")), "role_id"=>3,
            ],
            [
                "login"=>"wolfie", "password"=>hash("sha512", "user"), "email"=>"wolf12@gmail.com", "name"=>"James", "surname"=>"Knock", "registered"=>date("Y-m-d", strtotime("-3 days")), "role_id"=>3,
            ],
            [
                "login"=>"Tyranis", "password"=>hash("sha512", "user"), "email"=>"j.frank@gmail.com", "name"=>"John", "surname"=>"Frank", "registered"=>date("Y-m-d", strtotime("-5 days")), "role_id"=>3,
            ],
            [
                "login"=>"Shock", "password"=>hash("sha512", "user"), "email"=>"shockwave1@gmail.com", "name"=>"David", "surname"=>"Shockwave", "registered"=>date("Y-m-d"), "role_id"=>3,
            ],
            [
                "login"=>"Johael", "password"=>hash("sha512", "user"), "email"=>"j.feal@gmail.com", "name"=>"Johannes", "surname"=>"Fael", "registered"=>date("Y-m-d"), "role_id"=>3,
            ],
        ]
        );
    }
}