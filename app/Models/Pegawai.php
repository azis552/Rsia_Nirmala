<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nip',
        'nik',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'kota',
        'provinsi',
        'kode_pos',
        'no_telepon',
        'pendidikan_terakhir',
        'jenis_pegawai',
        'jabatan',
        'unit_kerja',
        'tanggal_masuk',
        'foto',
        'bank',
        'nomor_rekening'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
