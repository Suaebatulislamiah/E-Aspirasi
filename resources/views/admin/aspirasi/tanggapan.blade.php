@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Beri Tanggapan Aspirasi</h2>

    {{-- pesan sukses / error --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Detail aspirasi singkat --}}
    <div class="card mb-3">
        <div class="card-body">
            <h5>{{ $aspirasi->judul }}</h5>
            <p><strong>Nama:</strong> {{ $aspirasi->nama }}</p>
            <p><strong>NIK:</strong> {{ $aspirasi->nik }}</p>
            <p><strong>Isi Aspirasi:</strong> {{ $aspirasi->isi }}</p>
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ $aspirasi->status == 'baru' ? 'secondary' : ($aspirasi->status == 'ditanggapi' ? 'warning' : 'success') }}">
                    {{ ucfirst($aspirasi->status) }}
                </span>
            </p>
        </div>
    </div>

    {{-- Form tanggapan --}}
    <form action="{{ route('aspirasi.tanggapan', $aspirasi->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggapan" class="form-label">Tanggapan</label>
            <textarea name="tanggapan" id="tanggapan" class="form-control" rows="4" required>{{ old('tanggapan', $aspirasi->tanggapan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim Tanggapan</button>
        <a href="{{ route('masyarakat.aspirasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
