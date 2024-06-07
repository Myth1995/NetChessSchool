<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MlmDashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('lang/change', [IndexController::class, 'change_lang'])->name('changeLang');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('login.out');
Route::get('service', [ServiceController::class, 'index'])->name('service.index');
Route::get('course/{id}', [CourseController::class, 'index'])->name('course.index');
Route::get('course/detail/{id}', [CourseController::class, 'detail'])->name('course.detail');
Route::get('course/list/{id}', [CourseController::class, 'couseList'])->name('course.list');

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', [ProfileController::class, 'view'])->name('profile.index');
    Route::post('profile/sub_all', [ProfileController::class, 'getSubscriptionAll'])->name('profile.sub_all');
    Route::post('/upload-avatar', [ProfileController::class, 'imageUploadPost'])->name('profile.image_upload');

    Route::get('mlm/dashboard', [MlmDashboardController::class, 'index'])->name('mlm.dashboard');
    Route::get('mlm/join/{sponser}', [MlmDashboardController::class, 'join'])->name('mlm.join');
    Route::post('mlm/register', [MlmDashboardController::class, 'registerMLM'])->name('mlm.register');
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');

    Route::get('stripe/checkout', [StripePaymentController::class, 'stripeCheckout'])->name('stripe.checkout');
    Route::get('stripe/checkout/success', [StripePaymentController::class, 'stripeCheckoutSuccess'])->name('stripe.checkout.success');

    Route::post('course/purchase', [CourseController::class, 'coursePurchase'])->name('course.purchase');

    Route::post('mlm/provided', [MlmDashboardController::class, 'getProvidedProfit'])->name('mlm.profit.provided');
    
});

Route::post('login_register', [LoginController::class, "register"])->name("login.register");
Route::post('login', [LoginController::class, 'login'])->name('login.request');
Route::post('login_email_check',[LoginController::class,'emailCheck'])->name('login.email.check');

Route::get('sendEmail', [MyController::class, 'sendEmail'])->name('send.email');

Route::get('/{any}', function (Request $request) {

    return view('errors.404');

})->where('any', '.*');