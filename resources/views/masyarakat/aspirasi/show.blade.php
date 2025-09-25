@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Aspirasi</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $aspirasi->judul }}</h5>
            
            <p><strong>Nama:</strong> {{ $aspirasi->nama }}</p>
            <p><strong>NIK:</strong> {{ $aspirasi->nik }}</p>
            <p><strong>No HP:</strong> {{ $aspirasi->phone }}</p>
            
            <p><strong>Kategori:</strong> {{ $aspirasi->kategori->nama_kategori ?? '-' }}</p>
            <p><strong>Anggota DPRD:</strong> {{ $aspirasi->anggotadprd->nama ?? '-' }}</p>
            
            <p><strong>Alamat:</strong> 
                {{ $aspirasi->desa->nama_desa ?? '-' }},
                {{ $aspirasi->kecamatan->nama_kecamatan ?? '-' }}
            </p>
            
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ $aspirasi->status === 'ditanggapi' ? 'success' : 'secondary' }}">
                    {{ ucfirst($aspirasi->status) }}
                </span>
            </p>
            
            <p><strong>Tanggapan:</strong> {{ $aspirasi->tanggapan ?? '-' }}</p>
            
            <p><strong>Lampiran:</strong>
                @if($aspirasi->lampiran)
                    <a href="{{ asset('storage/'.$aspirasi->lampiran) }}" target="_blank" class="btn btn-link p-0">Lihat Lampiran</a>
                @else
                    <span>-</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('masyarakat.aspirasi.index') }}" class="btn btn-secondary mt-3">
        ← Kembali
    </a>
</div>
@endsection
