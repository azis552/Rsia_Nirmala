<?php

namespace App\Http\Controllers;

use App\Models\BerkasPegawai;
use Illuminate\Http\Request;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua berkas pegawai yang terkait dengan user yang sedang login
        $berkas = BerkasPegawai::where('user_id', auth()->user()->id)->get();
        // Kirim data berkas ke view
        return view('admin.pegawai.berkas', compact('berkas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pegawai.createberkas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $request->validate([
            'berkas' => 'required|file|mimes:pdf',
            'nama_berkas' => 'nullable|string|max:255',
        ]);

        // Simpan berkas
        $file = $request->file('berkas');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('storage/berkas'), $fileName);

        $berkas = BerkasPegawai::create([
            'nama_berkas' => $request->nama_berkas,
            'berkas' => $fileName,
            'user_id' => auth()->user()->id, // Asumsikan user yang login adalah pegawai
        ]);

        // Cek apakah berkas berhasil disimpan
        if (!$berkas) {
            return redirect()->back()->with('error', 'Gagal menambahkan berkas');
        }
        return redirect()->route('berkasPegawai.index')->with('success', 'Berkas berhasil ditambahkan');   

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
}
