@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kecamatan</h2>
    <a href="{{ route('kecamatan.create') }}" class="btn btn-primary mb-3">Tambah Kecamatan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kecamatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kecamatans as $i => $kec)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $kec->nama_kecamatan }}</td>
                    <td>
                        <a href="{{ route('kecamatan.edit', $kec->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kecamatan.destroy', $kec->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus kecamatan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
