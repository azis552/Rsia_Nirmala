<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil = Profil::first();
        return view('admin.profil.index', compact('profil'));
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
        // dd($request->all());
        $profil = Profil::first();
        $request->validate([
            'perusahaan' => 'required',
            'tentang' => 'required',
            'alamat' => 'required',
            'telepondarurat' => 'required',
            'teleponpendaftaran' => 'required',
            'teleponwa' => 'required',
            'email' => 'required|email',
            'instagram' => 'nullable',
            'facebook' => 'nullable',
            'X' => 'nullable',
            'tiktok' => 'nullable',
            'youtube' => 'nullable',
            'maps' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'direktur' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_direktur' => 'nullable',
            'susunan_organisasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visi' => 'nullable',
            'misi' => 'nullable',
            'motto' => 'nullable',
        ]);
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filenameLogo = time().rand(1000,2999) .'.'. $logo->getClientOriginalExtension();
            $logo->move(public_path('images'), $filenameLogo);
            if($profil->logo != null) {
                unlink(public_path('images/' . $profil->logo));
            }
        } else {
            $filenameLogo = $profil->logo;
        }
        if ($request->hasFile('direktur')) {
            $direktur = $request->file('direktur');
            $filenameDirektur = time().rand(3000,5999) .'.'. $direktur->getClientOriginalExtension();
            $direktur->move(public_path('images'), $filenameDirektur);
            if($profil->direktur) {
                unlink(public_path('images/' . $profil->direktur));
            }
        } else {
            $filenameDirektur = $profil->direktur;
        }
        if ($request->hasFile('susunan_organisasi')) {
            $susunan_organisasi = $request->file('susunan_organisasi');
            $filenameSusunan_organisasi = time().rand(6000,9999) .'.'. $susunan_organisasi->getClientOriginalExtension();
            $susunan_organisasi->move(public_path('images'), $filenameSusunan_organisasi);
            if($profil->susunan_organisasi) {
                unlink(public_path('images/' . $profil->susunan_organisasi));
            }
        } else {
            $filenameSusunan_organisasi = $profil->susunan_organisasi;
        }
        $profil->update(
            [
                'perusahaan' => $request->perusahaan,
                'tentang' => $request->tentang,
                'alamat' => $request->alamat,
                'telepondarurat' => $request->telepondarurat,
                'teleponpendaftaran' => $request->teleponpendaftaran,
                'teleponwa' => $request->teleponwa,
                'email' => $request->email,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'X' => $request->X,
                'tiktok' => $request->tiktok,
                'youtube' => $request->youtube,
                'maps' => $request->maps,
                'logo' => $filenameLogo,
                'direktur' => $filenameDirektur,
                'nama_direktur' => $request->nama_direktur,
                'susunan_organisasi' => $filenameSusunan_organisasi,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'motto' => $request->motto,
            ]
        );

        return redirect()->route('profil.index')->with('success','Profil berhasil diubah');

        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profilLengkap()
    {
        $profil = Profil::first();
        return view('profil', compact('profil'));
    }
}
