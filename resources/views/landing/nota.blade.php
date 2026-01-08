@extends('layouts.landing')

@section('content')
  <section class="min-h-screen bg-slate-50 flex items-center py-10 px-4">
    <div class="max-w-3xl mx-auto w-full">
      <div class="text-center mb-6">
        <p class="text-xs font-semibold tracking-[0.25em] text-amber-500 mb-1 uppercase">Booking berhasil</p>
        <h1 class="text-2xl md:text-3xl font-semibold text-slate-900">Nota Pemesanan Tiket Bus</h1>
        <p class="mt-2 text-sm text-slate-600">
          Terima kasih, <span class="font-semibold text-slate-900">{{ $pemesanan->nama_pemesan }}</span>. Berikut ringkasan detail perjalananmu.
        </p>
      </div>

      <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-dashed border-slate-200 bg-slate-50/80">
          <div>
            <p class="text-[11px] font-medium text-slate-500 uppercase tracking-[0.2em]">Kode Booking</p>
            <p class="text-lg font-semibold text-slate-900">#{{ str_pad($pemesanan->id, 5, '0', STR_PAD_LEFT) }}</p>
          </div>
          <div class="text-right">
            <p class="text-[11px] font-medium text-slate-500 uppercase tracking-[0.2em]">Status</p>
            @php
              $status = strtolower($pemesanan->status_pembayaran);
              $statusClass = match ($status) {
                  'lunas' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
                  'batal' => 'bg-rose-50 text-rose-700 ring-rose-200',
                  default => 'bg-amber-50 text-amber-700 ring-amber-200',
              };
            @endphp
            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 {{ $statusClass }}">
              {{ ucfirst($pemesanan->status_pembayaran) }}
            </span>
          </div>
        </div>

        <div class="px-6 py-5 md:px-8 md:py-6 grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="space-y-3">
            <p class="text-xs font-semibold tracking-[0.2em] text-slate-500 uppercase">Detail Perjalanan</p>
            <div class="space-y-1.5 text-sm">
              <div>
                <p class="text-[11px] text-slate-500 uppercase">Rute</p>
                <p class="font-semibold text-slate-900">{{ $pemesanan->rute->nama_armada }} &mdash; {{ $pemesanan->rute->tujuan }}</p>
              </div>
              <div class="flex items-center justify-between gap-4">
                <div>
                  <p class="text-[11px] text-slate-500 uppercase">Tanggal Berangkat</p>
                  <p class="text-slate-900">{{ $pemesanan->tanggal_berangkat }}</p>
                </div>
                <div>
                  <p class="text-[11px] text-slate-500 uppercase">Jam Berangkat</p>
                  <p class="text-slate-900">{{ $pemesanan->rute->jam_berangkat }}</p>
                </div>
              </div>
              <div>
                <p class="text-[11px] text-slate-500 uppercase">Jumlah Kursi</p>
                <p class="text-slate-900">{{ $pemesanan->jumlah_kursi }} kursi</p>
              </div>
            </div>
          </div>

          <div class="space-y-3">
            <p class="text-xs font-semibold tracking-[0.2em] text-slate-500 uppercase">Penumpang & Pembayaran</p>
            <div class="space-y-1.5 text-sm">
              <div>
                <p class="text-[11px] text-slate-500 uppercase">Nama Pemesan</p>
                <p class="text-slate-900 font-medium">{{ $pemesanan->nama_pemesan }}</p>
              </div>
              <div>
                <p class="text-[11px] text-slate-500 uppercase">Metode Pembayaran</p>
                <p class="text-slate-900">{{ ucfirst($pemesanan->metode_pembayaran) }}</p>
              </div>
              <div class="pt-1 border-t border-dashed border-slate-200 mt-2 flex items-start justify-between gap-4">
                <div class="text-xs text-slate-500">
                  <p>Harga per kursi</p>
                  <p class="mt-0.5 font-medium text-slate-900">Rp {{ number_format($pemesanan->rute->harga, 0, ',', '.') }}</p>
                  <p class="mt-1">x {{ $pemesanan->jumlah_kursi }} kursi</p>
                </div>
                <div class="text-right">
                  <p class="text-[11px] text-slate-500 uppercase">Total Bayar</p>
                  <p class="text-lg font-semibold text-slate-900">
                    Rp {{ number_format($pemesanan->jumlah_kursi * $pemesanan->rute->harga, 0, ',', '.') }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="px-6 py-4 md:px-8 md:py-5 bg-slate-50/60 border-t border-dashed border-slate-200 flex flex-col md:flex-row items-center justify-between gap-3">
          <p class="text-[11px] text-slate-500">
            Simpan nota ini sebagai bukti pemesanan. Tunjukkan kepada petugas saat boarding.
          </p>
          <a
            href="{{ route('landing.home') }}"
            class="inline-flex items-center justify-center rounded-full bg-amber-500 px-6 py-2 text-xs md:text-sm font-semibold text-white shadow-sm hover:bg-amber-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-400/80 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-50 transition">
            Kembali ke Beranda
          </a>
        </div>
      </div>
    </div>
  </section>
@endsection
