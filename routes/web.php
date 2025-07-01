<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Booking;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NotifikasiController;
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
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

Route::get('/link', function () {
    Artisan::call('storage:link');
    return 'Symlink storage berhasil dibuat!';
});
Broadcast::routes(['middleware' => [ 'auth']]);
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
Route::get('booking', [Booking::class,'booking'])->name('booking.form');
Route::post('booking', [Booking::class,'store'])->name('booking.store');
Route::get('/get-poliklinik-by-tanggal', [Booking::class, 'getPoliklinikByTanggal']);
Route::get('/get-dokter-by-poliklinik/{id}', [Booking::class, 'getDokterByPoliklinik']);
Route::get('/get-jadwal-by-dokter/{id}', [Booking::class, 'getJadwalByDokter']);

Route::post('kritikSaran', [KritikSaranController::class, 'store'])->name('kritikSaran.store');
Route::get('infoTT', [LandingPageController::class,'infoTT'])->name('infoTT');





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
    
    Route::resource('profil', ProfilController::class)->except([ 'edit']);
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
    Route::resource('rujukan', RujukanController::class)->except([ 'edit']);
    Route::get('rujukan/{id}/updateStatus/{status}', [RujukanController::class, 'updateStatus'])->name('rujukan.updateStatus');

    Route::resource('notifikasi', NotifikasiController::class)->except(['show', 'edit']);

    Route::get('booking-list', [Booking::class, 'index'])->name('booking.index');

    // Kritik dan Saran Routes
    Route::resource('kritikSaran', KritikSaranController::class)->except(['store','show', 'edit']);

    Route::delete('booking-delete/{id}', [Booking::class,'destroy'])->name('booking.destroy');

    Route::get('pegawai', [AuthController::class, 'pegawai'])->name('pegawai');
    Route::post('/pegawai/{id}', [AuthController::class, 'updatePegawai'])->name('pegawai.update');

});
