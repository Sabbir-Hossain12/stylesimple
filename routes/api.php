<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FrontendController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API Start 23 September

Route::name('api.')->group(function () {

    Route::post('/register', [FrontendController::class, 'userRegister'])->name('user.register');
    Route::post('/login', [FrontendController::class, 'userLogin'])->name('user.login');
    Route::post('/forgot-password', [FrontendController::class, 'userForgotPassword'])->name('user.forgot-password');
    Route::post('/reset-password', [FrontendController::class, 'userResetPassword'])->name('user.reset-password');

    Route::get('/settings', [FrontendController::class, 'settings'])->name('user.settings');
    Route::get('/sliders', [FrontendController::class, 'sliders'])->name('user.sliders');
    Route::get('/big-banner', [FrontendController::class, 'bigBanner'])->name('user.big-banner');
    Route::get('/small-banner', [FrontendController::class, 'smallBanner'])->name('user.small-banner');

    Route::get('/pages',[FrontendController::class, 'pages'])->name('user.pages');

});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [FrontendController::class, 'userLogout'])->name('api.user.logout');
    Route::post('/confirm-password', [FrontendController::class, 'userConfirmPassword'])->name('api.user.confirm-password');

    //Profile
    Route::get('/user-profile', [FrontendController::class, 'userProfile'])->name('api.user.profile');
    Route::post('/update-profile', [FrontendController::class, 'updateProfile'])->name('api.update.profile');
    Route::get('/user-order-history', [FrontendController::class, 'userOrderHistory'])->name('api.user.order-history');

    //Review store
    Route::post('/review/store', [FrontendController::class, 'reviewStore'])->name('api.review.store');

});
