<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\DocumentUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('courses', CoursesController::class);
Route::group(['middleware' => ['auth']], function () {
    Route::resource('user-course', UserCourseController::class);
    Route::resource('courses.lesson', LessonsController::class);
    Route::resource('document-user', DocumentUserController::class);
});
Auth::routes();
