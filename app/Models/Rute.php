<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rute extends Model
{
    protected $fillable = [
        'nama_armada',
        'tujuan',
        'jam_berangkat',
        'kapasitas_kursi',
        'harga',
        'gambar',
    ];

    public function pemesanans(): HasMany
    {
        return $this->hasMany(Pemesanan::class);
    }
}
