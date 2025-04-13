<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pelayanan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelayanans = Pelayanan::all();
        return view("admin.pelayanan.index", compact("pelayanans"));
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
            'name' => 'required|unique:pelayanans',
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
            $file->move(public_path('/storage/pelayanan'), $filenameGambar1);
        }

        if ($request->hasFile('gambar2')) {
            $file = $request->file('gambar2');
            $filenameGambar2 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/pelayanan'), $filenameGambar2);
        }
        if ($request->hasFile('gambar3')) {
            $file = $request->file('gambar3');
            $filenameGambar3 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/pelayanan'), $filenameGambar3);
        }
        if ($request->hasFile('gambar4')) {
            $file = $request->file('gambar4');
            $filenameGambar4 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/pelayanan'), $filenameGambar4);
        }
        if ($request->hasFile('gambar5')) {
            $file = $request->file('gambar5');
            $filenameGambar5 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/pelayanan'), $filenameGambar5);
        }
        $pelayanan = Pelayanan::create([
            'name' => $request->name,
            'slug' => $request->name,
            'deskripsi' => $request->deskripsi,
            'image1' => $filenameGambar1,
            'image2' => $filenameGambar2,
            'image3' => $filenameGambar3,
            'image4' => $filenameGambar4,
            'image5' => $filenameGambar5,
        ]);
        return redirect()->route('pelayanan.index')->with('success', 'Pelayanan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $beritas = Berita::orderBy('created_at', 'desc')->take(5)->get();

        // ambil data pelayanan berdasarkan slug
        $pelayanan = Pelayanan::where('slug', $id)->first();
        if (!$pelayanan) {
            abort(404);
        }
        return view('detailpelayanan', compact('pelayanan', 'beritas'));
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
        $pelayanan = Pelayanan::findOrFail($id);
        if ($request->hasFile('gambar1')) {
            $file = $request->file('gambar1');
            $filenameGambar1 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/pelayanan'), $filenameGambar1);
            if (file_exists(public_path('/storage/pelayanan/' . $pelayanan->image1))) {
                unlink(public_path('/storage/pelayanan/' . $pelayanan->image1));
            }
            $pelayanan->image1 = $filenameGambar1;
        }
        if ($request->hasFile('gambar2')) {
            $file = $request->file('gambar2');
            $filenameGambar2 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/pelayanan'), $filenameGambar2);
            if (file_exists(public_path('/storage/pelayanan/' . $pelayanan->image2))) {
                unlink(public_path('/storage/pelayanan/' . $pelayanan->image2));
            }
            $pelayanan->image2 = $filenameGambar2;
        }
        if ($request->hasFile('gambar3')) {
            $file = $request->file('gambar3');
            $filenameGambar3 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/pelayanan'), $filenameGambar3);
            if (file_exists(public_path('/storage/pelayanan/' . $pelayanan->image3))) {
                unlink(public_path('/storage/pelayanan/' . $pelayanan->image3));
            }
            $pelayanan->image3 = $filenameGambar3;
        }
        if ($request->hasFile('gambar4')) {
            $file = $request->file('gambar4');
            $filenameGambar4 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/pelayanan'), $filenameGambar4);
            if (file_exists(public_path('/storage/pelayanan/' . $pelayanan->image4))) {
                unlink(public_path('/storage/pelayanan/' . $pelayanan->image4));
            }
            $pelayanan->image4 = $filenameGambar4;
        }
        if ($request->hasFile('gambar5')) {
            $file = $request->file('gambar5');
            $filenameGambar5 = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/pelayanan'), $filenameGambar5);
            if (file_exists(public_path('/storage/pelayanan/' . $pelayanan->image5))) {
                unlink(public_path('/storage/pelayanan/' . $pelayanan->image5));
            }
            $pelayanan->image5 = $filenameGambar5;
        }


        $pelayanan->name = $request->name;
        $pelayanan->slug = $request->name;
        $pelayanan->deskripsi = $request->deskripsi;
        $pelayanan->save();
        return redirect()->route('pelayanan.index')->with('success', 'Data Pelayanan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelayanan = pelayanan::find($id);
        if ($pelayanan->delete()) {
            if (file_exists(public_path('/storage/pelayanan/' . $pelayanan->image1))) {
                unlink(public_path('/storage/pelayanan/' . $pelayanan->image1));
            }
            if (file_exists(public_path('/storage/pelayanan/' . $pelayanan->image2))) {
                unlink(public_path('/storage/pelayanan/' . $pelayanan->image2));
            }
            if (file_exists(public_path('/storage/pelayanan/' . $pelayanan->image3))) {
                unlink(public_path('/storage/pelayanan/' . $pelayanan->image3));
            }
            if (file_exists(public_path('/storage/pelayanan/' . $pelayanan->image4))) {
                unlink(public_path('/storage/pelayanan/' . $pelayanan->image4));
            }
            if (file_exists(public_path('/storage/pelayanan/' . $pelayanan->image5))) {
                unlink(public_path('/storage/pelayanan/' . $pelayanan->image5));
            }
        }
        return redirect()->route('pelayanan.index')->with('success', 'Data Pelayanan Berhasil Dihapus');
    }

    public function pelayananLengkap()
    {
        $pelayanans = Pelayanan::orderBy('created_at','desc')->paginate(6);
        return view('pelayanan', compact('pelayanans'));
    }
}
