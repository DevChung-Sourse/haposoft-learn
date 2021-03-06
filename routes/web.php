<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\DocumentUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\ManagerCourseController;
use App\Http\Controllers\CreateLessonsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::resource('user-course', UserCourseController::class);
    Route::resource('courses.lesson', LessonsController::class);
    Route::resource('document-user', DocumentUserController::class);
    Route::resource('review', ReviewController::class);
});
Route::resource('user-profile', UserController::class);
Route::resource('my-course', MyCourseController::class);
Route::resource('manager-course', ManagerCourseController::class);
Route::resource('manager-course.lesson', CreateLessonsController::class);
Route::resource('manager-course.lesson.document', DocumentController::class);
Route::get('/google', [\App\Http\Controllers\Api\GoogleController::class, 'getGoogleSignInUrl']);
Route::get('/google/callback', [\App\Http\Controllers\Api\GoogleController::class, 'loginCallback']);
