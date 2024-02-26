<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseUserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// login
Route::middleware('guest:web')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout'); // logout
    Route::view('/', 'backend.dashboard')->name('dashboard'); // dashboard

    // admin
    Route::middleware('checkUserRole:admin')->group(function () {
        Route::resource('users', UserController::class); // user
        Route::resource('categories', CategoryController::class)->except('show'); // categories
        Route::resource('courses', CourseController::class)->except('show'); // course
        Route::get('approved/{course}', [CourseUserController::class, 'changeStatus'])->name('course.approved'); // approved course
        Route::get('rejected/{course}', [CourseUserController::class, 'changeStatus'])->name('course.rejected'); // rejected course
    });

    // both admin and staff
    Route::middleware('checkUserRole:admin_staff')->group(function () {
        Route::get('/student-courses', [CourseUserController::class, 'studentCourses'])->name('courses.student'); // courses list by student applied
        Route::get('/student/info/{id}', [CourseUserController::class, 'studentInfo'])->name('student.info'); // student info
    });

    // staff
    Route::middleware('checkUserRole:staff')->group(function () {
        Route::get('/student-courses/export', [CourseUserController::class, 'studentCoursesExport'])->name('student-courses.export'); // excel export for student lists
        Route::get('request/{course}', [CourseUserController::class, 'changeStatus'])->name('course.request'); // request to admin
    });

    // teacher
    Route::middleware('checkUserRole:teacher')->group(function () {
        Route::get('/teacher-courses', [CourseController::class, 'teacherCourses'])->name('courses.teacher'); // courses list by teacher
        Route::get('/teacher-courses/{id}/edit', [CourseController::class, 'teacherCourseEdit'])->name('courses.teacher.edit');
        Route::put('/teacher-courses/{id}/edit', [CourseController::class, 'teacherCourseUpdate'])->name('courses.teacher.update');
    });

    // student
    Route::middleware('checkUserRole:student')->group(function () {
        Route::get('/course-list', [StudentController::class, 'courseList'])->name('course.list'); // courses list
    });

});

