<?php

use App\Http\Controllers\CourseController;
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
    Route::get('/course/{id}', 'show')->name('course.show');
    Route::get('/course/{id}/edit', 'edit')->name('course.edit');
    Route::put('/course/{id}', 'update')->name('course.update');
});
