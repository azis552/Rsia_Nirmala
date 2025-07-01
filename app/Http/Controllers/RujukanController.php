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
            'perujuk' => 'nullable|string|max:255',
            'profesi' => 'nullable|string|max:255',
            'subjek' => 'nullable|string|max:255',
            'objek' => 'nullable|string|max:255',
            'suhu' => 'nullable|string|max:255',
            'tensi' => 'nullable|string|max:255',
            'berat' => 'nullable|string|max:255',
            'tinggi' => 'nullable|string|max:255',
            'RR' => 'nullable|string|max:255',
            'nadi' => 'nullable|string|max:255',
            'SpO2' => 'nullable|string|max:255',
            'GCS' => 'nullable|string|max:255',
            'Kesadaran' => 'nullable|string|max:255',
            'LP' => 'nullable|string|max:255',
            'Alergi' => 'nullable|string|max:255',
            'Asesmen' => 'nullable|string|max:255',
            'Plan' => 'nullable|string|max:255',
            'Instruksi' => 'nullable|string|max:255',
            'Evaluasi' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);
        // dd($request->all());

        $berkas = $request->file('Berkas');
        if ($berkas->isValid()) {
            $berkasName = time() . $berkas->getClientOriginalName();
            $berkas->move(public_path('storage/berkas'), $berkasName);
        } else {
            $berkasName = null;
        }

        $rujukan = Rujukan::create(
            [
                'rujukan_id' => (string) \Illuminate\Support\Str::uuid(),
                'nama' => $request->nama,
                'nik' => $request->nik,
                'No_Rujukan' => $request->no_rujukan,
                'perujuk' => $request->perujuk,
                'profesi' => $request->profesi,
                'subjek' => $request->subjek,
                'objek' => $request->objek,
                'suhu' => $request->suhu,
                'tensi' => $request->tensi,
                'berat' => $request->berat,
                'tinggi' => $request->tinggi,
                'RR' => $request->RR,
                'nadi' => $request->nadi,
                'SpO2' => $request->SpO2,
                'GCS' => $request->GCS,
                'Kesadaran' => $request->Kesadaran,
                'LP' => $request->LP,
                'Alergi' => $request->Alergi,
                'Asesmen' => $request->Asesmen,
                'Plan' => $request->Plan,
                'Instruksi' => $request->Instruksi,
                'Evaluasi' => $request->Evaluasi,
                'Berkas' => $berkasName,
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required',
            'no_rujukan' => 'required|max:255',
            'perujuk' => 'nullable|string|max:255',
            'profesi' => 'nullable|string|max:255',
            'subjek' => 'nullable|string|max:255',
            'objek' => 'nullable|string|max:255',
            'suhu' => 'nullable|string|max:255',
            'tensi' => 'nullable|string|max:255',
            'berat' => 'nullable|string|max:255',
            'tinggi' => 'nullable|string|max:255',
            'RR' => 'nullable|string|max:255',
            'nadi' => 'nullable|string|max:255',
            'SpO2' => 'nullable|string|max:255',
            'GCS' => 'nullable|string|max:255',
            'Kesadaran' => 'nullable|string|max:255',
            'LP' => 'nullable|string|max:255',
            'Alergi' => 'nullable|string|max:255',
            'Asesmen' => 'nullable|string|max:255',
            'Plan' => 'nullable|string|max:255',
            'Instruksi' => 'nullable|string|max:255',
            'Evaluasi' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $rujukan = Rujukan::findOrFail($id);

        // Cek dan simpan berkas baru jika ada
        if ($request->hasFile('Berkas')) {
            $berkas = $request->file('Berkas');

            if ($berkas->isValid()) {
                // Hapus berkas lama jika ada
                if ($rujukan->Berkas && file_exists(public_path('storage/berkas/' . $rujukan->Berkas))) {
                    unlink(public_path('storage/berkas/' . $rujukan->Berkas));
                }

                $berkasName = time() . '_' . $berkas->getClientOriginalName();
                $berkas->move(public_path('storage/berkas'), $berkasName);
                $rujukan->Berkas = $berkasName;
            }
        }

        // Update data lainnya
        $rujukan->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'No_Rujukan' => $request->no_rujukan,
            'perujuk' => $request->perujuk,
            'profesi' => $request->profesi,
            'subjek' => $request->subjek,
            'objek' => $request->objek,
            'suhu' => $request->suhu,
            'tensi' => $request->tensi,
            'berat' => $request->berat,
            'tinggi' => $request->tinggi,
            'RR' => $request->RR,
            'nadi' => $request->nadi,
            'SpO2' => $request->SpO2,
            'GCS' => $request->GCS,
            'Kesadaran' => $request->Kesadaran,
            'LP' => $request->LP,
            'Alergi' => $request->Alergi,
            'Asesmen' => $request->Asesmen,
            'Plan' => $request->Plan,
            'Instruksi' => $request->Instruksi,
            'Evaluasi' => $request->Evaluasi,
            'Keterangan' => $request->keterangan,
            'faskes_id' => Auth::user()->id,
        ]);

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
