<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\PromosiUnggulan as ModelsPromosiUnggulan;
use Illuminate\Http\Request;

class PromosiUnggulan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitasUnggulans = ModelsPromosiUnggulan::all();
        return view("admin.fasilitasUnggulan.index", compact("fasilitasUnggulans"));
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
            'gambar1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar5' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $filenameGambar1 =null;
        $filenameGambar2 =null;
        $filenameGambar3 =null;
        $filenameGambar4 =null;
        $filenameGambar5 =null;
        if ($request->hasFile('gambar1')) {
            $file = $request->file('gambar1');
            $filenameGambar1 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/fasilitasUnggulan'), $filenameGambar1);
        }

        if ($request->hasFile('gambar2')) {
            $file = $request->file('gambar2');
            $filenameGambar2 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/fasilitasUnggulan'), $filenameGambar2);
        }
        if ($request->hasFile('gambar3')) {
            $file = $request->file('gambar3');
            $filenameGambar3 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/fasilitasUnggulan'), $filenameGambar3);
        }
        if ($request->hasFile('gambar4')) {
            $file = $request->file('gambar4');
            $filenameGambar4 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/fasilitasUnggulan'), $filenameGambar4);
        }
        if ($request->hasFile('gambar5')) {
            $file = $request->file('gambar5');
            $filenameGambar5 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/fasilitasUnggulan'), $filenameGambar5);
        }
        $fasilitasUnggulan = ModelsPromosiUnggulan::create([
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->deskripsi,
            'image1' => $filenameGambar1,
            'image2' => $filenameGambar2,
            'image3' => $filenameGambar3,
            'image4' => $filenameGambar4,
            'image5' => $filenameGambar5,
        ]);
        return redirect()->route('fasilitasUnggulan.index')->with('success', 'Fasilitas Unggulan created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $beritas = Berita::all();
        $fasilitasUnggulan = ModelsPromosiUnggulan::findOrFail($id);
        return view('detailFasilitasUnggulan', compact('fasilitasUnggulan', 'beritas'));
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
            'deskripsi' => 'required',
            'gambar1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar5' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $filenameGambar1 =null;
        $filenameGambar2 =null;
        $filenameGambar3 =null;
        $filenameGambar4 =null;
        $filenameGambar5 =null;
        $fasilitasUnggulan = modelsPromosiUnggulan::findOrFail($id);
        if ($request->hasFile('gambar1')) {
            $file = $request->file('gambar1');
            $filenameGambar1 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/fasilitasUnggulan'), $filenameGambar1);
            if (file_exists(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image1)) && $fasilitasUnggulan->image1 != null) {
                unlink(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image1));
            }
            $fasilitasUnggulan->image1 = $filenameGambar1;
        }
        if ($request->hasFile('gambar2')) {
            $file = $request->file('gambar2');
            $filenameGambar2 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/fasilitasUnggulan'), $filenameGambar2);
            if (file_exists(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image2)) && $fasilitasUnggulan->image2 != null) {
                unlink(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image2));
            }
            $fasilitasUnggulan->image2 = $filenameGambar2;
        }
        if ($request->hasFile('gambar3')) {
            $file = $request->file('gambar3');
            $filenameGambar3 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/fasilitasUnggulan'), $filenameGambar3);
            if (file_exists(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image3)) && $fasilitasUnggulan->image3 != null) {
                unlink(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image3));
            }
            $fasilitasUnggulan->image3 = $filenameGambar3;
        }
        if ($request->hasFile('gambar4')) {
            $file = $request->file('gambar4');
            $filenameGambar4 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/fasilitasUnggulan'), $filenameGambar4);
            if (file_exists(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image4)) && $fasilitasUnggulan->image4 != null) {
                unlink(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image4));
            }
            $fasilitasUnggulan->image4 = $filenameGambar4;
        }
        if ($request->hasFile('gambar5')) {
            $file = $request->file('gambar5');
            $filenameGambar5 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/fasilitasUnggulan'), $filenameGambar5);
            if (file_exists(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image5)) && $fasilitasUnggulan->image5 != null) {
                unlink(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image5));
            }
            $fasilitasUnggulan->image5 = $filenameGambar5;
        }


        $fasilitasUnggulan->name = $request->name;
        $fasilitasUnggulan->description = $request->deskripsi;
        $fasilitasUnggulan->save();
        return redirect()->route('fasilitasUnggulan.index')->with('success', 'Data Fasilitas Unggulan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fasilitasUnggulan = ModelsPromosiUnggulan::find($id);
        if ($fasilitasUnggulan->delete()) {
            if (file_exists(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image1)) && $fasilitasUnggulan->image1 != null) {
                unlink(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image1));
            }
            if (file_exists(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image2)) && $fasilitasUnggulan->image2 != null) {
                unlink(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image2));
            }
            if (file_exists(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image3))    && $fasilitasUnggulan->image3 != null) {
                unlink(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image3));
            }
            if (file_exists(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image4)) && $fasilitasUnggulan->image4 != null) {
                unlink(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image4));
            }
            if (file_exists(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image5)) && $fasilitasUnggulan->image5 != null) {
                unlink(public_path('/storage/fasilitasUnggulan/' . $fasilitasUnggulan->image5));
            }
        }
        return redirect()->route('fasilitasUnggulan.index')->with('success', 'Data Fasilitas Unggulan Berhasil Dihapus');
    }

    
}
