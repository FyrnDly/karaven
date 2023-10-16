<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Playlist;
use Illuminate\Http\Request;

class AppController extends Controller{
    public function index(){ 
        $per_page = request()->input('per_page', 4);
        $popular = Music::orderByRaw('ISNULL(log), log DESC')->limit(4)->get();
        $pop_id = $popular->pluck('id')->toArray();

        $new = Music::whereNotIn('id',$pop_id)->orderBy('created_at', 'desc')->limit(2)->get();
        $new_id = $new->pluck('id')->toArray();

        $ex_ids = array_merge($pop_id, $new_id);
        $musics = Music::whereNotIn('id',$ex_ids)->orderBy('log','desc')->orderBy('title','asc')->paginate($per_page); 
        return view('pages.index',[ 
            'isHome'=>true,
            'popular_musics' => $popular,
            'new_musics' => $new,
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
        $playlists = Playlist::orderBy('name','asc')->get();
        return view('pages.playlist.index',[
            'isPlaylist'=>true,
            'playlists'=>$playlists
        ]);
    }

    public function artist(){
        $per_page = request()->input('per_page', 6);
        $artists = Artist::orderBy('name','asc')->paginate($per_page);
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