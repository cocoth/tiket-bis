<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use App\Models\Rute;
use Illuminate\Database\Seeder;

class PemesananSeeder extends Seeder
{
    public function run(): void
    {
        $rute = Rute::first();

        if (! $rute) {
            return;
        }

        Pemesanan::create([
            'rute_id' => $rute->id,
            'nama_pemesan' => 'Contoh Penumpang',
            'no_hp' => '081234567890',
            'tanggal_berangkat' => now()->addDay()->toDateString(),
            'jumlah_kursi' => 2,
            'metode_pembayaran' => 'transfer',
            'status_pembayaran' => 'lunas',
        ]);
    }
}
