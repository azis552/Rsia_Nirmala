<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view("admin.promotion.index", compact("promotions"));
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
        // Validasi input
        $request->validate([
            "title"=> "required",
            "gambar"=> "required",

        ]);
        // Proses upload gambar
        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/promotion'), $imageName);

        // Simpan data ke database
        $promotion = Promotion::create([
            'title' => $request->title,
            'image' => $imageName,
        ]);
        return redirect()->route('promotion.index')->with('success','Promotion berhasil ditambahkan');
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "titleEdit"=> "required",
            "gambar"=> "required",
        ]);
        // Proses upload gambar
        if ($request->hasFile("gambar")) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/promotion'), $imageName);
            // Hapus gambar lama jika ada
            $promotion = Promotion::find($id);
            if ($promotion->image && file_exists(public_path('storage/promotion/' . $promotion->image))) {
                unlink(public_path('storage/promotion/' . $promotion->image));
            }
        } else {
            $promotion = Promotion::find($id);
            $imageName = $promotion->image;
        }

        // Simpan data ke database
        $promotion = Promotion::find($id);
        $promotion->update([
            'title' => $request->titleEdit,
            'image' => $imageName,
        ]);
        return redirect()->route('promotion.index')->with('success','Promotion berhasil diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = Promotion::find($id);
        if ($promotion) {
            if ($promotion->image && file_exists(public_path('storage/promotion/' . $promotion->image))) {
                unlink(public_path('storage/promotion/' . $promotion->image));
            }
            $promotion->delete();
        }
        return redirect()->route('promotion.index')->with('success','Promotion berhasil dihapus');
    }

    public function promotionLengkap()
    {
        $promotions = Promotion::orderBy('created_at', 'desc')->paginate(6);
        return view('promo', compact('promotions'));
    }
}
