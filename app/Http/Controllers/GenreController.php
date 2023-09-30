<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GenreController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index($slug){
        $genre = Genre::where('slug',$slug)->first();
        $musics = Music::where('genre_id',$genre->id)->get();
        return view('pages.genre.show',[
            'genre' => $genre,
            'musics' => $musics
        ]);
    }

    /**
     * Form buat genre
     */
    public function create(){
        return view('pages.admin.genre.create');
    }

    /**
     * Tambahkan Genre Baru
     */
    public function store(Request $request){
        $tgl = date('Y-m-d');
        $request->validate([
            'title' => ['required'],
            'thumbnail' => ['image'] 
        ]);

        $genre = new Genre;
        $genre->name = $request->input('title');
        $genre->save();

        $genre->slug = Str::slug($genre->name,'-').'-'.$genre->id.$tgl;
        if ($request->file('thumbnail')!=null) {
            $thumbnail = $genre->slug.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move(public_path('genre'), $thumbnail);
            $genre->thumbnail = '/genre/'.$thumbnail;
        }

        $genre->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(){
        $genre = Genre::orderBy('name','asc')->get();
        return view('pages.admin.genre.show',[
            'genres'=>$genre
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug){
        $genre = Genre::where('slug',$slug)->first();
        return view('pages.admin.genre.edit',[
            'genre'=>$genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug){
        $tgl = date('Y-m-d');
        $request->validate([
            'title' => ['required'],
            'thumbnail' => ['image'] 
        ]);

        $genre = Genre::where('slug',$slug)->first();
        $genre->name = $request->input('title');
        $genre->save();

        $genre->slug = Str::slug($genre->name,'-').'-'.$genre->id.$tgl;
        if ($request->file('thumbnail')!=null) {
            $thumbnail = $genre->slug.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move(public_path('genre'), $thumbnail);
            $genre->thumbnail = '/genre/'.$thumbnail;
        }

        $genre->save();
        return redirect()->route('admin.genre.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        $genre = Genre::where('id',$id)->first();
        if($genre){
            $image_path = public_path().$genre->thumbnail; 
            if($image_path!=null){
                File::delete($image_path);
            }
            $genre->delete();
        }
        return redirect()->route('admin.genre.show');
    }
}
