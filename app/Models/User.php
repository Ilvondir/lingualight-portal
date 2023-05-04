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

    protected $fillable = [
        'name',
        'password',
        'email',
        "name",
        "surname",
        "registered",
        "role_id"
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }
}
