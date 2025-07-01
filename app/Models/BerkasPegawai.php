<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BerkasPegawai extends Model
{
    protected $table = 'berkas_pegawais';
    protected $fillable = [
        'user_id',
        'berkas',
        'nama_berkas',
    ];
}
