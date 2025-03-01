<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    use HasFactory;
    protected $table = "films";
    protected $fillable = ["title", "summary", "release_year", "poster", "genre_id"];

    // public function genres()
    // {
    //     return $this->belongsTo(Genres::class, 'genre_id');
    // }



}
