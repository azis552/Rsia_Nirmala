<?php

namespace App\Http\Controllers;

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
        // Kirim data slider ke view
        return view("welcome", compact('sliders', 'unggulans'));
    }
}
