<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view("admin.login");
    }

    public function akun()
    {
        // Ambil semua data pengguna dari database
        $users = User::all();
        // Kirim data pengguna ke view
        return view("admin.akun.index", compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "password" => "required|min:8",
            "role" => "required",
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role" => $request->role,
        ]);

        if ($user) {
            return redirect()->route("akun")->with("success", "Akun berhasil dibuat.");
        } else {
            return redirect()->back()->with("error", "Gagal membuat akun.");
        }
    }

    public function login_check(Request $request)
    {
        // Validasi input
        $request->validate([
            "username" => "required|string",
            "password" => "required|string"
        ]);

        // Coba autentikasi menggunakan username dan password
        if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            // Regenerasi sesi untuk keamanan
            $request->session()->regenerate();

            // Redirect ke dashboard jika berhasil login
            return redirect()->route("dashboard");
        }

        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->back()->withErrors([
            "error" => "Username atau Password salah."
        ])->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        // Hapus sesi pengguna
        Auth::logout();

        // Redirect ke halaman login
        return redirect()->route("login");
    }

    public function update(Request $request, $id)
    {
        // dd( $request->all());
        $user = User::findOrFail($id);
        $user = $user->update([
            "name" => $request->nameEdit,
            "email" => $request->emailEdit,
            "password" => Hash::make($request->password),
            "role" => $request->roleEdit,
        ]);
        if ($user) {
            return redirect()->route("akun")->with("success", "Akun berhasil diupdate.");
        } else {
            return redirect()->back()->with("error", "Gagal mengupdate akun.");
        }
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if(Auth::user()->id == $user->id){
            return redirect()->back()->with("error", "Tidak bisa menghapus akun sendiri.");
        }
        $destroy = $user->delete();

        if ($destroy) {
            return redirect()->route("akun")->with("success", "Akun berhasil dihapus.");
        } else {
            return redirect()->back()->with("error", "Gagal menghapus akun.");
        }
    }
}
