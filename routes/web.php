<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\AdminController;

Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/music/{slug}', [MusicController::class,'index'])->name('music');
Route::post('/search',[AppController::class,'search'])->name('search');

Route::prefix('genre')->name('genre.')->group(function(){
    Route::get('/show', [AppController::class, 'genre'])->name('index');
    Route::get('/{slug}',[GenreController::class,'index'])->name('detail');
});

Route::prefix('artist')->name('artist.')->group(function(){
    Route::get('/show', [AppController::class, 'artist'])->name('index');
    Route::get('/{slug}',[ArtistController::class,'index'])->name('detail');
});

// Route::prefix('playlist')->name('playlist.')->group(function(){
//     Route::get('/show', [AppController::class, 'playlist'])->name('index');
// });

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::prefix('artist')->name('artist.')->group(function(){
        Route::get('/', [ArtistController::class,'show'])->name('show');
        Route::get('/create',[ArtistController::class,'create'])->name('create');
        Route::post('/store',[ArtistController::class,'store'])->name('store');
        Route::get('/edit/{slug}',[ArtistController::class,'edit'])->name('edit');
        Route::post('/update/{slug}',[ArtistController::class,'update'])->name('update');
        Route::post('/delete/{id}',[ArtistController::class,'destroy'])->name('delete');
    });
    
    Route::prefix('genre')->name('genre.')->group(function(){
        Route::get('/', [GenreController::class,'show'])->name('show');
        Route::get('/create',[GenreController::class,'create'])->name('create');
        Route::post('/store',[GenreController::class,'store'])->name('store');
        Route::get('/edit/{slug}',[GenreController::class,'edit'])->name('edit');
        Route::post('/update/{slug}',[GenreController::class,'update'])->name('update');
        Route::post('/delete/{id}',[GenreController::class,'destroy'])->name('delete');
    });
    
    // Route::prefix('playist')->group(function(){
    //     Route::get('/',[PlaylistController::class,'create'])->name('playlist');
    // });
    
    Route::prefix('music')->name('music.')->group(function(){
        Route::get('/', [MusicController::class,'show'])->name('show');
        Route::get('/create',[MusicController::class,'create'])->name('create');
        Route::post('/store',[MusicController::class,'store'])->name('store');
        Route::get('/edit/{slug}',[MusicController::class,'edit'])->name('edit');
        Route::post('/update/{slug}',[MusicController::class,'update'])->name('update');
        Route::post('/delete/{id}',[MusicController::class,'destroy'])->name('delete');
    });
});
