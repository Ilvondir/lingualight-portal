<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    public $timestamps = false;

    protected $connection = "mysql";

    public function trainer()
    {
        return $this->belongsTo(User::class);
    }
}
