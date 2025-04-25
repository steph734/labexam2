<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/music/index');
});

Route::get('/music', [MusicController::class, 'index'])->name('music.index');
Route::get('/music/create', [MusicController::class, 'create'])->name('music.create');
Route::post('/music/create', [MusicController::class, 'store'])->name('music.store');
Route::get('/music/{id}/edit', [MusicController::class, 'edit'])->name('music.edit');
Route::put('/music/{id}', [MusicController::class, 'update'])->name('music.update');
Route::delete('/music/{id}', [MusicController::class, 'destroy'])->name('music.destroy');
