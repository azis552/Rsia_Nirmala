<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Poliklinik;
use Illuminate\Http\Request;

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
            $file->move(public_path('/storage/poliklinik'), $filenameGambar1);
        }

        if ($request->hasFile('gambar2')) {
            $file = $request->file('gambar2');
            $filenameGambar2 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/poliklinik'), $filenameGambar2);
        }
        if ($request->hasFile('gambar3')) {
            $file = $request->file('gambar3');
            $filenameGambar3 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/poliklinik'), $filenameGambar3);
        }
        if ($request->hasFile('gambar4')) {
            $file = $request->file('gambar4');
            $filenameGambar4 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/poliklinik'), $filenameGambar4);
        }
        if ($request->hasFile('gambar5')) {
            $file = $request->file('gambar5');
            $filenameGambar5 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/poliklinik'), $filenameGambar5);
        }
        $poliklinik = poliklinik::create([
            'name' => $request->name,
            'slug' => $request->name,
            'deskripsi' => $request->deskripsi,
            'image1' => $filenameGambar1,
            'image2' => $filenameGambar2,
            'image3' => $filenameGambar3,
            'image4' => $filenameGambar4,
            'image5' => $filenameGambar5,
        ]);
        return redirect()->route('poliklinik.index')->with('success', 'poliklinik created successfully.');
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
        $poliklinik = Poliklinik::findOrFail($id);
        if ($request->hasFile('gambar1')) {
            $file = $request->file('gambar1');
            $filenameGambar1 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/poliklinik'), $filenameGambar1);
            if (file_exists(public_path('/storage/poliklinik/' . $poliklinik->image1))) {
                unlink(public_path('/storage/poliklinik/' . $poliklinik->image1));
            }
            $poliklinik->image1 = $filenameGambar1;
        }
        if ($request->hasFile('gambar2')) {
            $file = $request->file('gambar2');
            $filenameGambar2 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/poliklinik'), $filenameGambar2);
            if (file_exists(public_path('/storage/poliklinik/' . $poliklinik->image2))) {
                unlink(public_path('/storage/poliklinik/' . $poliklinik->image2));
            }
            $poliklinik->image2 = $filenameGambar2;
        }
        if ($request->hasFile('gambar3')) {
            $file = $request->file('gambar3');
            $filenameGambar3 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/poliklinik'), $filenameGambar3);
            if (file_exists(public_path('/storage/poliklinik/' . $poliklinik->image3))) {
                unlink(public_path('/storage/poliklinik/' . $poliklinik->image3));
            }
            $poliklinik->image3 = $filenameGambar3;
        }
        if ($request->hasFile('gambar4')) {
            $file = $request->file('gambar4');
            $filenameGambar4 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/poliklinik'), $filenameGambar4);
            if (file_exists(public_path('/storage/poliklinik/' . $poliklinik->image4))) {
                unlink(public_path('/storage/poliklinik/' . $poliklinik->image4));
            }
            $poliklinik->image4 = $filenameGambar4;
        }
        if ($request->hasFile('gambar5')) {
            $file = $request->file('gambar5');
            $filenameGambar5 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/poliklinik'), $filenameGambar5);
            if (file_exists(public_path('/storage/poliklinik/' . $poliklinik->image5))) {
                unlink(public_path('/storage/poliklinik/' . $poliklinik->image5));
            }
            $poliklinik->image5 = $filenameGambar5;
        }


        $poliklinik->name = $request->name;
        $poliklinik->slug = $request->name;
        $poliklinik->deskripsi = $request->deskripsi;
        $poliklinik->save();
        return redirect()->route('poliklinik.index')->with('success', 'Data poliklinik Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poliklinik = Poliklinik::find($id);
        if ($poliklinik->delete()) {
            if (file_exists(public_path('/storage/poliklinik/' . $poliklinik->image1))) {
                unlink(public_path('/storage/poliklinik/' . $poliklinik->image1));
            }
            if (file_exists(public_path('/storage/poliklinik/' . $poliklinik->image2))) {
                unlink(public_path('/storage/poliklinik/' . $poliklinik->image2));
            }
            if (file_exists(public_path('/storage/poliklinik/' . $poliklinik->image3))) {
                unlink(public_path('/storage/poliklinik/' . $poliklinik->image3));
            }
            if (file_exists(public_path('/storage/poliklinik/' . $poliklinik->image4))) {
                unlink(public_path('/storage/poliklinik/' . $poliklinik->image4));
            }
            if (file_exists(public_path('/storage/poliklinik/' . $poliklinik->image5))) {
                unlink(public_path('/storage/poliklinik/' . $poliklinik->image5));
            }
        }
        return redirect()->route('poliklinik.index')->with('success', 'Data poliklinik Berhasil Dihapus');
    }

    public function polikliniklengkap()
    {
        $polikliniks = Poliklinik::paginate(10);
        return view('poliklinik', compact('polikliniks'));
    }
}
