@extends('layouts.admin')

@section('content')
<div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
    <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-14">Manajemen Pemesanan</h2>
    <div class="flex-shrink-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-end mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pemesanan</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Data Pemesanan</h5>
        <a href="{{ route('admin.pemesanans.create') }}" class="btn btn-primary btn-sm">Tambah Pemesanan</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-nowrap table-striped table-bordered align-middle mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Rute</th>
                    <th>Nama Pemesan</th>
                    <th>No HP</th>
                    <th>Tanggal Berangkat</th>
                    <th>Jumlah Kursi</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pemesanans as $pemesanan)
                    @php
                        $badgeClass = 'bg-secondary-subtle text-secondary';
                        if ($pemesanan->status_pembayaran === 'lunas') {
                            $badgeClass = 'bg-success-subtle text-success';
                        } elseif ($pemesanan->status_pembayaran === 'pending') {
                            $badgeClass = 'bg-warning-subtle text-warning';
                        } elseif ($pemesanan->status_pembayaran === 'batal') {
                            $badgeClass = 'bg-danger-subtle text-danger';
                        }
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pemesanan->rute->nama_armada ?? '-' }}</td>
                        <td>{{ $pemesanan->nama_pemesan }}</td>
                        <td>{{ $pemesanan->no_hp }}</td>
                        <td>{{ $pemesanan->tanggal_berangkat }}</td>
                        <td>{{ $pemesanan->jumlah_kursi }}</td>
                        <td>{{ ucfirst($pemesanan->metode_pembayaran) }}</td>
                        <td><span class="badge {{ $badgeClass }}">{{ ucfirst($pemesanan->status_pembayaran) }}</span></td>
                        <td>
                            <a href="{{ route('admin.pemesanans.edit', $pemesanan) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('admin.pemesanans.show', $pemesanan) }}" class="btn btn-sm btn-secondary">Detail</a>
                            <form action="{{ route('admin.pemesanans.destroy', $pemesanan) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data pemesanan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Belum ada data pemesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>

        <div class="mt-3">
            {{ $pemesanans->links() }}
        </div>
    </div>
</div>
@endsection
