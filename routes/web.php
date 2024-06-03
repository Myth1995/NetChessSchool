<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MlmDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('lang/change', [IndexController::class, 'change_lang'])->name('changeLang');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('login.out');
Route::get('service', [ServiceController::class, 'index'])->name('service.index');
Route::get('course/{id}', [CourseController::class, 'index'])->name('course.index');
Route::get('course/detail', [CourseController::class, 'detail'])->name('course.detail');
Route::get('course/list', [CourseController::class, 'list'])->name('course.list');

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('mlm/dashboard', [MlmDashboardController::class, 'index'])->name('mlm.dashboard');
    Route::get('mlm/join/{sponser}', [MlmDashboardController::class, 'join'])->name('mlm.join');
    Route::post('mlm/register', [MlmDashboardController::class, 'registerMLM'])->name('mlm.register');
});

Route::post('login_register', [LoginController::class, "register"])->name("login.register");
Route::post('login', [LoginController::class, 'login'])->name('login.request');
Route::post('login_email_check',[LoginController::class,'emailCheck'])->name('login.email.check');

Route::get('sendEmail', [MyController::class, 'sendEmail'])->name('send.email');

Route::get('/{any}', function (Request $request) {

    return view('errors.404');

})->where('any', '.*');