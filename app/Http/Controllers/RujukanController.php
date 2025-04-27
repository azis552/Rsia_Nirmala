<?php

namespace App\Http\Controllers;

use App\Events\NotifikasiRujukanAdmin;
use App\Events\NotifikasiRujukanUser;
use App\Helpers\TelegramHelper;
use App\Models\Profil;
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
        if (Auth::user()->role == "admin") {
            $rujukans = Rujukan::orderByRaw("status = 'menunggu' DESC")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $rujukans = Rujukan::where('faskes_id', Auth::user()->id)->get();
        }
        // dd($rujukans);
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
                'Dokter_Perujuk' => $request->dokter_perujuk,
                'Diagnosa' => $request->diagnosa,
                'Kategori_Rujukan' => $request->kategori_rujukan,
                'Keterangan' => $request->keterangan,
                'faskes_id' => Auth::user()->id,
            ]
        );
        event(new NotifikasiRujukanAdmin($rujukan, $link = route('rujukan.show', $rujukan->rujukan_id)));
        $profil = getProfil();
        TelegramHelper::sendRujukanMessage(
            $rujukan,
            $rujukan->faskes->faskes,
            route('rujukan.show', $rujukan->rujukan_id),
            $profil->token,
            $profil->chat_id_pendaftaran,
        );

        TelegramHelper::sendRujukanMessage(
            $rujukan,
            $rujukan->faskes->faskes,
            route('rujukan.show', $rujukan->rujukan_id),
            $profil->token,
            $profil->chat_id_humas,
        );
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

        $validate = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|max:17',
            'no_rujukan' => 'required|max:255',
            'dokter_perujuk'=> 'required|max:255',
            'diagnosa' => 'required|max:255',
            'kategori_rujukan' => 'required|max:255',
            'keterangan'=> 'required'
        ]);

        // Find the rujukan record by ID
        $rujukan = Rujukan::where('id', $id)->firstOrFail();
        // Update the rujukan record with the validated data
        $rujukan->nama = $request->nama;
        $rujukan->nik = $request->nik;
        $rujukan->No_Rujukan = $request->no_rujukan;
        $rujukan->Dokter_Perujuk = $request->dokter_perujuk;
        $rujukan->Diagnosa = $request->diagnosa;
        $rujukan->Kategori_Rujukan = $request->kategori_rujukan;
        $rujukan->Keterangan = $request->keterangan;

        // Save the updated rujukan record
        $rujukan->save();
        // Redirect back to the rujukan index page with a success message
        return redirect()->route('rujukan.index')->with('success', 'Rujukan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rujukan = Rujukan::find($id);
        $rujukan->delete();
        return redirect()->route('rujukan.index')->with('success', 'Rujukan deleted successfully.');
    }

    public function updateStatus(string $id, string $status)
    {
        // Find the rujukan record by ID
        $rujukan = Rujukan::where('id', $id)->firstOrFail();

        // Update the status of the rujukan record
        $rujukan->update(['status' => $status, 'admin_id' => Auth::user()->id]);

        event(new NotifikasiRujukanUser($rujukan, route('rujukan.show', $rujukan->rujukan_id)));
        \Log::info('Notifikasi Rujukan User', [
            'rujukan' => $rujukan,
            'link' => route('rujukan.show', $rujukan->rujukan_id),
        ]);
        $profil = getProfil();
        // Send a notification to the user via Telegram
        TelegramHelper::sendRujukanMessage(
            $rujukan,
            $rujukan->faskes->faskes,
            route('rujukan.show', $rujukan->rujukan_id),
            $profil->token,
            $profil->chat_id_pendaftaran,
        );

        TelegramHelper::sendRujukanMessage(
            $rujukan,
            $rujukan->faskes->faskes,
            route('rujukan.show', $rujukan->rujukan_id),
            $profil->token,
            $profil->chat_id_humas,
        );

        return redirect()->route('rujukan.index')->with('success', 'Status updated successfully.');
    }
}
