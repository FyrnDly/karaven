<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/genre', [AppController::class, 'genre'])->name('genre');
Route::get('/playlist', [AppController::class, 'playlist'])->name('playlist');
Route::get('/artist', [AppController::class, 'artist'])->name('artist');
