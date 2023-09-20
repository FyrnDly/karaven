<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        return view('pages.index',[
            'isHome'=>true
        ]);
    }

    public function genre(){
        return view('pages.genre.index',[
            'isGenre'=>true
        ]);
    }

    public function playlist(){
        return view('pages.playlist.index',[
            'isPlaylist'=>true
        ]);
    }

    public function artist(){
        return view('pages.artist.index',[
            'isArtist'=>true
        ]);
    }
}
