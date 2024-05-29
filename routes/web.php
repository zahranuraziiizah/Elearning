<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', [DashboardController::class, 'index']);

// route untuk menampilkan halaman student
Route::get('/admin/student', [StudentController::class, 'index']);

Route::get('/admin/student', [CoursesController::class, 'index']);


/**
 * HTTP Method:
 * 1. Get    : Untuk menampilkan halaman
 * 2. Post   : untuk mengirim data
 * 3. Put    : Untuk mengupdate data
 * 4. Delete : Untuk menghapus data
 */
