<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'phone',
        'judul',
        'kategori_id',
        'anggotadprd_id',
        'kecamatan_id',
        'desa_id',
        'isi',
        'lampiran',
        'tanggal',
        'status',
        'tanggapan',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function anggotadprd()
    {
        return $this->belongsTo(Anggotadprd::class, 'anggotadprd_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
