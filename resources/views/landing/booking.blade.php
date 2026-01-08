@extends('layouts.landing')

@section('content')
    {{-- <nav>
      <div class="nav__header">
        <div class="nav__logo">
          <a href="{{ route('landing.home') }}#home" class="logo">BusTraveller</a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="{{ route('landing.home') }}#home">HOME</a></li>
        <li><a href="{{ route('landing.home') }}#routes">ROUTES</a></li>
        <li><a href="{{ route('booking.form') }}">BOOKING</a></li>
        <li><a href="{{ route('landing.home') }}#contact">CONTACT</a></li>
      </ul>
      <div class="nav__btns">
        <a href="{{ route('booking.form') }}" class="btn">BOOK TRIP</a>
      </div>
    </nav> --}}

    <section class="container w-full flex justify-center items-center">
        <div
            class="w-full max-w-xl bg-white/90 rounded-2xl shadow-[0_18px_45px_rgba(15,23,42,0.08)] border border-slate-200 px-6 py-6 md:px-8 md:py-7">
            <div class="mb-5">
                <p class="text-xs font-semibold tracking-[0.25em] text-amber-500 mb-1 uppercase">Step 1 • Isi Detail
                    Perjalanan</p>
                <h4 class="text-2xl font-semibold text-slate-900 mb-1">Booking Tiket Bus</h4>
                <p class="text-sm text-slate-600">
                    Pilih rute, isi data penumpang, lalu konfirmasi. Nota pemesanan akan ditampilkan setelah booking
                    berhasil.
                </p>
            </div>

            @if (session('success'))
                <div class="mb-4 rounded-xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 rounded-xl border border-rose-100 bg-rose-50 px-4 py-3 text-sm text-rose-800">
                    <p class="font-medium mb-1">Periksa kembali isian kamu:</p>
                    <ul class="list-disc pl-4 space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('booking.store') }}" method="POST" class="space-y-4">
                @csrf

                <div class="space-y-1">
                    <label for="rute_id" class="block text-sm font-medium text-slate-800">Pilih Rute</label>
                    <select id="rute_id" name="rute_id" required
                        class="block w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 shadow-sm focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-400/70">
                        <option value="">-- Pilih Rute --</option>
                        @foreach ($rutes as $rute)
                            <option value="{{ $rute->id }}" @selected(old('rute_id') == $rute->id)>
                                {{ $rute->nama_armada }} - {{ $rute->tujuan }} ({{ $rute->jam_berangkat }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label for="nama_pemesan" class="block text-sm font-medium text-slate-800">Nama Pemesan</label>
                        <input id="nama_pemesan" type="text" name="nama_pemesan" placeholder="Nama lengkap"
                            value="{{ old('nama_pemesan') }}" required
                            class="block w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 shadow-sm placeholder:text-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-400/70">
                    </div>

                    <div class="space-y-1">
                        <label for="no_hp" class="block text-sm font-medium text-slate-800">No HP</label>
                        <input id="no_hp" type="text" name="no_hp" placeholder="08xx xxx xxx"
                            value="{{ old('no_hp') }}" required
                            class="block w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 shadow-sm placeholder:text-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-400/70">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label for="tanggal_berangkat" class="block text-sm font-medium text-slate-800">Tanggal
                            Berangkat</label>
                        <input id="tanggal_berangkat" type="date" name="tanggal_berangkat"
                            value="{{ old('tanggal_berangkat') }}" required
                            class="block w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 shadow-sm focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-400/70">
                    </div>

                    <div class="space-y-1">
                        <label for="jumlah_kursi" class="block text-sm font-medium text-slate-800">Jumlah Kursi</label>
                        <input id="jumlah_kursi" type="number" name="jumlah_kursi" min="1"
                            placeholder="Jumlah kursi" value="{{ old('jumlah_kursi', 1) }}" required
                            class="block w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 shadow-sm placeholder:text-slate-400 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-400/70">
                    </div>
                </div>

                <div class="space-y-1">
                    <label for="metode_pembayaran" class="block text-sm font-medium text-slate-800">Metode
                        Pembayaran</label>
                    <select id="metode_pembayaran" name="metode_pembayaran" required
                        class="block w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-900 shadow-sm focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-400/70">
                        <option value="">-- Metode Pembayaran --</option>
                        <option value="transfer" @selected(old('metode_pembayaran') === 'transfer')>Transfer (Rekening)</option>
                        <option value="cash" @selected(old('metode_pembayaran') === 'cash')>Cash (Bayar di Loket)</option>
                    </select>
                    <p class="text-[11px] text-slate-500">Detail pembayaran akan ditampilkan di nota setelah booking
                        berhasil.</p>
                </div>

                <div class="pt-2 flex items-center justify-between gap-3 flex-wrap">
                    <p class="text-[11px] text-slate-500">Dengan menekan tombol di bawah, kamu menyetujui ketentuan
                        perjalanan BusTraveller.</p>
                    <button type="submit"
                        class="btn mt-0! px-6 py-2.5 text-sm font-semibold bg-amber-500 hover:bg-amber-600 text-white rounded-full shadow-sm transition">
                        Booking Sekarang
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- <footer id="contact">
      <div class="section__container footer__container">
        <div class="footer__logo footer__col">
          <a href="{{ route('landing.home') }}#home" class="logo">BusTraveller</a>
          <p>
            Explore the world with ease and excitement through our simple bus
            ticket booking system.
          </p>
        </div>
        <div class="footer__col">
          <h4>Quick Links</h4>
          <ul class="footer__links">
            <li><a href="{{ route('landing.home') }}#home">Home</a></li>
            <li><a href="{{ route('landing.home') }}#routes">Rute</a></li>
            <li><a href="{{ route('booking.form') }}">Booking</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Contact</h4>
          <ul class="footer__links">
            <li>
              <a href="#"><span><i class="ri-phone-fill"></i></span>+62 812 3456 7890</a>
            </li>
            <li>
              <a href="#"><span><i class="ri-record-mail-line"></i></span>info@bustraveller.test</a>
            </li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Subscribe</h4>
          <form action="#">
            <input type="text" placeholder="Enter your email" />
            <button class="btn">Subscribe</button>
          </form>
        </div>
      </div>
      <div class="footer__bar">
        Copyright  a9 2025 BusTraveller. All rights reserved.
      </div>
    </footer> --}}
@endsection
