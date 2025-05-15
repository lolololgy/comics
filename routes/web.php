<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;

Route::resource('comics', ComicController::class);



