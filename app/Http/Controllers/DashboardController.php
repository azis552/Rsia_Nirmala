<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookingCount = \App\Models\Booking::count();
        $dokterCount = \App\Models\Dokter::count();
        $rujukanCount = \App\Models\Rujukan::count();
        $poliklinikCount = \App\Models\Poliklinik::count();
        $userCount = \App\Models\User::count();
        $beritaCount = \App\Models\Berita::count();

        return view("admin.dashboard", compact("bookingCount","dokterCount","rujukanCount","poliklinikCount","userCount","beritaCount"));
    }
}
