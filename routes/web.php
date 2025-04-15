<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PromosiUnggulan as ControllersPromosiUnggulan;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RujukanController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UnggulanController;
use App\Models\PromosiUnggulan;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');

Route::get('kamar/{id}', [KamarController::class, 'show'])->name('kamar.show');
Route::get('promotionlengkap', [PromotionController::class, 'promotionLengkap'])->name('promotion.selengkapnya');
Route::get('promosiUnggulan/{id}', [ControllersPromosiUnggulan::class, 'show'])->name('promosiUnggulan.show');
Route::get('berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('pelayanan/{slug}', [PelayananController::class, 'show'])->name('pelayanan.show');
Route::get('poliklinik/{slug}', [PoliklinikController::class, 'show'])->name('poliklinik.show');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login/check', [AuthController::class, 'login_check'])->name('login.check');
Route::get('beritaselengkapnya', [BeritaController::class, 'selengkapnya'])->name('berita.selengkapnya');
Route::get('profilLengkap', [ProfilController::class, 'profilLengkap'])->name('profil.lengkap');
Route::get('pelayananlengkap', [PelayananController::class,'pelayananLengkap'])->name('pelayanan.lengkap');
Route::get('polikliniklengkap', [PoliklinikController::class,'poliklinikLengkap'])->name('poliklinik.lengkap');
Route::get('dokterlengkap', [DokterController::class,'dokterLengkap'])->name('dokterlengkap');
Route::post('jadwalDokter', [DokterController::class,'jadwalDokter'])->name('jadwal.cari');


route::middleware('auth')->group(function () {
    Route::put('akunUpdate/{id}', [AuthController::class, 'update'])->name('akun.update');
    Route::delete('akunDelete/{id}', [AuthController::class, 'destroy'])->name('akun.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('akun', [AuthController::class, 'akun'])->name('akun');
    Route::post('akun', [AuthController::class, 'store'])->name('akun.store');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    // Slider Routes
    Route::resource('slider', SliderController::class)->except(['show', 'edit']);

    // Unggulan Routes
    Route::resource('unggulan', UnggulanController::class)->except(['show', 'edit']);

    // Berita Routes
    
    Route::resource('berita', BeritaController::class)->except([ 'show','edit']);

    // Profil Routes
    
    Route::resource('profil', ProfilController::class)->except(['show', 'edit']);
    // Pelayanan Routes
    Route::resource('pelayanan', PelayananController::class)->except(['show', 'edit']);

    // poliklinik Routes
    Route::resource('poliklinik', PoliklinikController::class)->except(['show', 'edit']);

    // Dokter Routes
    Route::resource('dokter', DokterController::class)->except(['show', 'edit']);

    // jadwal Routes
    Route::resource('jadwal', JadwalDokterController::class)->except(['show', 'edit']);

    // Promotion Routes

    Route::resource('promotion', PromotionController::class)->except(['show', 'edit']);

    // Fasilitas Unggulan Routes = promosi unggulan
    Route::resource('fasilitasUnggulan',ControllersPromosiUnggulan::class)->except(['show', 'edit']);

    // Kamar Routes
    Route::resource('kamar', KamarController::class)->except(['show', 'edit']);

    // Partner Routes
    Route::resource('partner', PartnerController::class)->except(['show', 'edit']);

    // Rujukan Routes
    Route::resource('rujukan', RujukanController::class)->except(['show', 'edit']);
});
