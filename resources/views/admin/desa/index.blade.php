@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Desa</h2>
    <a href="{{ route('desa.create') }}" class="btn btn-primary mb-3">Tambah Desa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Desa</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($desas as $i => $desa)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $desa->nama_desa }}</td>
                    <td>{{ $desa->kecamatan->nama_kecamatan }}</td>
                    <td>
                        <a href="{{ route('desa.edit', $desa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('desa.destroy', $desa->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus desa ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
