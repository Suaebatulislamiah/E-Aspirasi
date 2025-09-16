@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Anggota DPRD</h2>
    <form action="{{ route('anggotadprd.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jabatan</label>
            <select name="jabatan" class="form-control" required>
                <option value="">-- Pilih Jabatan --</option>
                <option value="Ketua">Ketua</option>
                <option value="Wakil Ketua">Wakil Ketua</option>
                <option value="Anggota">Anggota</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Komisi</label>
            <select name="komisi" class="form-control" required>
                <option value="">-- Pilih Komisi --</option>
                <option value="Komisi I">Komisi I</option>
                <option value="Komisi II">Komisi II</option>
                <option value="Komisi III">Komisi III</option>
                <option value="Komisi IV">Komisi IV</option>
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('anggotadprd.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
