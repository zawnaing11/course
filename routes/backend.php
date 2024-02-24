<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

//categories
Route::resource('categories', CategoryController::class)->except('show');
