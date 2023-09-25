<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'music';
    protected $fillable = ['genre_id','artist_id','title'];
    
    public function genre(){
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function artist(){
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function playlists(){
        return $this->belongsToMany(Playlist::class, 'music_playlist');
    }
}
