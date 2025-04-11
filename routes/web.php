<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');




Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login/check', [AuthController::class, 'login_check'])->name('login.check');



route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('akun', [AuthController::class, 'akun'])->name('akun');
    Route::post('akun', [AuthController::class, 'store'])->name('akun.store');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::put('akun/{id}', [AuthController::class, 'update'])->name('akun.update');
    Route::delete('akun/{id}', [AuthController::class, 'destroy'])->name('akun.destroy');

    // Slider Routes
    Route::resource('slider', SliderController::class)->except(['show', 'edit']);
});
