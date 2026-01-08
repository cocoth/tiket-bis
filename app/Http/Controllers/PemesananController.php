<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Rute;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanans = Pemesanan::with('rute')->orderByDesc('created_at')->paginate(10);

        return view('admin.pemesanans.index', compact('pemesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rutes = Rute::orderBy('nama_armada')->get();

        return view('admin.pemesanans.create', compact('rutes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rute_id' => ['required', 'exists:rutes,id'],
            'nama_pemesan' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
            'tanggal_berangkat' => ['required', 'date'],
            'jumlah_kursi' => ['required', 'integer', 'min:1'],
            'metode_pembayaran' => ['required', 'in:transfer,cash'],
            'status_pembayaran' => ['required', 'in:pending,lunas,batal'],
        ]);

        Pemesanan::create($validated);

        return redirect()->route('admin.pemesanans.index')->with('success', 'Pemesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        $pemesanan->load('rute');

        return view('admin.pemesanans.show', compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        $rutes = Rute::orderBy('nama_armada')->get();

        return view('admin.pemesanans.edit', compact('pemesanan', 'rutes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $validated = $request->validate([
            'rute_id' => ['required', 'exists:rutes,id'],
            'nama_pemesan' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
            'tanggal_berangkat' => ['required', 'date'],
            'jumlah_kursi' => ['required', 'integer', 'min:1'],
            'metode_pembayaran' => ['required', 'in:transfer,cash'],
            'status_pembayaran' => ['required', 'in:pending,lunas,batal'],
        ]);

        $pemesanan->update($validated);

        return redirect()->route('admin.pemesanans.index')->with('success', 'Pemesanan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('admin.pemesanans.index')->with('success', 'Pemesanan berhasil dihapus');
    }
}
