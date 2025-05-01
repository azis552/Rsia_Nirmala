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
use Illuminate\Support\Facades\Http;

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
        $pelayanans = Pelayanan::orderBy('created_at', 'desc')->take(8)->get();

        $polikliniks = Poliklinik::orderBy('created_at', 'desc')->take(8)->get();

        $dokters = Dokter::orderBy('created_at', 'desc')->get();

        $promotions = Promotion::orderBy('created_at', 'desc')->take(8)->get();

        $promosiUnggulans = PromosiUnggulan::orderBy('created_at', 'desc')->get();

        $kamars = Kamar::orderBy('created_at', 'desc')->get();

        $partners = Partner::orderBy('created_at', 'desc')->get();
        // Kirim data ke view
        return view(
            "welcome",
            compact(
                'sliders',
                'unggulans',
                'beritas',
                'pelayanans',
                'polikliniks',
                'dokters',
                'promotions',
                'promosiUnggulans',
                'kamars',
                'partners'
            )
        );
    }

    public function infoTT()
    {
        // Konfigurasi
        $consId = '26490';
        $secretKey = '4pV75D723D';
        $userKey = '94126ec247081055c469f9b155441339';

        date_default_timezone_set('UTC');
        $timestamp = strval(time());
        $signature = base64_encode(hash_hmac('sha256', $consId . '&' . $timestamp, $secretKey, true));

        // Kirim request
        $response = Http::withHeaders([
            'x-cons-id' => $consId,
            'X-timestamp' => $timestamp,
            'X-signature' => $signature,
            'user_key' => $userKey
        ])->get('https://new-api.bpjs-kesehatan.go.id/aplicaresws/rest/bed/read/0210R018/1/100');

        if (!$response->successful()) {
            return response()->json(['error' => 'Gagal mengakses API'], 500);
        }

        // Proses respons
        $responseBody = $response->json();
        $enkripsi = $responseBody['response'];

        $key = $consId . $secretKey . $timestamp;

        // Load library LZString
        require_once app_path('Helpers/lzstring/LZString.php');
        require_once app_path('Helpers/lzstring/LZReverseDictionary.php');
        require_once app_path('Helpers/lzstring/LZUtil.php');
        require_once app_path('Helpers/lzstring/LZContext.php');
        require_once app_path('Helpers/lzstring/LZData.php');

        $beritalain = Berita::
            where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        return view('infoTT', [
            'list' => $enkripsi['list'] ?? [] // pastikan hanya mengirim bagian 'list'
        ], compact('beritalain'));
    }

}
