<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $fillable = ['name','kelas', 'description', 'image1', 'image2', 'image3', 'image4', 'image5'];
}
