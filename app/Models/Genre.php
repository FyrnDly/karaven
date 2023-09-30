<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Genre extends Model{
    use HasFactory;
    use Searchable;

    public function music(){
        return $this->hasMany(Music::class, 'genre_id');
    }
}
