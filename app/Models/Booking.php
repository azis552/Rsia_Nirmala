<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'jenis_pasien',
        'dokter_id',
        'poliklinik_id',
        'nik',
        'nama',
        'no_hp',
        'tanggal_booking',
        'jadwal_dokter_id',
        'no_antrian',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(JadwalDokter::class, 'jadwal_dokter_id','id');
    }
}
