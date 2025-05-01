<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    protected $fillable = ['name', 'slug', 'image1','nama_dokter', 'gambar_dokter', 'deskripsi'];

    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'poliklinik');
    }
}
