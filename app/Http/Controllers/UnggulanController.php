<?php

namespace App\Http\Controllers;

use App\Models\Unggulan;
use Illuminate\Http\Request;

class UnggulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data unggulan dari database
        $unggulans = Unggulan::orderBy('urutan', 'asc')->get();
        // Kirim data unggulan ke view
        return view("admin.unggulan.index", compact('unggulans'));
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
        $validate = $request->validate([
            "image" => "required|image|mimes:jpeg,png,jpg,gif",
            "title" => "required|string",
            "description" => "required|string",
            "urutan" => "required|integer",
        ]);
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/unggulan'), $filename);
        // Save unggulan data to database
        $unggulan = Unggulan::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
            'urutan' => $request->urutan,
        ]);
        if ($unggulan) {
            return redirect()->route("unggulan.index")->with("success", "Unggulan berhasil ditambahkan.");
        } else {
            return redirect()->back()->with("error", "Gagal menambahkan unggulan.");
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
        // Find the unggulan by ID
        $unggulan = Unggulan::find($id);

        // Validate the request
        $request->validate([
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif",
            "title" => "required|string",
            "description" => "required|string",
            "urutan" => "required|integer",
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/unggulan'), $filename);

            // Delete the old image if it exists
            if ($unggulan->image) {
                $oldImagePath = public_path('images/unggulan/' . $unggulan->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update the unggulan with the new image
            $unggulan->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $filename,
                'urutan' => $request->urutan,
            ]);
        } else {
            // Update the unggulan without changing the image
            $unggulan->update([
                'title' => $request->title,
                'description' => $request->description,
                'urutan' => $request->urutan,
            ]);
        }
        if ($unggulan) {
            return redirect()->route("unggulan.index")->with("success", "Unggulan berhasil diperbarui.");
        } else {
            return redirect()->back()->with("error", "Gagal memperbarui unggulan.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unggulan = Unggulan::findOrFail($id);
        $unggulan->delete();
        if ($unggulan->image) {
            $oldImagePath = public_path('images/unggulan/' . $unggulan->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        return redirect()->route("unggulan.index")->with("success", "Unggulan berhasil dihapus.");
    }
}
