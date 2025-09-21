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

class AspirasiController extends Controller
{
    // ============================
    // ADMIN
    // ============================

    // 🔹 Index Admin (lihat semua aspirasi)
    public function adminIndex()
    {
        $aspirasis = Aspirasi::with(['kategori', 'anggotadprd', 'kecamatan', 'desa'])
            ->latest()
            ->get();

        return view('admin.aspirasi.index', compact('aspirasis'));
    }

    // 🔹 Form create admin
    public function createAdmin()
    {
        $kategoris = Kategori::all();
        $anggotadprds = Anggotadprd::all();
        $kecamatans = Kecamatan::all();

        return view('admin.aspirasi.create', compact('kategoris', 'anggotadprds', 'kecamatans'));
    }

    // 🔹 Show detail aspirasi (Admin)
    public function show(Aspirasi $aspirasi)
    {
        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    // 🔹 Edit aspirasi (Admin)
    public function edit(Aspirasi $aspirasi)
    {
        $kategoris = Kategori::all();
        $anggotadprds = Anggotadprd::all();
        $kecamatans = Kecamatan::all();

        return view('admin.aspirasi.edit', compact('aspirasi', 'kategoris', 'anggotadprds', 'kecamatans'));
    }

    // 🔹 Update aspirasi (Admin)
    public function update(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:20',
            'phone'         => 'nullable|string|max:20',
            'judul'         => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategoris,id',
            'anggotadprd_id'=> 'required|exists:anggotadprds,id',
            'isi'           => 'required|string',
            'kecamatan_id'  => 'required|exists:kecamatans,id',
            'desa_id'       => 'required|exists:desas,id',
            'lampiran'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('lampiran')) {
            if ($aspirasi->lampiran && Storage::disk('public')->exists($aspirasi->lampiran)) {
                Storage::disk('public')->delete($aspirasi->lampiran);
            }
            $data['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        $aspirasi->update($data);

        return redirect()->route('admin.aspirasi.index')
                         ->with('success', 'Aspirasi berhasil diperbarui.');
    }

    // 🔹 Hapus aspirasi (Admin)
    public function destroy(Aspirasi $aspirasi)
    {
        if ($aspirasi->lampiran && Storage::disk('public')->exists($aspirasi->lampiran)) {
            Storage::disk('public')->delete($aspirasi->lampiran);
        }

        $aspirasi->delete();

        return redirect()->route('admin.aspirasi.index')
                         ->with('success', 'Aspirasi berhasil dihapus.');
    }

    // 🔹 Tanggapan Admin
    public function tanggapan(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'tanggapan' => 'required|string',
        ]);

        $aspirasi->tanggapan = $request->tanggapan;
        $aspirasi->status = 'ditanggapi';
        $aspirasi->save();

        return redirect()->route('admin.aspirasi.show', $aspirasi->id)
                         ->with('success', 'Tanggapan berhasil dikirim.');
    }

    // ============================
    // MASYARAKAT
    // ============================

    // 🔹 Index Masyarakat (lihat aspirasi miliknya)
    public function masyarakatIndex()
    {
        $aspirasis = Aspirasi::with(['kategori', 'anggotadprd', 'kecamatan', 'desa'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('masyarakat.aspirasi.index', compact('aspirasis'));
    }

    // 🔹 Form create masyarakat
    public function createMasyarakat()
    {
        $kategoris = Kategori::all();
        $anggotadprds = Anggotadprd::all();
        $kecamatans = Kecamatan::all();

        return view('masyarakat.aspirasi.create', compact('kategoris', 'anggotadprds', 'kecamatans'));
    }

    // 🔹 Store aspirasi masyarakat
    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:20',
            'phone'         => 'nullable|string|max:20',
            'judul'         => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategoris,id',
            'anggotadprd_id'=> 'required|exists:anggotadprds,id',
            'isi'           => 'required|string',
            'kecamatan_id'  => 'required|exists:kecamatans,id',
            'desa_id'       => 'required|exists:desas,id',
            'lampiran'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->all();
        $data['tanggal'] = now();
        $data['status'] = 'baru';
        $data['user_id'] = Auth::id();

        if ($request->hasFile('lampiran')) {
            $data['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        Aspirasi::create($data);

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.aspirasi.index')->with('success', 'Aspirasi berhasil dikirim.');
        } else {
            return redirect()->route('masyarakat.aspirasi.index')->with('success', 'Aspirasi berhasil dikirim.');
        }
    }

    // 🔹 Show detail aspirasi masyarakat
    public function showMasyarakat(Aspirasi $aspirasi)
    {
        if ($aspirasi->user_id !== Auth::id()) {
            abort(403, 'Anda tidak boleh melihat aspirasi orang lain');
        }

        return view('masyarakat.aspirasi.show', compact('aspirasi'));
    }

    // 🔹 Edit aspirasi masyarakat
    public function editMasyarakat(Aspirasi $aspirasi)
    {
        if ($aspirasi->user_id !== Auth::id()) {
            abort(403, 'Tidak bisa edit aspirasi orang lain');
        }

        $kategoris = Kategori::all();
        $anggotadprds = Anggotadprd::all();
        $kecamatans = Kecamatan::all();

        return view('masyarakat.aspirasi.edit', compact('aspirasi', 'kategoris', 'anggotadprds', 'kecamatans'));
    }

    // 🔹 Update aspirasi masyarakat
    public function updateMasyarakat(Request $request, Aspirasi $aspirasi)
    {
        if ($aspirasi->user_id !== Auth::id()) {
            abort(403, 'Tidak bisa update aspirasi orang lain');
        }

        $request->validate([
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|string|max:20',
            'phone'         => 'nullable|string|max:20',
            'judul'         => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategoris,id',
            'anggotadprd_id'=> 'required|exists:anggotadprds,id',
            'isi'           => 'required|string',
            'kecamatan_id'  => 'required|exists:kecamatans,id',
            'desa_id'       => 'required|exists:desas,id',
            'lampiran'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('lampiran')) {
            if ($aspirasi->lampiran && Storage::disk('public')->exists($aspirasi->lampiran)) {
                Storage::disk('public')->delete($aspirasi->lampiran);
            }
            $data['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        $aspirasi->update($data);

        return redirect()->route('masyarakat.aspirasi.index')
                         ->with('success', 'Aspirasi berhasil diperbarui.');
    }

    // 🔹 Hapus aspirasi masyarakat
    public function destroyMasyarakat(Aspirasi $aspirasi)
    {
        if ($aspirasi->user_id !== Auth::id()) {
            abort(403, 'Tidak bisa hapus aspirasi orang lain');
        }

        if ($aspirasi->lampiran && Storage::disk('public')->exists($aspirasi->lampiran)) {
            Storage::disk('public')->delete($aspirasi->lampiran);
        }

        $aspirasi->delete();

        return redirect()->route('masyarakat.aspirasi.index')
                         ->with('success', 'Aspirasi berhasil dihapus.');
    }
}
