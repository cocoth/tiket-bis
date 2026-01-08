<?php

namespace Database\Seeders;

use App\Models\Rute;
use Illuminate\Database\Seeder;

class RuteSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_armada' => 'Bus Ekonomi A',
                'tujuan' => 'Jakarta - Bandung',
                'jam_berangkat' => '08:00:00',
                'kapasitas_kursi' => 40,
                'harga' => 75000,
                'gambar' => null,
            ],
            [
                'nama_armada' => 'Bus Eksekutif B',
                'tujuan' => 'Bandung - Yogyakarta',
                'jam_berangkat' => '20:00:00',
                'kapasitas_kursi' => 32,
                'harga' => 180000,
                'gambar' => null,
            ],
            [
                'nama_armada' => 'Bus Pariwisata C',
                'tujuan' => 'Jakarta - Surabaya',
                'jam_berangkat' => '19:30:00',
                'kapasitas_kursi' => 45,
                'harga' => 250000,
                'gambar' => null,
            ],
        ];

        foreach ($data as $rute) {
            Rute::create($rute);
        }
    }
}
