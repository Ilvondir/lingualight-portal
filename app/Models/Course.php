<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    public $timestamps = false;

    protected $connection = "mysql";

    protected $fillable = [
        'name',
        'language',
        'difficulty',
        "headquarter",
        "description",
        "price",
        "scheduled_start",
        "hours",
        "created",
        "img",
        "author_id",
        "form_id",
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function form() {
        return $this->belongsTo(Form::class);
    }

    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }
}
