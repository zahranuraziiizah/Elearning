<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', [DashboardController::class, 'index']);

/**
 * HTTP Method:
 * 1. Get    : Untuk menampilkan halaman
 * 2. Post   : untuk mengirim data
 * 3. Put    : Untuk mengupdate data
 * 4. Delete : Untuk menghapus data
 */
