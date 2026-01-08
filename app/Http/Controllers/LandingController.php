<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Rute;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        $rutes = Rute::orderBy('jam_berangkat')->get();

        return view('landing.home', compact('rutes'));
    }

    public function booking(): View
    {
        $rutes = Rute::orderBy('jam_berangkat')->get();

        return view('landing.booking', compact('rutes'));
    }

    public function storeBooking(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'rute_id' => ['required', 'exists:rutes,id'],
            'nama_pemesan' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
            'tanggal_berangkat' => ['required', 'date'],
            'jumlah_kursi' => ['required', 'integer', 'min:1'],
            'metode_pembayaran' => ['required', 'in:transfer,cash'],
        ]);

        $validated['status_pembayaran'] = 'lunas';

        $pemesanan = Pemesanan::create($validated);

        return redirect()
            ->route('booking.nota', $pemesanan)
            ->with('success', 'Pemesanan berhasil dibuat. Berikut nota booking Anda.');
    }

    public function nota(Pemesanan $pemesanan): View
    {
        $pemesanan->load('rute');

        return view('landing.nota', compact('pemesanan'));
    }
}
