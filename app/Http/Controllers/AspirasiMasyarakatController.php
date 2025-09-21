<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\Anggotadprd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AspirasiMasyarakatController extends Controller
{
    // INDEX (hanya aspirasi masyarakat yang login)
    public function index()
    {
        $aspirasis = Aspirasi::with(['kategori','kecamatan','desa','anggotadprd'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('masyarakat.aspirasi.index', compact('aspirasis'));
    }

    // SHOW (detail aspirasi)
    public function show(Aspirasi $aspirasi)
    {
        $this->authorizeAspirasi($aspirasi);
        return view('masyarakat.aspirasi.show', compact('aspirasi'));
    }

    // EDIT form
    public function edit(Aspirasi $aspirasi)
    {
        $this->authorizeAspirasi($aspirasi);

        $kategori   = Kategori::all();
        $kecamatan  = Kecamatan::all();
        $desa       = Desa::all();
        $dprd       = Anggotadprd::all();

        return view('masyarakat.aspirasi.edit', compact('aspirasi','kategori','kecamatan','desa','dprd'));
    }

    // UPDATE
    public function update(Request $request, Aspirasi $aspirasi)
    {
        $this->authorizeAspirasi($aspirasi);

        $request->validate([
            'judul'          => 'required|string|max:255',
            'isi'            => 'required|string',
            'kategori_id'    => 'required|exists:kategoris,id',
            'kecamatan_id'   => 'required|exists:kecamatans,id',
            'desa_id'        => 'required|exists:desas,id',
            'anggotadprd_id' => 'required|exists:anggotadprds,id',
            'lampiran'       => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->only([
            'judul','isi','kategori_id','kecamatan_id','desa_id','anggotadprd_id'
        ]);

        if ($request->hasFile('lampiran')) {
            // hapus lampiran lama jika ada
            if ($aspirasi->lampiran && Storage::disk('public')->exists($aspirasi->lampiran)) {
                Storage::disk('public')->delete($aspirasi->lampiran);
            }
            $data['lampiran'] = $request->file('lampiran')->store('lampiran','public');
        }

        $aspirasi->update($data);

        return redirect()->route('aspirasii.index')->with('success','Aspirasi berhasil diperbarui');
    }

    // DESTROY
    public function destroy(Aspirasi $aspirasi)
    {
        $this->authorizeAspirasi($aspirasi);

        if ($aspirasi->lampiran && Storage::disk('public')->exists($aspirasi->lampiran)) {
            Storage::disk('public')->delete($aspirasi->lampiran);
        }

        $aspirasi->delete();

        return redirect()->route('aspirasii.index')->with('success','Aspirasi berhasil dihapus');
    }

    // Helper untuk memastikan masyarakat hanya akses aspirasinya sendiri
    private function authorizeAspirasi(Aspirasi $aspirasi)
    {
        if ($aspirasi->user_id !== Auth::id()) {
            abort(403, 'Anda tidak berhak mengakses aspirasi ini');
        }
    }
}
