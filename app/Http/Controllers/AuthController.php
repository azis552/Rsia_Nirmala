<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view("admin.login");
    }

    public function akun()
    {
        return view("admin.akun.index");
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
