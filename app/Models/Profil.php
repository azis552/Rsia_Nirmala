<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{

    use HasFactory;
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
        'tumbnail',
        'logo',
        'direktur',
        'nama_direktur',
        'susunan_organisasi',
        'visi',
        'misi',
        'motto',
        'chat_id_pendaftaran',
        'chat_id_humas',
        'token'
    ];
}
