<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Playlist;

class AdminController extends Controller
{
    public function index(){
        $popular = Music::orderByRaw('ISNULL(log), log DESC')->limit(3)->get();
        $unpopular = Music::orderBy('log', 'asc')->orderBy('created_at','asc')->limit(3)->get();
        $musics = Music::orderByRaw('ISNULL(log), log DESC')->orderBy('title','asc')->get();

        $genres = Genre::orderBy('name','asc')->get();
        $artists = Artist::orderBy('name','asc')->get();

        return view('pages.admin.index',[
            'isHome'=> true,
            'popular'=> $popular,
            'unpopular'=> $unpopular,
            'musics'=> $musics,
            'genres'=> $genres,
            'artists'=> $artists
        ]);
    }
}
