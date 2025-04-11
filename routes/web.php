<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard' ,[ DashboardController::class,'index']);

Route::get('login', [ AuthController::class,'index']);
Route::get('akun', [ AuthController::class,'akun'])->name('akun');
Route::post('akun',[AuthController::class,'store'])->name('akun.store');
