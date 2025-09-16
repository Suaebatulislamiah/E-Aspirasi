@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Anggota DPRD</h2>
    <a href="{{ route('anggotadprd.create') }}" class="btn btn-primary mb-3">Tambah Anggota</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Komisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggotas as $i => $a)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->jabatan }}</td>
                    <td>{{ $a->komisi }}</td>
                    <td>
                        <a href="{{ route('anggotadprd.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('anggotadprd.destroy', $a->id) }}" method="POST" style="display:inline;">
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
