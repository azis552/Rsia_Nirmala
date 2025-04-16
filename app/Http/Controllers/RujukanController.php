<?php

namespace App\Http\Controllers;

use App\Models\Rujukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Str;

class RujukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all rujukan records from the database
        $rujukans = Rujukan::all();
        return view("admin.rujukan.index", compact('rujukans'));
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
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|max:17',
            'no_rujukan' => 'required|max:255',
            'dokter_perujuk' => 'required|max:255',
            'diagnosa' => 'required|max:255',
            'kategori_rujukan' => 'required|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);
        // dd($request->all());

        $rujukan = Rujukan::create(
            [
                'rujukan_id' => (string) \Illuminate\Support\Str::uuid(),
                'nama' => $request->nama,
                'nik' => $request->nik,
                'No_Rujukan' => $request->no_rujukan,
                'Dokter_Perujuk'=> $request->dokter_perujuk,
                'Diagnosa' => $request->diagnosa,
                'Kategori_Rujukan' => $request->kategori_rujukan,
                'Keterangan' => $request->keterangan,
                'faskes_id' => Auth::user()->id,
            ]);

        // Kirim ke Telegram
        $token = '8006739370:AAHX1rwNk4SpYjBee2ue6irwcPR0CtdpjFs';
        $chat_id = '-4756811140';
        $message = "📋 *Data Rujukan Baru:*\n"
            . "👤 Nama: {$rujukan->nama}\n"
            . "🆔 NIK: {$rujukan->nik}\n"
            . "📄 No Rujukan: {$rujukan->No_Rujukan}\n"
            . "🩺 Dokter: {$rujukan->Dokter_Perujuk}\n"
            . "🏥 Faskes: " . Auth::user()->faskes . "\n"
            . "🧾 Diagnosa: {$rujukan->Diagnosa}\n"
            . "🏷️ Kategori: {$rujukan->Kategori_Rujukan}\n"
            . "📝 Keterangan: " . ($rujukan->Keterangan ?? '-') . "\n"
            . "🕒 Tanggal: " . now()->format('d-m-Y H:i') ."\n"
            . "\n"
            . "🔗 Link: " . route('rujukan.show', $rujukan->rujukan_id);

        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        Http::post($url, [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'Markdown'
        ]);
        return redirect()->route('rujukan.index')->with('success', 'Rujukan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the rujukan record by ID
        $rujukan = Rujukan::where('rujukan_id', $id)->firstOrFail();

        // Return the view with the rujukan data
        return view('admin.rujukan.show', compact('rujukan'));
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

    public function updateStatus( string $id, string $status)
    {
        // Find the rujukan record by ID
        $rujukan = Rujukan::where('id', $id)->firstOrFail();

        // Update the status of the rujukan record
        $rujukan->update(['status' => $status, 'admin_id' => Auth::user()->id]);

        return redirect()->route('rujukan.index')->with('success', 'Status updated successfully.');
    }
}
