<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data slider dari database
        $sliders = Slider::all();
        // Kirim data slider ke view
        return view("admin.slider.index", compact('sliders'));
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
            "gambar" => "required|image|mimes:jpeg,png,jpg,gif",
            "judul" => "required|string",
            "urutan" => "required|integer",
            "status" => "required|in:1,2",
        ]);
        $file = $request->file('gambar');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/slider'), $filename);
        $slider = Slider::create([
            "gambar" => $filename,
            "judul" => $request->judul,
            "urutan" => $request->urutan,
            "status" => $request->status,
        ]);
        if ($slider) {
            return redirect()->route("slider.index")->with("success", "Slider berhasil ditambahkan.");
        } else {
            return redirect()->back()->with("error", "Gagal menambahkan slider.");
        }
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
        $slider = Slider::find($id);
        $request->validate([
            "judul" => "required|string",
            "urutan" => "required|integer",
            "status" => "required|in:1,2",
        ]);
        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/slider'), $filename);
            // Hapus gambar lama jika ada
            if ($slider->gambar) {
                $oldImagePath = public_path('images/slider/' . $slider->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        } else {
            $filename = $slider->gambar; // Gunakan gambar lama jika tidak ada yang diupload
        }

        $slider->update([
            "gambar" => $filename,
            "judul" => $request->judul,
            "urutan" => $request->urutan,
            "status" => $request->status,
        ]);
        if ($slider) {
            return redirect()->route("slider.index")->with("success", "Slider berhasil diubah.");
        } else {
            return redirect()->back()->with("error", "Gagal menambahkan slider.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        if ($slider->gambar) {
            $oldImagePath = public_path('images/slider/' . $slider->gambar);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $slider->delete();
        return redirect()->route("slider.index")->with("success", "Slider berhasil dihapus.");
    }
}
