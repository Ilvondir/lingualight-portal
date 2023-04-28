<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    public $timestamps = false;

    protected $connection = "mysql";

    protected $fillable = [
        'level',
        'required',
        "nice_to_have",
    ];

    public function courses() {
        return $this->hasMany(Course::class);
    }
}
