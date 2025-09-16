<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
        $desas = Desa::with('kecamatan')->get();
        return view('admin.desa.index', compact('desas'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('admin.desa.create', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatans,id',
        ]);

        Desa::create($request->all());

        return redirect()->route('desa.index')->with('success', 'Desa berhasil ditambahkan.');
    }

    public function edit(Desa $desa)
    {
        $kecamatans = Kecamatan::all();
        return view('admin.desa.edit', compact('desa', 'kecamatans'));
    }

    public function update(Request $request, Desa $desa)
    {
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatans,id',
        ]);

        $desa->update($request->all());

        return redirect()->route('desa.index')->with('success', 'Desa berhasil diperbarui.');
    }

    public function destroy(Desa $desa)
    {
        $desa->delete();
        return redirect()->route('desa.index')->with('success', 'Desa berhasil dihapus.');
    }
}
