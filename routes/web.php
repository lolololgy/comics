<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\MarvelComicController;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('comics', ComicController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/readers', [ReaderController::class, 'index'])->name('readers.index');
    Route::get('/readers/{user}', [ReaderController::class, 'show'])->name('readers.show');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/marvel', [MarvelComicController::class, 'index'])->name('marvel.index');
    Route::post('/marvel', [MarvelComicController::class, 'store'])->name('marvel.store');
});


