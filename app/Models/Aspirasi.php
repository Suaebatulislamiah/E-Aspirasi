<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nik',
        'phone',
        'judul',
        'kategori_id',
        'anggotadprd_id',
        'isi',
        'tanggal',
        'kecamatan_id',
        'desa_id',
        'lampiran',
        'status',
        'tanggapan',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function anggotadprd()
    {
        return $this->belongsTo(Anggotadprd::class, 'anggotadprd_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
