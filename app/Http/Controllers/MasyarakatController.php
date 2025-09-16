<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return view('admin.masyarakat.index', compact('masyarakat'));
    }

    public function create()
    {
        return view('admin.masyarakat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:masyarakats',
            'email' => 'required|email|unique:masyarakats',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        Masyarakat::create($request->all());

        return redirect()->route('masyarakat.index')->with('success', 'Data masyarakat berhasil ditambahkan.');
    }

    public function edit(Masyarakat $masyarakat)
    {
        return view('admin.masyarakat.edit', compact('masyarakat'));
    }

    public function update(Request $request, Masyarakat $masyarakat)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:masyarakats,nik,' . $masyarakat->id,
            'email' => 'required|email|unique:masyarakats,email,' . $masyarakat->id,
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $masyarakat->update($request->all());

        return redirect()->route('masyarakat.index')->with('success', 'Data masyarakat berhasil diperbarui.');
    }

    public function destroy(Masyarakat $masyarakat)
    {
        $masyarakat->delete();
        return redirect()->route('masyarakat.index')->with('success', 'Data masyarakat berhasil dihapus.');
    }
}
