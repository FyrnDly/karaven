<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GenreController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            $thumbnail = $genre->slug.$tgl.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move(public_path('genre'), $thumbnail);
            $genre->thumbnail = '/genre/'.$thumbnail;
        }

        $genre->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
    }
}