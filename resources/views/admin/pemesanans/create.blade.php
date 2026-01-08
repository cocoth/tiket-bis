@extends('layouts.admin')

@section('content')
<h4 class="mb-3">Tambah Pemesanan</h4>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.pemesanans.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label class="form-label">Rute</label>
                <select name="rute_id" class="form-select" required>
                    <option value="">-- Pilih Rute --</option>
                    @foreach($rutes as $rute)
                        <option value="{{ $rute->id }}" @selected(old('rute_id') == $rute->id)>
                            {{ $rute->nama_armada }} - {{ $rute->tujuan }} ({{ $rute->jam_berangkat }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama Pemesan</label>
                <input type="text" name="nama_pemesan" value="{{ old('nama_pemesan') }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Tanggal Berangkat</label>
                <input type="date" name="tanggal_berangkat" value="{{ old('tanggal_berangkat') }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Jumlah Kursi</label>
                <input type="number" name="jumlah_kursi" value="{{ old('jumlah_kursi', 1) }}" min="1" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Metode Pembayaran</label>
                <select name="metode_pembayaran" class="form-select" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="transfer" @selected(old('metode_pembayaran') === 'transfer')>Transfer</option>
                    <option value="cash" @selected(old('metode_pembayaran') === 'cash')>Cash</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Status Pembayaran</label>
                <select name="status_pembayaran" class="form-select" required>
                    <option value="pending" @selected(old('status_pembayaran') === 'pending')>Pending</option>
                    <option value="lunas" @selected(old('status_pembayaran') === 'lunas')>Lunas</option>
                    <option value="batal" @selected(old('status_pembayaran') === 'batal')>Batal</option>
                </select>
            </div>
            <div class="col-12 text-end">
                <a href="{{ route('admin.pemesanans.index') }}" class="btn btn-light">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
