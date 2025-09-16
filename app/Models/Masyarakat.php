<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
        protected $fillable = [
        'nama',
        'nik',
        'email',
        'no_hp',
        'alamat',
    ];
}
