<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    public $timestamps = false;

    protected $connection = "mysql";

    protected $fillable = [
        "user_id",
        "course_id",
        "enrollment_date",
        "to_pay",
        "payment_date",
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
