<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\Poliklinik;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polikliniks = Poliklinik::all(); 
        $dokters = Dokter::all();
        return view("admin.dokter.index", compact("dokters", "polikliniks"));
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
            'name' => 'required|unique:dokters',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'poliklinik' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/dokter'), $filename);
        } else {
            $filename = null;
        }

        Dokter::create([
            'name'=> $request->name,
            'poliklinik_id' => $request->poliklinik,
            'foto'=> $filename,
        ]);

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan');
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
        $dokter = Dokter::find($id);
        if ($dokter) {
            if ($dokter->foto) {
                $filePath = public_path('/storage/dokter/' . $dokter->foto);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $dokter->delete();
        }
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus');
    }
    public function dokterLengkap()
    {
        $dokters = Dokter::paginate(10);
        return view('dokter', compact('dokters'));
    }

    public function jadwalDokter(Request $request)
    {
        $dokterId = $request->dokter_id;
        $poliklinik_id = $request->poliklinik_id;
        $tanggal = $request->tanggal;
        $hari = Carbon::parse($tanggal)->locale('id')->dayName; // contoh: "senin"
        $hari = ucfirst($hari); // jadi "Senin"
        $dokters = JadwalDokter::with('dokter')->where('dokter_id', $dokterId)
            ->where('hari', $hari)
            ->whereHas('dokter', function ($query) use ($poliklinik_id) {
                $query->where('poliklinik_id', $poliklinik_id);
            })
            ->paginate(10);
        //dd($dokters);
        
    
        if ($dokters->isEmpty()) {
            return response()->json(['message' => 'Tidak ada jadwal untuk dokter ini pada hari tersebut.']);
        } else {
            $poliklinik = Poliklinik::find($poliklinik_id);

            return view('dokter', compact('dokters','poliklinik'));
        }
    }
}
