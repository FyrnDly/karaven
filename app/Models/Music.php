<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Music extends Model{
    use HasFactory;
    use Searchable;

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
    
    public function toSearchableArray(){
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'source' => $this->source_music,
            'artist' => $this->artist->name,
            'genre' => $this->genre->name,
        ];
    }
}
