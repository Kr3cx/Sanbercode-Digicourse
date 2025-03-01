<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casts extends Model
{
    use HasFactory;

    protected $table = "casts";
    protected $fillable = ["name", "age", "bio"];

}
