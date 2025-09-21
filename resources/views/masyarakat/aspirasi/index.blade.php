@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Aspirasi Saya</h2>
   <a href="{{ route('masyarakat.aspirasi.create') }}" class="btn btn-primary mb-3">
    Tambah Aspirasi
</a>

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
                <th>Alamat</th>
                <th>Lampiran</th>
                <th>Status</th>
                <th>Tanggapan</th>
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
                    <td>
                        {{ $aspirasi->desa->nama_desa ?? '' }},
                        {{ $aspirasi->kecamatan->nama_kecamatan ?? '' }}
                    </td>
                    <td>
                        @if($aspirasi->lampiran)
                            <a href="{{ asset('storage/'.$aspirasi->lampiran) }}" target="_blank">Lihat</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <span class="badge bg-{{ $aspirasi->status == 'ditanggapi' ? 'success' : 'secondary' }}">
                            {{ ucfirst($aspirasi->status) }}
                        </span>
                    </td>
                    <td>
                        @if($aspirasi->tanggapan)
                            <strong>{{ $aspirasi->tanggapan }}</strong>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center">Belum ada aspirasi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
