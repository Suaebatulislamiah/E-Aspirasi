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
            @forelse($aspirasis as $i => $aspirasi)
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
                    <td>{{ \Illuminate\Support\Str::limit($aspirasi->isi, 50) }}</td>
                    <td>
                        @if($aspirasi->lampiran)
                            <img src="{{ asset('storage/'.$aspirasi->lampiran) }}" alt="Lampiran" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <span class="badge 
                            @if($aspirasi->status == 'baru') bg-secondary
                            @elseif($aspirasi->status == 'terkirim') bg-info
                            @elseif($aspirasi->status == 'ditanggapi') bg-warning
                            @else bg-success
                            @endif">
                            {{ ucfirst($aspirasi->status) }}
                        </span>
                    </td>
                    <td class="d-flex flex-wrap gap-1">
                        <a href="{{ route('admin.aspirasi.show', $aspirasi->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <form action="{{ route('admin.aspirasi.destroy', $aspirasi->id) }}" method="POST" onsubmit="return confirm('Yakin hapus aspirasi ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        <a href="{{ route('admin.aspirasi.show', $aspirasi->id) }}#tanggapan" class="btn btn-success btn-sm">Beri Tanggapan</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="14" class="text-center">Belum ada aspirasi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
