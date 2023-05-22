<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ConfirmationController;
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
    Route::get("/course/{id}/delete", "delete")->name("courses.delete");
    Route::post("/course/{id}/delete", "destroy")->name("courses.destroy");
    Route::get('/course/{id}/edit', 'edit')->name('course.edit');
    Route::post('/course/{id}/edit', 'update')->name('course.update');
    Route::get("courses/create", "create")->name("courses.create");
    Route::post("courses/create", "store")->name("courses.store");
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('auth.login');
    Route::post('/auth/login', 'authenticate')->name('auth.login.authenticate');
    Route::get('/auth/logout', 'logout')->name('auth.logout');
});

Route::controller(UserController::class)->group(function () {
    Route::get("/users/register", "create")->name("users.register");
    Route::post("/users/register", "store")->name("users.store");
    Route::get("/users/index", "index")->name("users.index");
    Route::get("/users/{id}/delete", "delete")->name("users.delete");
    Route::post("/users/{id}/delete", "destroy")->name("users.destroy");
    Route::get("/users/{id}/edit", "edit")->name("users.edit");
    Route::post("/users/{id}/edit", "update")->name("users.update");
});

Route::controller(EnrollmentController::class)->group(function () {
    Route::post("/course/{id}", "form")->name("enrollment.form");
    Route::get("/course/{id}/payed", "payed")->name("enrollment.payed");
});

Route::controller(AccountController::class)->group(function () {
    Route::get("/account", "menu")->name("account.menu");
    Route::get("/account/password", "password")->name("account.password");
    Route::post("/account/password", "change")->name("account.password.change");
    Route::get("/account/edit", "edit")->name("account.edit");
    Route::post("/account/edit", "update")->name("account.edit.update");
    Route::get("/account/delete", "delete")->name("account.delete");
    Route::post("/account/delete", "destroy")->name("account.destroy");
    Route::get("/account/courses", "courses")->name("account.courses");
    Route::post("/account/courses", "filterCourse")->name("account.filterCourse");
    Route::get("/account/your_courses", "your_courses")->name("account.your_courses");
    Route::post("/account/your_courses", "filter_your_courses")->name("account.filter_your_courses");
});


Route::controller(ConfirmationController::class)->group(function () {
    Route::get("/account/confirmation", "create")->name("confirmation.create");
    Route::post("/account/confirmation", "store")->name("confirmation.store");
    Route::get("/confirmations/index", "index")->name("confirmations.index");
    Route::get("/confirmations/{id}", "show")->name("confirmations.show");
    Route::post("/confirmations/{id}", "verdict")->name("confirmations.verdict");
});

?>
