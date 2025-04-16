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
        'Kategori_Rujukan',
        'Dokter_Perujuk',
        'Diagnosa',
        'Keterangan',
        'status',
        'faskes_id',
        'admin_id',
    ];

    public function faskes()
    {
        return $this->belongsTo(User::class, 'faskes_id');
    }

}
