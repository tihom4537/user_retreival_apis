<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\CoursesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('user/details', UserDetailsController::class);

Route::get('user/{user_roles}', [UserDetailsController::class, 'getUserByRole']);
Route::get('course/{course_name}', [CoursesController::class, 'getUsersByCourse']);