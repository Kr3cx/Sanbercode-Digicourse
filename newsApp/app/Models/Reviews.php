<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = ["content", "point", "film_id", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
