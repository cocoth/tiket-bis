@extends('layouts.admin')

@section('content')
<h4 class="mb-3">Detail Pemesanan</h4>

<div class="card">
    <div class="card-body row">
        <div class="col-md-6">
            <h5>Data Rute</h5>
            <p>Nama Armada: {{ $pemesanan->rute->nama_armada ?? '-' }}</p>
            <p>Tujuan: {{ $pemesanan->rute->tujuan ?? '-' }}</p>
            <p>Jam Berangkat: {{ $pemesanan->rute->jam_berangkat ?? '-' }}</p>
            <p>Harga per Kursi: {{ $pemesanan->rute ? 'Rp '.number_format($pemesanan->rute->harga, 0, ',', '.') : '-' }}</p>
        </div>
        <div class="col-md-6">
            <h5>Data Pemesan</h5>
            <p>Nama Pemesan: {{ $pemesanan->nama_pemesan }}</p>
            <p>No HP: {{ $pemesanan->no_hp }}</p>
            <p>Tanggal Berangkat: {{ $pemesanan->tanggal_berangkat }}</p>
            <p>Jumlah Kursi: {{ $pemesanan->jumlah_kursi }}</p>
            <p>Metode Pembayaran: {{ ucfirst($pemesanan->metode_pembayaran) }}</p>
            <p>Status Pembayaran: {{ ucfirst($pemesanan->status_pembayaran) }}</p>
        </div>
    </div>
</div>
@endsection
