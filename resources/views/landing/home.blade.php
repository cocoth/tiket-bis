@extends('layouts.landing')

@push('style')
    <link rel="stylesheet" href="{{ asset('BusTraveller-1.0.0/BusTraveller-1.0.0/style.css') }}" />
@endpush

@section('content')

    <header id="home">
        <div class="header__container">
            <div class="header__content">
                <p>BUS YOUR TRAVEL JOURNEY</p>
                <h1>Where Every Bus Ride Feels Magical!</h1>
                <div class="header__btns">
                    <a href="{{ route('booking.form') }}" class="btn">Book A Trip Now</a>
                </div>
            </div>
            <div class="header__image">
                <img src="{{ asset('BusTraveller-1.0.0/BusTraveller-1.0.0/img/bus.png') }}" alt="header" />
            </div>
        </div>
    </header>

    <section class="section__container destination__container" id="routes">
        <h2 class="section__header">Daftar Rute Bus</h2>
        <p class="section__description">
            Pilih rute perjalanan terbaik untuk perjalananmu.
        </p>
        <div class="destination__grid">
            @forelse($rutes as $rute)
                <div class="destination__card">
                    <img src="{{ $rute->gambar ? asset($rute->gambar) : asset('BusTraveller-1.0.0/BusTraveller-1.0.0/img/card.jpg') }}"
                        alt="{{ $rute->nama_armada }}" />
                    <div class="destination__card__details">
                        <div>
                            <h4>{{ $rute->nama_armada }}</h4>
                            <p>{{ $rute->tujuan }}</p>
                            <p>Berangkat: {{ $rute->jam_berangkat }} | Kursi: {{ $rute->kapasitas_kursi }}</p>
                            <p>Harga: Rp {{ number_format($rute->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>Belum ada data rute.</p>
            @endforelse
        </div>
    </section>


    <footer id="contact">
        <div class="section__container footer__container">
            <div class="footer__logo footer__col">
                <a href="#home" class="logo">BusTraveller</a>
                <p>
                    Explore the world with ease and excitement through our simple bus
                    ticket booking system.
                </p>
            </div>
            <div class="footer__col">
                <h4>Quick Links</h4>
                <ul class="footer__links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#routes">Rute</a></li>
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
            &copy; 2025 BusTraveller. All rights reserved.
        </div>
    </footer>
@endsection
