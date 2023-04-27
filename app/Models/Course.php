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
        "form",
        "headquarter",
        "description",
        "price",
        "created",
        "author_id",
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
