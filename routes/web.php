<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RootController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/musics', function(){
    return redirect()->route('home');
});
Route::get('/musics/{slug}', [MusicController::class,'index'])->name('music');
Route::post('/search',[AppController::class,'search'])->name('search');

Route::prefix('genres')->name('genre.')->group(function(){
    Route::get('/', [AppController::class, 'genre'])->name('index');
    Route::get('/{slug}',[GenreController::class,'index'])->name('detail');
});

Route::prefix('artists')->name('artist.')->group(function(){
    Route::get('/', [AppController::class, 'artist'])->name('index');
    Route::get('/{slug}',[ArtistController::class,'index'])->name('detail');
});

// Route::prefix('playlist')->name('playlist.')->group(function(){
//     Route::get('/show', [AppController::class, 'playlist'])->name('index');
// });

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified', 'admin'])->group(function(){
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

Route::prefix('/dashboard')->middleware(['verified','root'])->name('dashboard.')->group(function(){
    Route::get('/',[RootController::class,'index'])->name('index');
    Route::post('/update/{id}',[RootController::class,'update'])->name('update');
    Route::post('/remove/{id}',[RootController::class,'destroy'])->name('delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';