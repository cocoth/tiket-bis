<nav class="w-full h-16 border-b border-slate-100 bg-white/80 backdrop-blur">
    <div class="w-full h-full flex items-center justify-between lg:px-8">
        {{-- Brand --}}
        <a href="{{ route('landing.home') }}#home" class="text-xl font-semibold tracking-tight text-slate-900">
            BusTraveller
        </a>

        {{-- Center nav links (desktop) --}}
        <ul class="hidden md:flex items-center gap-10 text-sm font-semibold uppercase tracking-[0.25em] text-slate-900">
            <li>
                <a href="{{ route('landing.home') }}#home" class="hover:text-amber-500 transition-colors">Home</a>
            </li>
            <li>
                <a href="{{ route('landing.home') }}#routes" class="hover:text-amber-500 transition-colors">Routes</a>
            </li>
            <li>
                <a href="{{ route('booking.form') }}" class="hover:text-amber-500 transition-colors">Booking</a>
            </li>
        </ul>

        <div class="flex items-center justify-center rounded-full bg-blue-500 h-10 w-32">
            <a href="{{ route('booking.form') }}" class="text-sm font-semibold text-white">
                Book Trip
            </a>
        </div>

    </div>
</nav>
