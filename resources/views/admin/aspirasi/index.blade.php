@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Aspirasi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>No HP</th>
                <th>Judul Laporan</th>
                <th>Jenis Laporan</th>
                <th>Anggota DPRD</th>
                <th>Jabatan</th>
                <th>Komisi</th>
                <th>Alamat</th>
                <th>Isi Aspirasi</th>
                <th>Lampiran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aspirasis as $i => $aspirasi)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $aspirasi->nama }}</td>
                    <td>{{ $aspirasi->nik }}</td>
                    <td>{{ $aspirasi->phone }}</td>
                    <td>{{ $aspirasi->judul }}</td>
                    <td>{{ $aspirasi->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $aspirasi->anggotadprd->nama ?? '-' }}</td>
                    <td>{{ $aspirasi->anggotadprd->jabatan ?? '-' }}</td>
                    <td>{{ $aspirasi->anggotadprd->komisi ?? '-' }}</td>
                    <td>
                        {{ $aspirasi->desa->nama_desa ?? '' }},
                        {{ $aspirasi->kecamatan->nama_kecamatan ?? '' }}
                    </td>
                    <td>{{ Str::limit($aspirasi->isi, 50) }}</td>
                    <td>
                        @if($aspirasi->lampiran)
                            <a href="{{ asset('storage/'.$aspirasi->lampiran) }}" target="_blank">Lihat</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <span class="badge bg-{{ $aspirasi->status == 'baru' ? 'secondary' : ($aspirasi->status == 'terkirim' ? 'info' : ($aspirasi->status == 'ditanggapi' ? 'warning' : 'success')) }}">
                            {{ ucfirst($aspirasi->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('aspirasi.show', $aspirasi->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('aspirasi.edit', $aspirasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('aspirasi.destroy', $aspirasi->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus aspirasi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
