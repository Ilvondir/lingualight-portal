<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = "id";
    public $timestamps = false;

    protected $connection = "mysql";

    protected $fillable = [
        'name',
        'password',
        'email',
        "name",
        "surname",
        "registered",
        "role"
    ];

    protected $attributes = ["role"=>3];

    protected $hidden = [
        'password',
    ];

}
