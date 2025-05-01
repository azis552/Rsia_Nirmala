<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Poliklinik;
use Illuminate\Http\Request;
use Str;

class PoliklinikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polikliniks = Poliklinik::all();
        return view("admin.poliklinik.index", compact("polikliniks"));
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
            'name' => 'required|unique:polikliniks',
            'gambar1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'namadokter.*' => 'nullable|string|max:255',
            'deskripsi' => 'required',
        ]);

        // Upload gambar utama
        $gambar1Name = null;
        if ($request->hasFile('gambar1')) {
            $file = $request->file('gambar1');
            $gambar1Name = time() . rand(1, 999) . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/poliklinik'), $gambar1Name);
        }

        // Inisialisasi array dokter
        $namaDokters = [];
        $gambarDokters = [];

        // Loop semua dokter yang diinput
        if ($request->has('namadokter')) {
            foreach ($request->namadokter as $index => $nama) {
                $namaDokters[] = $nama;

                if ($request->hasFile("gambar.$index")) {
                    $file = $request->file("gambar")[$index];
                    $fileName = time() . rand(1000, 9999) . '_' . $file->getClientOriginalName();
                    $file->move(public_path('storage/foto_dokter'), $fileName);
                    $gambarDokters[] = $fileName;
                } else {
                    $gambarDokters[] = null; // Kalau tidak upload gambar
                }
            }
        }

        // Simpan ke database
        Poliklinik::create([
            'name' => $request->name,
            'slug' => $request->name,
            'image1' => $gambar1Name,
            'nama_dokter' => json_encode($namaDokters),
            'gambar_dokter' => json_encode($gambarDokters),
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('poliklinik.index')->with('success', 'Poliklinik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $beritas = Berita::orderBy('created_at', 'desc')->take(5)->get();
        $poliklinik = Poliklinik::where('slug', $id)->first();
        if (!$poliklinik) {
            abort(404);
        }
        return view('detailpoliklinik', compact('poliklinik', 'beritas'));
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
        // Validasi input
        $request->validate([
            'name' => 'required',
            'gambar1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'namadokter.*' => 'nullable|string|max:255',
            'deskripsi' => 'required',
        ]);


        // Cari poliklinik yang akan diupdate
        $poliklinik = Poliklinik::findOrFail($id);

        // Upload gambar utama jika ada perubahan
        $gambar1Name = $poliklinik->image1; // Default ke gambar lama
        if ($request->hasFile('gambar1')) {
            // Hapus gambar lama jika ada
            if ($gambar1Name) {
                unlink(public_path('storage/poliklinik/' . $gambar1Name));
            }

            // Upload gambar baru
            $file = $request->file('gambar1');
            $gambar1Name = time() . rand(1, 999) . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/poliklinik'), $gambar1Name);
        }

        // Ambil data gambar lama dokter (jika ada)
        $gambarDokters = json_decode($poliklinik->gambar_dokter, true);
        $namaDokters = $request->namadokter;

        // Update gambar dokter jika ada gambar yang di-upload
        if ($request->has('namadokter')) {
            foreach ($request->namadokter as $index => $nama) {
                // Cek apakah ada gambar baru untuk dokter ini
                if ($request->hasFile("gambar.$index")) {
                    // Hapus gambar lama jika ada
                    if (!empty($gambarDokters[$index]) && file_exists(public_path('storage/foto_dokter/' . $gambarDokters[$index]))) {
                        unlink(public_path('storage/foto_dokter/' . $gambarDokters[$index]));
                    }
                    // Upload gambar baru untuk dokter
                    $file = $request->file("gambar.$index");
                    $fileName = time() . rand(1000, 9999) . '_' . $file->getClientOriginalName();
                    $file->move(public_path('storage/foto_dokter'), $fileName);
                    $gambarDokters[$index] = $fileName; // Ganti dengan gambar baru
                } elseif (!isset($gambarDokters[$index])) {
                    // Jika dokter tidak memiliki gambar, biarkan null
                    $gambarDokters[$index] = null;
                }
            }
        }

        // Update data poliklinik
        $poliklinik->update([
            'name' => $request->name,
            'slug' => $request->name, // Bisa menggunakan slug generator jika diperlukan
            'image1' => $gambar1Name,
            'nama_dokter' => json_encode($namaDokters),
            'gambar_dokter' => json_encode($gambarDokters),
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('poliklinik.index')->with('success', 'Poliklinik berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poliklinik = Poliklinik::findOrFail($id);

        // Hapus gambar utama jika ada
        if ($poliklinik->image1 && file_exists(public_path('storage/poliklinik/' . $poliklinik->image1))) {
            unlink(public_path('storage/poliklinik/' . $poliklinik->image1));
        }

        // Hapus gambar-gambar dokter
        $gambarDokters = json_decode($poliklinik->gambar_dokter, true);
        if (is_array($gambarDokters)) {
            foreach ($gambarDokters as $gambar) {
                if ($gambar && file_exists(public_path('storage/foto_dokter/' . $gambar))) {
                    unlink(public_path('storage/foto_dokter/' . $gambar));
                }
            }
        }

        // Hapus data dari database
        $poliklinik->delete();

        return redirect()->route('poliklinik.index')->with('success', 'Data poliklinik berhasil dihapus.');;
    }

    public function polikliniklengkap()
    {
        $polikliniks = Poliklinik::paginate(10);
        return view('poliklinik', compact('polikliniks'));
    }
}
