<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KritikSaran extends Model
{
    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'message',
    ];
}
