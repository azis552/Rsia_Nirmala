<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all();
        return view('admin.berita.index', compact('beritas'));
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
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a berita.');
        }
        // Validate the request
        $request->validate([
            'judul' => 'required|unique:beritas,judul',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
            'kategori' => 'required',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/berita'), $filename);
        } else {
            $filename = null;
        }

        // Save the berita
        $berita = Berita::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'slug' => $request->judul,
            'gambar' => $filename,
            'status' => $request->status,
            'kategori' => $request->kategori,
            'linkInstagram' => $request->linkInstagram,
        ]);

        if ($berita) {
            return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
        } else {
            return redirect()->route('berita.index')->with('error', 'Gagal menambahkan berita.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // Find the berita by slug
        $berita = Berita::where('slug', $slug)->firstOrFail();

        $beritalain = Berita::where('slug', '!=', $slug)
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        return view('detailBerita', compact('berita', 'beritalain'));
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
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to update a berita.');
        }
        // Validate the request
        $request->validate([
            'judul' => 'required|unique:beritas,judul,' . $id,
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
            'kategori' => 'required',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/berita'), $filename);
        } else {
            $filename = null;
        }
        // Find the berita
        $berita = Berita::findOrFail($id);
        // Update the berita
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->slug = $request->judul;
        $berita->gambar = $filename ? $filename : $berita->gambar;
        $berita->status = $request->status;
        $berita->kategori = $request->kategori;
        $berita->linkInstagram = $request->linkInstagram;
        $berita->save();

        if ($berita) {
            return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
        } else {
            return redirect()->route('berita.index')->with('error', 'Gagal memperbarui berita.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the berita
        $berita = Berita::findOrFail($id);
        // Delete the berita
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function selengkapnya()
    {
        $beritas = Berita::where('status', 'published')->orderBy('created_at', 'desc')->paginate(5);
        return view('informasipublik', compact('beritas'));
    }
}
