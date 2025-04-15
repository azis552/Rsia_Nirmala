<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromosiUnggulan extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];
}
