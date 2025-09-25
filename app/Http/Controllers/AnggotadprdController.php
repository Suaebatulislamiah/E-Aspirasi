<?php

namespace App\Http\Controllers;

use App\Models\Anggotadprd;
use Illuminate\Http\Request;

class AnggotadprdController extends Controller
{
    public function index()
    {
        $anggotas = Anggotadprd::all();
        return view('admin.anggotadprd.index', compact('anggotas'));
    }

    public function create()
    {
        return view('admin.anggotadprd.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|in:Ketua DPRD,Wakil Ketua I,Wakil Ketua II,Wakil Ketua III,Anggota',
            'komisi'  => 'required|in:Komisi I,Komisi II,Komisi III,Komisi IV',
        ]);

        Anggotadprd::create($request->only(['nama', 'jabatan', 'komisi']));

        return redirect()->route('anggotadprd.index')
                         ->with('success', 'Anggota DPRD berhasil ditambahkan.');
    }

    public function edit(Anggotadprd $anggotadprd)
    {
        return view('admin.anggotadprd.edit', compact('anggotadprd'));
    }

    public function update(Request $request, Anggotadprd $anggotadprd)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|in:Ketua DPRD,Wakil Ketua I,Wakil Ketua II,Wakil Ketua III,Anggota',
            'komisi'  => 'required|in:Komisi I,Komisi II,Komisi III,Komisi IV',
        ]);

        $anggotadprd->update($request->only(['nama', 'jabatan', 'komisi']));

        return redirect()->route('anggotadprd.index')
                         ->with('success', 'Anggota DPRD berhasil diperbarui.');
    }

    public function destroy(Anggotadprd $anggotadprd)
    {
        $anggotadprd->delete();

        return redirect()->route('anggotadprd.index')
                         ->with('success', 'Anggota DPRD berhasil dihapus.');
    }
}
