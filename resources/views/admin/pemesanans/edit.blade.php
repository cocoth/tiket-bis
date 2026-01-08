@extends('layouts.admin')

@section('content')
<h4 class="mb-3">Edit Pemesanan</h4>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.pemesanans.update', $pemesanan) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label class="form-label">Rute</label>
                <select name="rute_id" class="form-select" required>
                    @foreach($rutes as $rute)
                        <option value="{{ $rute->id }}" @selected(old('rute_id', $pemesanan->rute_id) == $rute->id)>
                            {{ $rute->nama_armada }} - {{ $rute->tujuan }} ({{ $rute->jam_berangkat }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama Pemesan</label>
                <input type="text" name="nama_pemesan" value="{{ old('nama_pemesan', $pemesanan->nama_pemesan) }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $pemesanan->no_hp) }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Tanggal Berangkat</label>
                <input type="date" name="tanggal_berangkat" value="{{ old('tanggal_berangkat', $pemesanan->tanggal_berangkat) }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Jumlah Kursi</label>
                <input type="number" name="jumlah_kursi" value="{{ old('jumlah_kursi', $pemesanan->jumlah_kursi) }}" min="1" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Metode Pembayaran</label>
                <select name="metode_pembayaran" class="form-select" required>
                    <option value="transfer" @selected(old('metode_pembayaran', $pemesanan->metode_pembayaran) === 'transfer')>Transfer</option>
                    <option value="cash" @selected(old('metode_pembayaran', $pemesanan->metode_pembayaran) === 'cash')>Cash</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Status Pembayaran</label>
                <select name="status_pembayaran" class="form-select" required>
                    <option value="pending" @selected(old('status_pembayaran', $pemesanan->status_pembayaran) === 'pending')>Pending</option>
                    <option value="lunas" @selected(old('status_pembayaran', $pemesanan->status_pembayaran) === 'lunas')>Lunas</option>
                    <option value="batal" @selected(old('status_pembayaran', $pemesanan->status_pembayaran) === 'batal')>Batal</option>
                </select>
            </div>
            <div class="col-12 text-end">
                <a href="{{ route('admin.pemesanans.index') }}" class="btn btn-light">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
