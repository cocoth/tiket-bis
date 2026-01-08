@extends('layouts.admin')

@section('content')
<h4 class="mb-3">Tambah Rute</h4>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.rutes.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label class="form-label">Nama Armada</label>
                <input type="text" name="nama_armada" value="{{ old('nama_armada') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Jam Berangkat</label>
                <input type="time" name="jam_berangkat" value="{{ old('jam_berangkat') }}" class="form-control" required>
            </div>
            <div class="col-12">
                <label class="form-label">Tujuan</label>
                <textarea name="tujuan" rows="3" class="form-control" required>{{ old('tujuan') }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">Kapasitas Kursi</label>
                <input type="number" name="kapasitas_kursi" value="{{ old('kapasitas_kursi') }}" class="form-control" min="1" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" value="{{ old('harga') }}" class="form-control" min="0" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Gambar (foto bus)</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>
            <div class="col-12 text-end">
                <a href="{{ route('admin.rutes.index') }}" class="btn btn-light">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
