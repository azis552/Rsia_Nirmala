<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view("admin.partner.index", compact("partners"));
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
            "name"=> "required",
            "gambar"=> "required|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);
        $file = $request->file("gambar");
        $imageName = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
        $file->move(public_path('/storage/partner'), $imageName);
        $partner = Partner::create([
            "name"=> $request->name,
            "image"=> $imageName,
        ]);
        return redirect()->route("partner.index")->with("success", "Partner Berhasil Ditambahkan");
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
        $request->validate([
            "name"=> "required",
            "gambar"=> "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);
        if ($request->hasFile("gambar")) {
            $file = $request->file("gambar");
            $imageName = time() . rand(1, 1000) . '_' . $file->getClientOriginalName();
            $file->move(public_path('/storage/partner'), $imageName);
            $partner = Partner::findOrFail($id);
            if($partner->image != null) {
                $oldImagePath = public_path('/storage/partner/' . $partner->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $partner->update([
                "name"=> $request->name,
                "image"=> $imageName,
            ]);

        } else {
            $partner = Partner::findOrFail($id);
            $partner->update([
                "name"=> $request->name,
            ]);
        }
        return redirect()->route("partner.index")->with("success", "Partner Berhasil Diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);
        if($partner->image != null) {
            $oldImagePath = public_path('/storage/partner/' . $partner->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $partner->delete();
        }
        return redirect()->route('partner.index')->with('success','Data Partner Berhasil Dihapus');
    }
}
