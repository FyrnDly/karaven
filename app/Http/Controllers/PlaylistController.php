<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class PlaylistController extends Controller
{
    /**
     * Tampilan Playlist Music
     */
    public function index($slug){
        $playlist = Playlist::where('slug',$slug)->first();
        if ($playlist == null){ return abort(404); }
        return view('pages.playlist.show',[
            'playlist' => $playlist,
        ]);
    }

    /**
     * Tampilan Manipulasi Music pada Playlist
     */
    public function music($slug){
        $playlist = Playlist::where('slug',$slug)->first();
        $musics = Music::get();
        if ($playlist == null){ return abort(404); }
        return view('pages.admin.playlist.music',[
            'isPlaylist' => true,
            'playlist' => $playlist,
            'musics' => $musics
        ]);
    }

    public function addmusic(Request $request,$slug){
        $request->validate([
            'music' => ['required'],
        ]);
        $playlist = Playlist::where('slug',$slug)->first();
        $music = Music::where('id', $request->input('music'))->first();
        $playlist->music()->attach($music->id);

        return Redirect::route('admin.playlist.music', $playlist->slug)->with('status', 'add')->with('music', $music);
    }

    public function removemusic(Request $request,$slug,$id){
        $playlist = Playlist::where('slug',$slug)->first();
        $music = Music::where('id', $id)->first();
        $playlist->music()->detach($music->id);

        return Redirect::route('admin.playlist.music', $playlist->slug)->with('status', 'remove')->with('music', $music);
    }

    /**
     * Tampilan Membuat Playlist
     */
    public function create(){
        return view('pages.admin.playlist.create',[
            'isPlaylist' => true
        ]);
    }

    /**
     * Menyimpan Playlist Baru
     */
    public function store(Request $request){
        $tgl = date('mYd');
        $request->validate([
            'title' => ['required'],
            'thumbnail' => ['image'] 
        ]);

        $playlist = new Playlist;
        $playlist->name = Str::title($request->input('title'));
        $playlist->save();

        $playlist->slug = Str::slug($playlist->name,'-').'-'.$playlist->id.$tgl;
        if ($request->file('thumbnail')!=null) {
            $thumbnail = $playlist->slug.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move($_SERVER['DOCUMENT_ROOT'].'/playlist', $thumbnail);
            $playlist->thumbnail = '/playlist/'.$thumbnail;
        }

        $playlist->save();
        return Redirect::route('admin.playlist.show')->with('status','create')->with('playlist',$playlist);
    }

    /**
     * Tampilan Daftar Playlist Untuk Admin
     */
    public function show(){
        $playlist = Playlist::orderBy('name','asc')->get();
        return view('pages.admin.playlist.show',[
            'playlists'=>$playlist,
            'isPlaylist' => true
        ]);
    }

    /**
     * Tampilan Mengubah Informasi Playlist
     */
    public function edit($slug){
        $playlist = Playlist::where('slug',$slug)->first();
        return view('pages.admin.playlist.edit',[
            'playlist'=>$playlist,
            'isPlaylist' => true
        ]);
    }

    /**
     * Mengubah Informasi Playlist
     */
    public function update(Request $request, $slug){
        $tgl = date('mYd');
        $request->validate([
            'title' => ['required'],
            'thumbnail' => ['image'] 
        ]);

        $playlist = Playlist::where('slug',$slug)->first();
        $playlist->name = Str::title($request->input('title'));
        $playlist->save();

        $playlist->slug = Str::slug($playlist->name,'-').'-'.$playlist->id.$tgl;
        if ($request->file('thumbnail')!=null) {
            $thumbnail = $playlist->slug.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move($_SERVER['DOCUMENT_ROOT'].'/playlist', $thumbnail);
            $playlist->thumbnail = '/playlist/'.$thumbnail;
        }

        $playlist->save();
        return Redirect::route('admin.playlist.show')->with('status','update')->with('playlist',$playlist);
    }

    /**
     * Menghapus Playlist
     */
    public function destroy($id){
        $playlist = Playlist::where('id',$id)->first();
        $playlist_old = $playlist;
        if($playlist){
            $image_path = $_SERVER['DOCUMENT_ROOT'].$playlist->thumbnail; 
            if($image_path!=null){
                File::delete($image_path);
            }
            $playlist->delete();
        }
        return Redirect::route('admin.playlist.show')->with('status','destroy')->with('playlist',$playlist_old);
    }
}