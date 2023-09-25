<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlaylistController;

Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/{slug}', [MusicController::class,'index'])->name('music');

Route::prefix('genre')->name('genre.')->group(function(){
    Route::get('/list', [AppController::class, 'genre'])->name('index');
});

Route::prefix('playlist')->name('playlist.')->group(function(){
    Route::get('/list', [AppController::class, 'playlist'])->name('index');
});

Route::prefix('artist')->name('artist.')->group(function(){
    Route::get('/list', [AppController::class, 'artist'])->name('index');
});


Route::prefix('admin')->name('admin.')->group(function(){
    Route::prefix('artist')->name('artist.')->group(function(){
        Route::get('/create',[ArtistController::class,'create'])->name('create');
        Route::post('/store',[ArtistController::class,'store'])->name('store');
    });
    
    Route::prefix('genre')->name('genre.')->group(function(){
        Route::get('/create',[GenreController::class,'create'])->name('create');
        Route::post('/store',[GenreController::class,'store'])->name('store');
    });
    
    Route::prefix('playist')->group(function(){
        Route::get('/',[PlaylistController::class,'create'])->name('playlist');
    });
    
    Route::prefix('music')->name('music.')->group(function(){
        Route::get('/create',[MusicController::class,'create'])->name('create');
        Route::post('/store',[MusicController::class,'store'])->name('store');
    });
});