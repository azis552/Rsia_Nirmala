<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kritiks = KritikSaran::orderBy("created_at", "desc")->get();
        return view("admin.kritikSaran.index", compact("kritiks"));
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
        $data = $request->validate(
            [
                "name" => "required",
                "email" => "required|email",
                "no_hp" => "required",
                "message" => "required",
            ],
        );

        $kritikSaran = \App\Models\KritikSaran::create($data);
        $profil = getProfil() ;
        // Send message to Telegram
        $telegramResponse = \App\Helpers\TelegramHelper::sendKritikSaran($kritikSaran, $profil->token, $profil->chat_id_humas);

        return redirect()->back()->with("successKritik", "Kritik dan saran berhasil dikirim");
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
}
