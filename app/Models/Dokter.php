<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = ['name','foto','poliklinik_id'];

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class, 'poliklinik_id','id');
    }

    public function jadwal() 
    { 
        return $this->hasMany(JadwalDokter::class); 
    } 
}
