@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Desa</h2>
    <form action="{{ route('desa.update', $desa->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Desa</label>
            <input type="text" name="nama_desa" class="form-control" value="{{ $desa->nama_desa }}" required>
        </div>
        <div class="mb-3">
            <label>Kecamatan</label>
            <select name="kecamatan_id" class="form-control" required>
                @foreach($kecamatans as $kec)
                    <option value="{{ $kec->id }}" {{ $desa->kecamatan_id == $kec->id ? 'selected' : '' }}>
                        {{ $kec->nama_kecamatan }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('desa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
