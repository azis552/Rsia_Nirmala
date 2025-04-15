<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Dokter;
use App\Models\Kamar;
use App\Models\Partner;
use App\Models\Pelayanan;
use App\Models\Poliklinik;
use App\Models\PromosiUnggulan;
use App\Models\Promotion;
use App\Models\Slider;
use App\Models\Unggulan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil semua data slider dari database
        $sliders = Slider::orderBy('urutan', 'asc')->get();
        // Ambil data unggulan dari database
        $unggulans = Unggulan::orderBy('urutan', 'asc')->get();
        // Ambil data berita dari database
        $beritas = Berita::orderBy('created_at', 'desc')->take(4)->get();
        // Kirim data slider ke view
        $pelayanans =Pelayanan::orderBy('created_at','desc')->take(8)->get();

        $polikliniks = Poliklinik::orderBy('created_at','desc')->take(8)->get();

        $dokters = Dokter::orderBy('created_at','desc')->get();

        $promotions = Promotion::orderBy('created_at','desc')->take(8)->get();

        $promosiUnggulans = PromosiUnggulan::orderBy('created_at','desc')->get();

        $kamars = Kamar::orderBy('created_at','desc')->get();

        $partners = Partner::orderBy('created_at','desc')->get();
        // Kirim data ke view
        return view("welcome", 
        compact('sliders', 
        'unggulans', 'beritas','pelayanans','polikliniks','dokters','promotions', 'promosiUnggulans','kamars','partners'));
    }
}
