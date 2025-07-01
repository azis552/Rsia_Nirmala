<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rujukan extends Model
{
    protected $fillable = [
        'rujukan_id',
        'nama',
        'nik',
        'No_Rujukan',
        'perujuk',
        'profesi',
        'subjek',
        'objek',
        'suhu',
        'tensi',
        'berat',
        'tinggi',
        'RR',
        'nadi',
        'SpO2',
        'GCS',
        'Kesadaran',
        'LP',
        'Alergi',
        'Asesmen',
        'Plan',
        'Instruksi',
        'Evaluasi',
        'Keterangan',
        'Berkas',
        'status',
        'faskes_id',
        'admin_id',
    ];

    public function faskes()
    {
        return $this->belongsTo(User::class, 'faskes_id');
    }

}
