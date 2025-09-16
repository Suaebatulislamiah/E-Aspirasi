@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Masyarakat</h2>
    <form action="{{ route('masyarakat.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('masyarakat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
