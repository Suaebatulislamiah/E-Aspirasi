@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Masyarakat</h2>
    <a href="{{ route('masyarakat.create') }}" class="btn btn-primary mb-3">Tambah Masyarakat</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masyarakat as $i => $data)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>
                        <a href="{{ route('masyarakat.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('masyarakat.destroy', $data->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
