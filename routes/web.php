<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\ContactController;
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
    Route::get('/courses/{id}', 'show')->name('course.show');
    Route::get("/courses/{id}/delete", "delete")->name("courses.delete")->middleware("auth");
    Route::post("/courses/{id}/delete", "destroy")->name("courses.destroy")->middleware("auth");
    Route::get('/courses/{id}/edit', 'edit')->name('course.edit')->middleware("auth");
    Route::post('/courses/{id}/edit', 'update')->name('course.update')->middleware("auth");
    Route::get("courses/create", "create")->name("courses.create")->middleware("auth");
    Route::post("courses/create", "store")->name("courses.store")->middleware("auth");
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('auth.login');
    Route::post('/auth/login', 'authenticate')->name('auth.login.authenticate');
    Route::get('/auth/logout', 'logout')->name('auth.logout');
});

Route::controller(UserController::class)->group(function () {
    Route::get("/users/register", "create")->name("users.register");
    Route::post("/users/register", "store")->name("users.store");
    Route::get("/users/index", "index")->name("users.index")->middleware("auth");
    Route::get("/users/{id}/delete", "delete")->name("users.delete")->middleware("auth");
    Route::post("/users/{id}/delete", "destroy")->name("users.destroy")->middleware("auth");
    Route::get("/users/{id}/edit", "edit")->name("users.edit")->middleware("auth");
    Route::post("/users/{id}/edit", "update")->name("users.update")->middleware("auth");
});

Route::controller(EnrollmentController::class)->group(function () {
    Route::post("/courses/{id}", "form")->name("enrollment.form")->middleware("auth");
    Route::get("/courses/{id}/payed", "payed")->name("enrollment.payed")->middleware("auth");
});

Route::controller(AccountController::class)->group(function () {
    Route::get("/account", "menu")->name("account.menu")->middleware("auth");
    Route::get("/account/password", "password")->name("account.password")->middleware("auth");
    Route::post("/account/password", "change")->name("account.password.change")->middleware("auth");
    Route::get("/account/edit", "edit")->name("account.edit")->middleware("auth");
    Route::post("/account/edit", "update")->name("account.edit.update")->middleware("auth");
    Route::get("/account/delete", "delete")->name("account.delete")->middleware("auth");
    Route::post("/account/delete", "destroy")->name("account.destroy")->middleware("auth");
    Route::get("/account/courses", "courses")->name("account.courses")->middleware("auth");
    Route::post("/account/courses", "filterCourse")->name("account.filterCourse")->middleware("auth");
    Route::get("/account/your_courses", "your_courses")->name("account.your_courses")->middleware("auth");
    Route::post("/account/your_courses", "filter_your_courses")->name("account.filter_your_courses")->middleware("auth");
});


Route::controller(ConfirmationController::class)->group(function () {
    Route::get("/account/confirmation", "create")->name("confirmation.create")->middleware("auth");
    Route::post("/account/confirmation", "store")->name("confirmation.store")->middleware("auth");
    Route::get("/confirmations/index", "index")->name("confirmations.index")->middleware("auth");
    Route::get("/confirmations/{id}", "show")->name("confirmations.show")->middleware("auth");
    Route::post("/confirmations/{id}", "verdict")->name("confirmations.verdict")->middleware("auth");
});

Route::controller(ContactController::class)->group(function () {
    Route::get("/contact", "index")->name("contact");
    Route::get("/contact/edit", "edit")->name("contact.edit")->middleware("auth");
    Route::post("/contact/edit", "update")->name("contact.update")->middleware("auth");
})

?>
