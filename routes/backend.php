<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

// login
Route::middleware('guest:web')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function () {
    // logout
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    //dashboard
    Route::view('/', 'backend.dashboard')->name('dashboard');
    //categories
    Route::resource('categories', CategoryController::class)->except('show');
    // course
    Route::resource('courses', CourseController::class)->except('show');
});

