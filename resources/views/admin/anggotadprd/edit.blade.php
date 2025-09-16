@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Anggota DPRD</h2>
    <form action="{{ route('anggotadprd.update', $anggotadprd->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $anggotadprd->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Jabatan</label>
            <select name="jabatan" class="form-control" required>
                <option value="Ketua" {{ $anggotadprd->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                <option value="Wakil Ketua" {{ $anggotadprd->jabatan == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                <option value="Anggota" {{ $anggotadprd->jabatan == 'Anggota' ? 'selected' : '' }}>Anggota</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Komisi</label>
            <select name="komisi" class="form-control" required>
                <option value="Komisi I" {{ $anggotadprd->komisi == 'Komisi I' ? 'selected' : '' }}>Komisi I</option>
                <option value="Komisi II" {{ $anggotadprd->komisi == 'Komisi II' ? 'selected' : '' }}>Komisi II</option>
                <option value="Komisi III" {{ $anggotadprd->komisi == 'Komisi III' ? 'selected' : '' }}>Komisi III</option>
                <option value="Komisi IV" {{ $anggotadprd->komisi == 'Komisi IV' ? 'selected' : '' }}>Komisi IV</option>
                <option value="Komisi V" {{ $anggotadprd->komisi == 'Komisi V' ? 'selected' : '' }}>Komisi V</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('anggotadprd.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
