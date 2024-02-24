<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;

//categories
Route::resource('categories', CategoryController::class)->except('show');
// course
Route::resource('courses', CourseController::class)->except('show');
