<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $fillable = ['name', 'slug', 'image1', 'image2', 'image3', 'image4', 'image5', 'deskripsi'];
}
