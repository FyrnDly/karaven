<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * From buat artist 
     */
    public function create(){
        return view('pages.admin.artist.create');
    }

    /**
     * Tambahkan Artist
     */
    public function store(Request $request){
        $tgl = date('Y-m-d');
        $request->validate([
            'title' => ['required'],
            'thumbnail' => ['image'] 
        ]);

        $artist = new Artist;
        $artist->name = $request->input('title');
        $artist->save();

        $artist->slug = Str::slug($artist->name,'-').'-'.$artist->id.$tgl;
        if ($request->file('thumbnail')!=null) {
            $thumbnail = $artist->slug.$tgl.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $path = $request->file('thumbnail')->move(public_path('artist'), $thumbnail);
            $artist->thumbnail = '/artist/'.$thumbnail;
        }

        $artist->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        //
    }
}
