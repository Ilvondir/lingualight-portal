<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                "login"=>"admin", "password"=>Hash::make("admin"), "email"=>"administration@lingualight.com", "name"=>"John", "surname"=>"Ricko", "registered"=>date("Y-m-d", strtotime("-14 days")), "role_id"=>1, "confirmed" => null,
            ],
            [
                "login"=>"trainer", "password"=>Hash::make("1234"), "email"=>"c.ozzy@gmail.com", "name"=>"Clara", "surname"=>"Ozzy", "registered"=>date("Y-m-d", strtotime("-10 days")), "role_id"=>2, "confirmed" => 1,
            ],
            [
                "login"=>"agatha", "password"=>Hash::make("1234"), "email"=>"forester@gmail.com", "name"=>"Agatha", "surname"=>"Knock", "registered"=>date("Y-m-d", strtotime("-9 days")), "role_id"=>2,  "confirmed" => 1,
            ],
            [
                "login"=>"john", "password"=>Hash::make("1234"), "email"=>"doe@gmail.com", "name"=>"John", "surname"=>"Doe", "registered"=>date("Y-m-d", strtotime("-3 days")), "role_id"=>2,  "confirmed" => 1,
            ],
            [
                "login"=>"Jacky", "password"=>Hash::make("1234"), "email"=>"jBoe@gmail.com", "name"=>"Jack", "surname"=>"Boe", "registered"=>date("Y-m-d", strtotime("-4 days")), "role_id"=>2,  "confirmed" => 0,
            ],
            [
                "login"=>"Ilvondir", "password"=>Hash::make("user"), "email"=>"ilvondir@gmail.com", "name"=>"Micheal", "surname"=>"Fuzzy", "registered"=>date("Y-m-d", strtotime("-1 days")), "role_id"=>3,  "confirmed" => null,
            ],
            [
                "login"=>"user", "password"=>Hash::make("user"), "email"=>"user@gmail.com", "name"=>"Lucy", "surname"=>"Bing", "registered"=>date("Y-m-d", strtotime("-2 days")), "role_id"=>3, "confirmed" => null,
            ],
            [
                "login"=>"wolfie", "password"=>Hash::make("user"), "email"=>"wolf12@gmail.com", "name"=>"James", "surname"=>"Knock", "registered"=>date("Y-m-d", strtotime("-3 days")), "role_id"=>3, "confirmed" => null,
            ],
            [
                "login"=>"Tyranis", "password"=>Hash::make("user"), "email"=>"j.frank@gmail.com", "name"=>"John", "surname"=>"Frank", "registered"=>date("Y-m-d", strtotime("-5 days")), "role_id"=>3, "confirmed" => null,
            ],
            [
                "login"=>"Shock", "password"=>Hash::make("user"), "email"=>"shockwave1@gmail.com", "name"=>"David", "surname"=>"Shockwave", "registered"=>date("Y-m-d"), "role_id"=>3, "confirmed" => null,
            ],
            [
                "login"=>"Johael", "password"=>Hash::make("user"), "email"=>"j.feal@gmail.com", "name"=>"Johannes", "surname"=>"Fael", "registered"=>date("Y-m-d"), "role_id"=>3, "confirmed" => null,
            ],
        ]
        );
    }
}
