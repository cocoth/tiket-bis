<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemesanan extends Model
{
    protected $fillable = [
        'rute_id',
        'nama_pemesan',
        'no_hp',
        'tanggal_berangkat',
        'jumlah_kursi',
        'metode_pembayaran',
        'status_pembayaran',
    ];

    public function rute(): BelongsTo
    {
        return $this->belongsTo(Rute::class);
    }
}
