<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggotadprd extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jabatan', 'komisi'];

    public function aspirasis()
    {
        return $this->hasMany(Aspirasi::class, 'anggotadprd');
    }
}
