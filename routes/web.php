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

Route::get('/admin/courses', [CoursesController::class, 'index']);


//route untuk menampilkan halaman form tambah student
Route::get('/admin/student/create', [StudentController::class, 'create']);

//route untuk menyimpan dan mengirim
Route::post('/admin/student/store', [StudentController::class, 'store']);

//route untuk menampilkan halaman form edit student
Route::get('/admin/student/edit/{id}', [StudentController::class, 'edit']);

//route untuk menampilkan halaman form update student
Route::put('/admin/student/update/{id}', [StudentController::class, 'update']);

//route untuk menghapus student
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);


//route untuk menampilkan halaman form tambah student
Route::get('/admin/courses/create', [CoursesController::class, 'create']);

//route untuk menyimpan dan mengirim
Route::post('/admin/courses/store', [CoursesController::class, 'store']);

//route untuk menampilkan halaman form edit courses
Route::get('/admin/courses/edit/{id}', [CoursesController::class, 'edit']);

//route untuk menampilkan halaman form update courses
Route::put('/admin/courses/update/{id}', [CoursesController::class, 'update']);

//route untuk menghapus student
Route::delete('/admin/courses/delete/{id}', [CoursesController::class, 'destroy']);

/**
 * HTTP Method:
 * 1. Get    : Untuk menampilkan halaman
 * 2. Post   : untuk mengirim data
 * 3. Put    : Untuk mengupdate data
 * 4. Delete : Untuk menghapus data
 */
