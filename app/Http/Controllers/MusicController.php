<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Embed;

class MusicController extends Controller{
    /**
     * Tampilan Putar Music
     */
    public function index($slug){
        $music = Music::where('slug', $slug)->first();
        $embed = Embed::make($music->source_music)->parseUrl();
        if ($embed) {
            $music->source_music = $embed->getIframe();
        }
        return view('pages.play',[
            'music'=>$music
        ]);
    }

    /**
     * From tambah music
     */
    public function create(){
        $genres = Genre::get();
        $artists = Artist::get();

        return view('pages.admin.music.create',[
            'genres'=>$genres,
            'artists'=>$artists
        ]);
    }

    /**
     * Tambahkan Music Baru
     */
    public function store(Request $request){
        $tgl = date('Y-m-d');
        $request->validate([
            'title' => ['required'],
            'source' => ['required'],
            'artist' => ['required'],
            'genre' => ['required'],
            'thumbnail' => ['image'] 
        ]);

        $music = new Music;
        $music->title = $request->input('title');
        $music->genre_id = $request->input('genre');
        $music->artist_id = $request->input('artist');
        $music->source_music = $request->input('source');
        $music->save();

        $music->slug = Str::slug($music->title,'-').'-'.$music->id.$tgl;
        if ($request->file('thumbnail')!=null) {
            $thumbnail = $music->slug.$tgl.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move(public_path('music'), $thumbnail);
            $music->thumbnail = '/music/'.$thumbnail;
        }

        $music->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Music $music)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Music $music)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Music $music)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Music $music)
    {
        //
    }
}
