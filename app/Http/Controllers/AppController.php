<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Playlist;
use Illuminate\Http\Request;

class AppController extends Controller{
    public function index(){
        $musics = Music::orderByRaw('ISNULL(log), log DESC')->get();
        return view('pages.index',[
            'isHome'=>true,
            'musics' => $musics
        ]);
    }

    public function genre(){
        $genres = Genre::orderBy('name','asc')->get();
        return view('pages.genre.index',[
            'isGenre'=>true,
            'genres'=>$genres
        ]);
    }

    public function playlist(){
        return view('pages.playlist.index',[
            'isPlaylist'=>true
        ]);
    }

    public function artist(){
        $artists = Artist::orderBy('name','asc')->get();
        return view('pages.artist.index',[
            'isArtist'=>true,
            'artists'=>$artists
        ]);
    }

    public function search(Request $request){
        $key = $request->input('key');
        $musics = Music::search($key)->orderBy('ISNULL(log), log DESC')->get();
        
        return view('pages.search',[
            'key'=>$key,
            'musics'=>$musics
        ]);
    }
}
