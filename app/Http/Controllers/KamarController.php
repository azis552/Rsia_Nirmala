<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamars = Kamar::all();
        return view("admin.kamar.index", compact("kamars"));
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
            'name' => 'required',
            'deskripsi' => 'required',
            'kelas' => 'required',
            'gambar1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar5' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $filenameGambar1 = null;
        $filenameGambar2 = null;
        $filenameGambar3 = null;
        $filenameGambar4 = null;
        $filenameGambar5 = null;
        if ($request->hasFile('gambar1')) {
            $file = $request->file('gambar1');
            $filenameGambar1 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/kamar'), $filenameGambar1);
        }

        if ($request->hasFile('gambar2')) {
            $file = $request->file('gambar2');
            $filenameGambar2 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/kamar'), $filenameGambar2);
        }
        if ($request->hasFile('gambar3')) {
            $file = $request->file('gambar3');
            $filenameGambar3 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/kamar'), $filenameGambar3);
        }
        if ($request->hasFile('gambar4')) {
            $file = $request->file('gambar4');
            $filenameGambar4 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/kamar'), $filenameGambar4);
        }
        if ($request->hasFile('gambar5')) {
            $file = $request->file('gambar5');
            $filenameGambar5 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/kamar'), $filenameGambar5);
        }
        $kamar = Kamar::create([
            'name' => $request->name,
            'kelas' => $request->kelas,
            'description' => $request->deskripsi,
            'image1' => $filenameGambar1,
            'image2' => $filenameGambar2,
            'image3' => $filenameGambar3,
            'image4' => $filenameGambar4,
            'image5' => $filenameGambar5,
        ]);
        return redirect()->route('kamar.index')->with('success', 'Kamar created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kamar = Kamar::findOrFail($id);
        $beritas = Berita::all();
        return view('detailKamar', compact('kamar', 'beritas'));
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
        // validasi
        $request->validate([
            'name' => 'required',
            'kelas' => 'required',
            'deskripsi' => 'required',
            'gambar1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar5' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $filenameGambar1 = null;
        $filenameGambar2 = null;
        $filenameGambar3 = null;
        $filenameGambar4 = null;
        $filenameGambar5 = null;
        $kamar = Kamar::findOrFail($id);
        if ($request->hasFile('gambar1')) {
            $file = $request->file('gambar1');
            $filenameGambar1 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/kamar'), $filenameGambar1);
            if (file_exists(public_path('/storage/kamar/' . $kamar->image1)) && $kamar->image1 != null) {
                unlink(public_path('/storage/kamar/' . $kamar->image1));
            }
            $kamar->image1 = $filenameGambar1;
        }
        if ($request->hasFile('gambar2')) {
            $file = $request->file('gambar2');
            $filenameGambar2 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/kamar'), $filenameGambar2);
            if (file_exists(public_path('/storage/kamar/' . $kamar->image2)) && $kamar->image2 != null) {
                unlink(public_path('/storage/kamar/' . $kamar->image2));
            }
            $kamar->image2 = $filenameGambar2;
        }
        if ($request->hasFile('gambar3')) {
            $file = $request->file('gambar3');
            $filenameGambar3 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/kamar'), $filenameGambar3);
            if (file_exists(public_path('/storage/kamar/' . $kamar->image3)) && $kamar->image3 != null) {
                unlink(public_path('/storage/kamar/' . $kamar->image3));
            }
            $kamar->image3 = $filenameGambar3;
        }
        if ($request->hasFile('gambar4')) {
            $file = $request->file('gambar4');
            $filenameGambar4 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/kamar'), $filenameGambar4);
            if (file_exists(public_path('/storage/kamar/' . $kamar->image4)) && $kamar->image4 != null) {
                unlink(public_path('/storage/kamar/' . $kamar->image4));
            }
            $kamar->image4 = $filenameGambar4;
        }
        if ($request->hasFile('gambar5')) {
            $file = $request->file('gambar5');
            $filenameGambar5 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/kamar'), $filenameGambar5);
            if (file_exists(public_path('/storage/kamar/' . $kamar->image5)) && $kamar->image5 != null) {
                unlink(public_path('/storage/kamar/' . $kamar->image5));
            }
            $kamar->image5 = $filenameGambar5;
        }


        $kamar->name = $request->name;
        $kamar->kelas = $request->kelas;
        $kamar->description = $request->deskripsi;
        $kamar->save();
        return redirect()->route('kamar.index')->with('success', 'Data Kamar Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::find($id);
        if ($kamar->delete()) {
            if (file_exists(public_path('/storage/kamar/' . $kamar->image1)) && $kamar->image1 != null) {
                unlink(public_path('/storage/kamar/' . $kamar->image1));
            }
            if (file_exists(public_path('/storage/kamar/' . $kamar->image2)) && $kamar->image2 != null) {
                unlink(public_path('/storage/kamar/' . $kamar->image2));
            }
            if (file_exists(public_path('/storage/kamar/' . $kamar->image3))    && $kamar->image3 != null) {
                unlink(public_path('/storage/kamar/' . $kamar->image3));
            }
            if (file_exists(public_path('/storage/kamar/' . $kamar->image4)) && $kamar->image4 != null) {
                unlink(public_path('/storage/kamar/' . $kamar->image4));
            }
            if (file_exists(public_path('/storage/kamar/' . $kamar->image5)) && $kamar->image5 != null) {
                unlink(public_path('/storage/kamar/' . $kamar->image5));
            }
        }
        return redirect()->route('kamar.index')->with('success', 'Data Kamar Berhasil Dihapus');
        
    }
}
