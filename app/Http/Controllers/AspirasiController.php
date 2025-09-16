<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\Anggotadprd;
use App\Models\Kecamatan;
use App\Models\Desa;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    /**
     * Menampilkan daftar aspirasi.
     */
    public function index()
    {
        $aspirasis = Aspirasi::with(['kategori', 'anggotadprd', 'kecamatan', 'desa'])->latest()->get();
        return view('admin.aspirasi.index', compact('aspirasis'));
    }

    /**
     * Form tambah aspirasi.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $anggotadprds = Anggotadprd::all();
        $kecamatans = Kecamatan::all();

        return view('admin.aspirasi.create', compact('kategoris', 'anggotadprds', 'kecamatans'));
    }

    /**
     * Simpan aspirasi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:20|unique:aspirasis,nik',
            'phone'         => 'nullable|string|max:20',
            'judul'         => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategoris,id',
            'anggotadprd_id'=> 'nullable|exists:anggotadprds,id',
            'isi'           => 'required|string',
            'kecamatan_id'  => 'required|exists:kecamatans,id',
            'desa_id'       => 'required|exists:desas,id',
            'lampiran'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->all();
        $data['tanggal'] = now();

        // Upload lampiran jika ada
        if ($request->hasFile('lampiran')) {
            $data['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        // Simpan aspirasi
        Aspirasi::create($data);

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil dikirim.');
    }

    /**
     * Detail aspirasi.
     */
    public function show(Aspirasi $aspirasi)
    {
        return view('aspirasi.show', compact('aspirasi'));
    }

    /**
     * Form edit aspirasi.
     */
    public function edit(Aspirasi $aspirasi)
    {
        $kategoris = Kategori::all();
        $anggotadprds = Anggotadprd::all();
        $kecamatans = Kecamatan::all();

        return view('admin.aspirasi.edit', compact('aspirasi', 'kategoris', 'anggotadprds', 'kecamatans'));
    }

    /**
     * Update aspirasi.
     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:20|unique:aspirasis,nik,' . $aspirasi->id,
            'phone'         => 'nullable|string|max:20',
            'judul'         => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategoris,id',
            'anggotadprd_id'=> 'nullable|exists:anggotadprds,id',
            'isi'           => 'required|string',
            'kecamatan_id'  => 'required|exists:kecamatans,id',
            'desa_id'       => 'required|exists:desas,id',
            'lampiran'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('lampiran')) {
            $data['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        $aspirasi->update($data);

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil diperbarui.');
    }

    /**
     * Hapus aspirasi.
     */
    public function destroy(Aspirasi $aspirasi)
    {
        if ($aspirasi->lampiran && \Storage::disk('public')->exists($aspirasi->lampiran)) {
            \Storage::disk('public')->delete($aspirasi->lampiran);
        }

        $aspirasi->delete();

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil dihapus.');
    }
}
