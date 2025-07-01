<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function index()
    {
        $angka1 = rand(1, 9);
        $angka2 = rand(1, 9);
        Session::put('captcha_result', $angka1 + $angka2);
        return view("admin.login", compact('angka1', 'angka2'));
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
            "faskes" => $request->faskes,
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
            "password" => "required|string",
            'captcha' => 'required|numeric'
        ]);
        if ((int) $request->captcha !== Session::get('captcha_result')) {
            return back()->withErrors(['error' => 'Jawaban captcha salah.']);
        }

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
        if ($request->password == null) {
            $user = $user->update([
                "name" => $request->nameEdit,
                "email" => $request->emailEdit,
                "role" => $request->roleEdit,
                "faskes" => $request->faskesEdit,
            ]);
        } else {
            $user = $user->update([
                "name" => $request->nameEdit,
                "email" => $request->emailEdit,
                "password" => Hash::make($request->password),
                "role" => $request->roleEdit,
                "faskes" => $request->faskesEdit,
            ]);
        }

        if (Auth::user()->role == "admin") {
            if ($user) {
                return redirect()->route("akun")->with("success", "Akun berhasil diupdate.");
            } else {
                return redirect()->back()->with("error", "Gagal mengupdate akun.");
            }
        } else {
            if ($user) {
                return redirect()->route("profil.show", Auth::user()->id)->with("success", "Akun berhasil diupdate.");
            } else {
                return redirect()->back()->with("error", "Gagal mengupdate akun.");
            }
        }
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (Auth::user()->id == $user->id) {
            return redirect()->back()->with("error", "Tidak bisa menghapus akun sendiri.");
        }
        $destroy = $user->delete();

        if ($destroy) {
            return redirect()->route("akun")->with("success", "Akun berhasil dihapus.");
        } else {
            return redirect()->back()->with("error", "Gagal menghapus akun.");
        }
    }

    public function pegawai()
    {
        // Ambil semua data pegawai dari database
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();
        // Kirim data pegawai ke view
        return view("admin.pegawai.index", compact('pegawai'));
    }

    public function updatePegawai(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'nik' => 'nullable|string|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'alamat' => 'required|string',
            'kota' => 'required|string',
            'provinsi' => 'required|string',
            'kode_pos' => 'nullable|string|max:10',
            'no_telepon' => 'nullable|string|max:20',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'jenis_pegawai' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:100',
            'unit_kerja' => 'nullable|string|max:100',
            'tanggal_masuk' => 'required|date',
            'bank' => 'nullable|string|max:100',
            'nomor_rekening' => 'nullable|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['_token', 'foto']);

        // Proses file foto jika ada
        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('storage/pegawai/foto/'), $filename);
            $data['foto'] = $filename;

            // Hapus foto lama jika ada
            $pegawaiLama = Pegawai::where('user_id', $id)->first();
            if ($pegawaiLama && $pegawaiLama->foto && Storage::exists('storage/pegawai/foto/' . $pegawaiLama->foto)) {
                Storage::delete('storage/pegawai/foto/' . $pegawaiLama->foto);
            }
        }

        $data['user_id'] = $id;

        DB::table('pegawais')->updateOrInsert(
            ['user_id' => $id],
            $data
        );

        return redirect()->back()->with('success', 'Data pegawai berhasil disimpan.');
    }
}
