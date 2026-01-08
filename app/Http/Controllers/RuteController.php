<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rutes = Rute::orderBy('jam_berangkat')->paginate(10);

        return view('admin.rutes.index', compact('rutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rutes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_armada' => ['required', 'string', 'max:255'],
            'tujuan' => ['required', 'string'],
            'jam_berangkat' => ['required'],
            'kapasitas_kursi' => ['required', 'integer', 'min:1'],
            'harga' => ['required', 'integer', 'min:0'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('uploads/rute');
            if (! is_dir($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $validated['gambar'] = 'uploads/rute/' . $filename;
        }

        Rute::create($validated);

        return redirect()->route('admin.rutes.index')->with('success', 'Rute berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rute $rute)
    {
        return view('admin.rutes.show', compact('rute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rute $rute)
    {
        return view('admin.rutes.edit', compact('rute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rute $rute)
    {
        $validated = $request->validate([
            'nama_armada' => ['required', 'string', 'max:255'],
            'tujuan' => ['required', 'string'],
            'jam_berangkat' => ['required'],
            'kapasitas_kursi' => ['required', 'integer', 'min:1'],
            'harga' => ['required', 'integer', 'min:0'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($rute->gambar && file_exists(public_path($rute->gambar))) {
                @unlink(public_path($rute->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('uploads/rute');
            if (! is_dir($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $validated['gambar'] = 'uploads/rute/' . $filename;
        }

        $rute->update($validated);

        return redirect()->route('admin.rutes.index')->with('success', 'Rute berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rute $rute)
    {
        if ($rute->gambar && file_exists(public_path($rute->gambar))) {
            @unlink(public_path($rute->gambar));
        }

        $rute->delete();

        return redirect()->route('admin.rutes.index')->with('success', 'Rute berhasil dihapus');
    }
}
