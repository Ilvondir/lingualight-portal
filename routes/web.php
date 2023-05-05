<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EnrollmentController;
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
    Route::get("/users/register", "create")->name("users.register");
    Route::post("/users/register", "store")->name("users.store");
    Route::get("/account/edit", "edit")->name("account.edit");
    Route::post("/account/edit", "update")->name("account.edit.update");
    Route::get("/account/delete")->name("account.delete");
    Route::post("/account/delete")->name("account.delete.post");
});

Route::controller(EnrollmentController::class)->group(function () {
    Route::post("/course/{id}", "store")->name("enrollment.store");
});

Route::controller(AccountController::class)->group(function () {
    Route::get("/account", "menu")->name("account.menu");
    Route::get("/account/password", "password")->name("account.password");
    Route::post("/account/password", "change")->name("account.password.change");
});

?>
