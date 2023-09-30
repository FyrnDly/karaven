<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Embed;

class MusicController extends Controller{
    /**
     * Tampilan Putar Music
     */
    public function index($slug){
        $music = Music::where('slug', $slug)->first();
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
            $thumbnail = $music->slug.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move(public_path('music'), $thumbnail);
            $music->thumbnail = '/music/'.$thumbnail;
        }

        $music->save();
        return redirect()->route('admin.music.show');
    }

    /**
     * Detail Music
     */
    public function show()
    {
        $music = Music::orderBy('log','desc')->orderBy('title','asc')->get();
        return view('pages.admin.music.show',[
            'musics'=>$music
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
            'artists'=>$artist
        ]);
    }

    /**
     * Update data music
     */
    public function update(Request $request,$slug){
        $tgl = date('Y-m-d');
        $request->validate([
            'title' => ['required'],
            'source' => ['required'],
            'artist' => ['required'],
            'genre' => ['required'],
            'thumbnail' => ['image'] 
        ]);
        
        $music = Music::where('slug',$slug)->first();
        $music->title = $request->input('title');
        $music->genre_id = $request->input('genre');
        $music->artist_id = $request->input('artist');
        $music->source_music = $request->input('source');
        $music->slug = Str::slug($music->title,'-').'-'.$music->id.$tgl;
        
        if ($request->file('thumbnail')!=null) {
            $thumbnail = $music->slug.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move(public_path('music'), $thumbnail);
            $music->thumbnail = '/music/'.$thumbnail;
        }
        $music->save();

        return redirect()->route('admin.music.show');
    }

    /**
     * Hapus Data Music
     */
    public function destroy($id){
        $music = Music::where('id',$id)->first();
        if($music) {
            $image_path = public_path().$music->thumbnail; 
            if ($image_path!=null) {
                File::delete($image_path);
            }
            $music->delete();
        }
        return redirect()->route('admin.music.show');
    }
}
