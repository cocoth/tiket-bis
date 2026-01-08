<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rute_id')->constrained('rutes')->cascadeOnDelete();
            $table->string('nama_pemesan');
            $table->string('no_hp');
            $table->date('tanggal_berangkat');
            $table->unsignedInteger('jumlah_kursi');
            $table->enum('metode_pembayaran', ['transfer', 'cash']);
            $table->enum('status_pembayaran', ['pending', 'lunas', 'batal'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
