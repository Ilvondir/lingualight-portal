<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [Index::class, 'show'])->name("home");

Route::get("/", function() {
    return redirect()->route("home");
});

Route::controller(CourseController::class)->group(function () {
    Route::get('/courses', 'index')->name('courses.index');
    Route::post("/courses", "filter")->name("course.filter");
    Route::get('/course/{id}', 'show')->name('course.show');
    Route::get('/course/{id}/edit', 'edit')->name('course.edit');
    Route::put('/course/{id}', 'update')->name('course.update');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('auth.login');
    Route::post('/auth/login', 'authenticate')->name('auth.login.authenticate');
    Route::get('/auth/logout', 'logout')->name('auth.logout');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/{id}/edit', 'edit')->name('users.edit');
    Route::put('/users/{id}', 'update')->name('users.update');
    Route::get("/users/register", "create")->name("users.register");
    Route::post("/users/register", "store")->name("users.store");
});
