<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Embed;

class MusicController extends Controller{
    /**
     * Tampilan Putar Music
     */
    public function index($slug){
        $music = Music::where('slug', $slug)->first();
        if ($music == null){ return abort(404); }
        $music->log += 1;
        $music->save();
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
        $genres = Genre::orderBy('name','asc')->get();
        $artists = Artist::orderBy('name','asc')->get();

        return view('pages.admin.music.create',[
            'genres'=>$genres,
            'artists'=>$artists,
            'isMusic'=>true
        ]);
    }

    /**
     * Tambahkan Music Baru
     */
    public function store(Request $request){
        $tgl = date('mYd');
        $request->validate([
            'title' => ['required'],
            'source' => ['required'],
            'artist' => ['required'],
            'genre' => ['required'],
            'thumbnail' => ['image'] 
        ]);

        $music = new Music;
        $music->title = Str::title($request->input('title'));
        $music->genre_id = $request->input('genre');
        $music->artist_id = $request->input('artist');
        $music->source_music = $request->input('source');
        $music->save();

        $music->slug = Str::slug($music->title,'-').'-'.$music->id.$tgl;
        if ($request->file('thumbnail')!=null) {
            $thumbnail = $music->slug.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move($_SERVER['DOCUMENT_ROOT'].'/music', $thumbnail);
            $music->thumbnail = '/music/'.$thumbnail;
        }

        $music->save();
        return Redirect::route('admin.music.show')->with('status','create')->with('music',$music);
    }

    /**
     * Detail Music
     */
    public function show()
    {
        $music = Music::orderByRaw('ISNULL(log), log DESC')->orderBy('title','asc')->get();
        return view('pages.admin.music.show',[
            'musics'=>$music,
            'isMusic'=>true
        ]);
    }

    /**
     * Tampilan form edit Music
     */
    public function edit($slug){
        $music = Music::where('slug',$slug)->first();
        $genre = Genre::orderBy('name','asc')->get();
        $artist = Artist::orderBy('name','asc')->get();
        return view('pages.admin.music.edit',[
            'music'=>$music,
            'genres'=>$genre,
            'artists'=>$artist,
            'isMusic'=>true
        ]);
    }

    /**
     * Update data music
     */
    public function update(Request $request,$slug){
        $tgl = date('mYd');
        $request->validate([
            'title' => ['required'],
            'source' => ['required'],
            'artist' => ['required'],
            'genre' => ['required'],
            'thumbnail' => ['image'] 
        ]);
        
        $music = Music::where('slug',$slug)->first();
        $music->title = Str::title($request->input('title'));
        $music->genre_id = $request->input('genre');
        $music->artist_id = $request->input('artist');
        $music->source_music = $request->input('source');
        $music->slug = Str::slug($music->title,'-').'-'.$music->id.$tgl;
        
        if ($request->file('thumbnail')!=null) {
            $thumbnail = $music->slug.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move($_SERVER['DOCUMENT_ROOT'].'/music', $thumbnail);
            $music->thumbnail = '/music/'.$thumbnail;
        }
        $music->save();

        return Redirect::route('admin.music.show')->with('status','update')->with('music',$music);
    }

    /**
     * Hapus Data Music
     */
    public function destroy($id){
        $music = Music::where('id',$id)->first();
        if($music) {
            $image_path = $_SERVER['DOCUMENT_ROOT'].$music->thumbnail; 
            $music_old = $music;
            if ($image_path!=null) {
                File::delete($image_path);
            }
            $music->delete();
        }
        return Redirect::route('admin.music.show')->with('status','destroy')->with('music',$music_old);
    }
}