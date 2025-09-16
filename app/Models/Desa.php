<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
        protected $fillable = [
        'nama_desa',
        'kecamatan_id',
    ];

    // Relasi ke Kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
                           
