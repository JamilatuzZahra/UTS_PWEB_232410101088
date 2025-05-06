<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'login']);
Route::get('/dashboard', [PageController::class, 'dashboard']);
Route::get('/profile', [PageController::class, 'profile']);
Route::get('/pengelolaan', [PageController::class, 'pengelolaan']);
Route::post('/pengelolaan/tambah', [PageController::class, 'tambahBuku']);
Route::delete('/pengelolaan/hapus/{index}', [PageController::class, 'hapusBuku']);


