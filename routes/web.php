<?php

use App\Http\Controllers\QuranController;
use Illuminate\Support\Facades\Route;



Route::get('/', [QuranController::class, 'index']);
Route::get('/surah/{nomor}', [QuranController::class, 'show']);