@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Kecamatan</h2>
    <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Kecamatan</label>
            <input type="text" name="nama_kecamatan" class="form-control" value="{{ $kecamatan->nama_kecamatan }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
