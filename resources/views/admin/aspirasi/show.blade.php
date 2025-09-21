@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Aspirasi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr><th>Nama</th><td>{{ $aspirasi->nama }}</td></tr>
        <tr><th>NIK</th><td>{{ $aspirasi->nik }}</td></tr>
        <tr><th>No HP</th><td>{{ $aspirasi->phone }}</td></tr>
        <tr><th>Judul</th><td>{{ $aspirasi->judul }}</td></tr>
        <tr><th>Kategori</th><td>{{ $aspirasi->kategori->nama_kategori ?? '-' }}</td></tr>
        <tr><th>Anggota DPRD</th><td>{{ $aspirasi->anggotadprd->nama ?? '-' }}</td></tr>
        <tr><th>Isi Aspirasi</th><td>{{ $aspirasi->isi }}</td></tr>
        <tr>
            <th>Lampiran</th>
            <td>
                @if($aspirasi->lampiran)
                    <a href="{{ asset('storage/'.$aspirasi->lampiran) }}" target="_blank">Lihat Lampiran</a>
                @else
                    Tidak ada lampiran
                @endif
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <span class="badge bg-{{ $aspirasi->status == 'baru' ? 'secondary' : ($aspirasi->status == 'terkirim' ? 'info' : ($aspirasi->status == 'ditanggapi' ? 'warning' : 'success')) }}">
                    {{ ucfirst($aspirasi->status) }}
                </span>
            </td>
        </tr>
        <tr>
            <th>Tanggapan</th>
            <td>{{ $aspirasi->tanggapan ?? 'Belum ada tanggapan' }}</td>
        </tr>
    </table>

    <hr id="tanggapan">
    <h4>Beri Tanggapan</h4>
    <form action="{{ route('aspirasi.tanggapan', $aspirasi->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="tanggapan" class="form-control" rows="4" required>{{ old('tanggapan', $aspirasi->tanggapan) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
    </form>

    <a href="{{ route('admin.aspirasi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
