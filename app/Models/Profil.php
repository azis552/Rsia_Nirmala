<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profils';

    protected $fillable = [
        'perusahaan',
        'tentang',
        'alamat',
        'telepondarurat',
        'teleponpendaftaran',
        'teleponwa',
        'email',
        'instagram',
        'facebook',
        'X',
        'tiktok',
        'youtube',
        'maps',
        'logo',
        'direktur',
        'nama_direktur',
        'susunan_organisasi',
        'visi',
        'misi',
        'motto'
    ];
}
