<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArtistController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index($slug){
        $artist = Artist::where('slug',$slug)->first();
        if ($artist == null){ return abort(404); }
        $musics = Music::where('artist_id',$artist->id)->get();
        return view('pages.artist.show',[
            'artist'=>$artist,
            'musics'=>$musics
        ]);
    }

    /**
     * From buat artist 
     */
    public function create(){
        return view('pages.admin.artist.create',[
            'isArtist'=>true
        ]);
    }

    /**
     * Tambahkan Artist
     */
    public function store(Request $request){
        $tgl = date('mYd');
        $request->validate([
            'title' => ['required'],
            'thumbnail' => ['image'] 
        ]);

        $artist = new Artist;
        $artist->name = $request->input('title');
        $artist->save();

        $artist->slug = Str::slug($artist->name,'-').'-'.$artist->id.$tgl;
        if ($request->file('thumbnail')!=null) {
            $thumbnail = $artist->slug.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move($_SERVER['DOCUMENT_ROOT'].'/artist', $thumbnail);
            $artist->thumbnail = '/artist/'.$thumbnail;
        }

        $artist->save();
        return redirect()->route('admin.artist.show');
    }

    /**
     * Detail Penyanyi
     */
    public function show(){
        $artist = Artist::orderBy('name','asc')->get();
        return view('pages.admin.artist.show',[
            'artists'=>$artist,
            'isArtist'=>true
        ]);
    }

    /**
     * Tampilan form edit artist
     */
    public function edit($slug){
        $artist = Artist::where('slug',$slug)->first();
        return view('pages.admin.artist.edit',[
            'artist'=>$artist,
            'isArtist'=>true
        ]);
    }

    /**
     * Update data penyanyi
     */
    public function update(Request $request, $slug){
        $tgl = date('mYd');
        $request->validate([
            'title' => ['required'],
            'thumbnail' => ['image'] 
        ]);

        $artist = Artist::where('slug',$slug)->first();
        $artist->name = $request->input('title');
        $artist->save();

        $artist->slug = Str::slug($artist->name,'-').'-'.$artist->id.$tgl;
        if ($request->file('thumbnail')!=null) {
            $thumbnail = $artist->slug.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move($_SERVER['DOCUMENT_ROOT'].'/artist', $thumbnail);
            $artist->thumbnail = '/artist/'.$thumbnail;
        }

        $artist->save();
        return redirect()->route('admin.artist.show');
    }

    /**
     * Hapus Data Penyanyi 
     */
    public function destroy($id){
        $artist = Artist::where('id',$id)->first();
        if($artist){
            $image_path = $_SERVER['DOCUMENT_ROOT'].$artist->thumbnail; 
            if($image_path!=null){
                File::delete($image_path);
            }
            $artist->delete();
        }
        return redirect()->route('admin.artist.show');
    }
}