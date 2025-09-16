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
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:Ketua,Wakil Ketua,Anggota',
            'komisi' => 'required|in:Komisi I,Komisi II,Komisi III,Komisi IV,Komisi V',
        ]);

        Anggotadprd::create($request->all());

        return redirect()->route('anggotadprd.index')->with('success', 'Anggota DPRD berhasil ditambahkan.');
    }

    public function edit(Anggotadprd $anggotadprd)
    {
        return view('admin.anggotadprd.edit', compact('anggotadprd'));
    }

    public function update(Request $request, Anggotadprd $anggotadprd)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:Ketua,Wakil Ketua,Anggota',
            'komisi' => 'required|in:Komisi I,Komisi II,Komisi III,Komisi IV,Komisi V',
        ]);

        $anggotadprd->update($request->all());

        return redirect()->route('anggotadprd.index')->with('success', 'Anggota DPRD berhasil diperbarui.');
    }

    public function destroy(Anggotadprd $anggotadprd)
    {
        $anggotadprd->delete();
        return redirect()->route('anggotadprd.index')->with('success', 'Anggota DPRD berhasil dihapus.');
    }
}
