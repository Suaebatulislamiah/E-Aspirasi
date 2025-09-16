@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kategori</h2>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori as $i => $kat)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $kat->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $kat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kategori.destroy', $kat->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
