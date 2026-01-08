@extends('layouts.admin')

@section('content')
<div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
    <div class="shrink-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-end mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rute</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Data Rute</h5>
        <a href="{{ route('admin.rutes.create') }}" class="btn btn-primary btn-sm">Tambah Rute</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-nowrap table-striped table-bordered align-middle mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Armada</th>
                    <th>Tujuan</th>
                    <th>Jam Berangkat</th>
                    <th>Kapasitas</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rutes as $rute)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rute->nama_armada }}</td>
                        <td>{{ $rute->tujuan }}</td>
                        <td>{{ $rute->jam_berangkat }}</td>
                        <td>{{ $rute->kapasitas_kursi }}</td>
                        <td>Rp {{ number_format($rute->harga, 0, ',', '.') }}</td>
                        <td>
                            @if($rute->gambar)
                                <img src="{{ asset($rute->gambar) }}" alt="{{ $rute->nama_armada }}" class="img-thumbnail" style="max-width: 80px;">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.rutes.edit', $rute) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.rutes.destroy', $rute) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus rute ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data rute.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>

        <div class="mt-3">
            {{ $rutes->links() }}
        </div>
    </div>
</div>
@endsection
