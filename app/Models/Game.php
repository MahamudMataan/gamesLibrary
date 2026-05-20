<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
    'title',
    'rating',
    'platform',
    'image',
    'genre_id',
    ];
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
