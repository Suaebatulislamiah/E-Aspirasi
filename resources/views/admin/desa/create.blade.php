@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Desa</h2>
    <form action="{{ route('desa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Desa</label>
            <input type="text" name="nama_desa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kecamatan</label>
            <select name="kecamatan_id" class="form-control" required>
                <option value="">-- Pilih Kecamatan --</option>
                @foreach($kecamatans as $kec)
                    <option value="{{ $kec->id }}">{{ $kec->nama_kecamatan }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('desa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
