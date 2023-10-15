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

        // Membuat rekomendasi music berdasarkan artist yang sama
        $artist_rec = Music::search($music->artist->name)->get();
        $id_ar = $artist_rec->pluck('id')->toArray();
        $musics_ar = Music::whereIn('id',$id_ar)->whereNot('id',$music->id)->orderBy('log','desc')->orderBy('title','asc')->get();
        
        // Membuat rekomendasi music berdasarkan genre yang sama
        $genre_rec = Music::search($music->genre->name)->get();
        $id_gr = $genre_rec->pluck('id')->toArray();
        $musics_gr = Music::whereIn('id',$id_gr)->whereNotIn('id',$id_ar)->whereNot('id',$music->id)->orderBy('log','desc')->orderBy('title','asc')->get();

        return view('pages.play',[
            'music'=>$music,
            'mr1'=>$musics_ar,
            'mr2'=>$musics_gr
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
        $music->source_music = $request->input('source');

        $isGenre = Genre::where('id', $request->input('genre'))->first();
        if ($isGenre) {
            $music->genre_id = $request->input('genre');
        } else {
            $genre = new Genre;
            $genre->name = $request->input('genre');
            $genre->save();
            
            $genre->slug = Str::slug($genre->name,'-').'-'.$genre->id.$tgl;
            $genre->save();
            $music->genre_id = $genre->id;
        }
        
        $isArtist = Artist::where('id', $request->input('artist'))->first();
        if ($isArtist) {
            $music->artist_id = $request->input('artist');
        } else {
            $artist = new Artist;
            $artist->name = $request->input('artist');
            $artist->save();

            $artist->slug = Str::slug($artist->name,'-').'-'.$artist->id.$tgl;
            $artist->save();
            $music->artist_id = $artist->id;
        }
        
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
        $music_old = $music;
        if($music) {
            $image_path = $_SERVER['DOCUMENT_ROOT'].$music->thumbnail; 
            if ($image_path!=null) {
                File::delete($image_path);
            }
            $music->delete();
        }
        return Redirect::route('admin.music.show')->with('status','destroy')->with('music',$music_old);
    }
}