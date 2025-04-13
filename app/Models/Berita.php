<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'slug',
        'gambar',
        'status',
        'kategori',
    ];

}
