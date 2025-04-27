<?php

namespace App\Http\Controllers;

use App\Models\Booking as ModelsBooking;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\Poliklinik;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Booking extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = ModelsBooking::orderBy("created_at", "desc")->get();
        return view("admin.booking.index", compact("bookings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "jenis_pasien" => "required",
                "tanggal_booking" => "required",
                "poliklinik_id" => "required",
                "dokter_id" => "required",
                "jadwal_dokter_id" => "required",
                "nik" => "required",
                "nama" => "required",
                "no_hp" => "required",
            ],
        );

        // Hitung jumlah booking pada tanggal, poliklinik, dokter, dan jadwal_dokter yang sama
        $jumlah = ModelsBooking::where('tanggal_booking', $data['tanggal_booking'])
            ->where('poliklinik_id', $data['poliklinik_id'])
            ->where('dokter_id', $data['dokter_id'])
            ->where('jadwal_dokter_id', $data['jadwal_dokter_id'])
            ->count();

        $profil = getProfil();

        // Set nomor antrian
        $data['no_antrian'] = $jumlah + 1;
        $booking = ModelsBooking::create($data);
        // Send message to Telegram
        $telegramResponse = \App\Helpers\TelegramHelper::booking($booking, $profil->token, $profil->chat_id_pendaftaran);
        if ($booking) {
            return redirect()->route("booking.form")->with("success", "Booking Berhasil");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function booking()
    {
        return view('bookingForm');
    }

    public function getDokterByPoliklinik($id)
    {
        $dokters = Dokter::where('poliklinik_id', $id)->get();
        return response()->json($dokters);
    }

    public function getJadwalByDokter($id)
    {
        $jadwalDokters = JadwalDokter::where('dokter_id', $id)->get();
        return response()->json($jadwalDokters);
    }

    public function getPoliklinikByTanggal(Request $request)
    {
        $tanggal = $request->tanggal;

        // Ambil nama hari dari tanggal (contoh: Senin, Selasa, dst.)
        $hari = Carbon::parse($tanggal)->locale('id')->isoFormat('dddd');

        // Ambil jadwal dokter di hari tersebut
        $jadwal = JadwalDokter::where('hari', ucfirst($hari))->with('dokter.poliklinik')->get();

        // Ambil dokter yang tersedia
        $dokters = $jadwal->pluck('dokter')->unique('id')->values();

        // Ambil poliklinik dari dokter
        $polikliniks = $dokters->pluck('poliklinik')->unique('id')->values();

        return response()->json([
            'polikliniks' => $polikliniks,
        ]);
    }
}
