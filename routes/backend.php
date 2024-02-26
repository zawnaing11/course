<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseUserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// login
Route::middleware('guest:web')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function () {
    // logout
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    // dashboard
    Route::view('/', 'backend.dashboard')->name('dashboard');
    // user
    Route::resource('users', UserController::class);
    // categories
    Route::resource('categories', CategoryController::class)->except('show');
    // course
    Route::resource('courses', CourseController::class)->except('show');
    // courses list by student applied
    Route::get('/student-courses', [CourseUserController::class, 'studentCourses'])->name('courses.student');
    // courses list by teacher
    Route::get('/teacher-courses', [CourseController::class, 'teacherCourses'])->name('courses.teacher');
    Route::get('/teacher-courses/{id}/edit', [CourseController::class, 'teacherCourseEdit'])->name('courses.teacher.edit');
    Route::put('/teacher-courses/{id}/edit', [CourseController::class, 'teacherCourseUpdate'])->name('courses.teacher.update');
    // request course
    Route::get('request/{course}', [CourseUserController::class, 'changeStatus'])->name('course.request');
    // approved course
    Route::get('approved/{course}', [CourseUserController::class, 'changeStatus'])->name('course.approved');
    // rejected course
    Route::get('rejected/{course}', [CourseUserController::class, 'changeStatus'])->name('course.rejected');
});

