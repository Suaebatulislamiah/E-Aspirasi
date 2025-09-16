@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Masyarakat</h2>
    <form action="{{ route('masyarakat.update', $masyarakat->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $masyarakat->nama }}" required>
        </div>
        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ $masyarakat->nik }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $masyarakat->email }}" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $masyarakat->no_hp }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $masyarakat->alamat }}</textarea>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('masyarakat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
