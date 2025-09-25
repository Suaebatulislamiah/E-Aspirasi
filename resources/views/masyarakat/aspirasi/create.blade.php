@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Aspirasi</h2>

    <form action="{{ route('masyarakat.aspirasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label>Judul Laporan</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Laporan</label>
            <select name="kategori_id" class="form-control" required>
                <option value="">-- Pilih Jenis Laporan --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Anggota DPRD</label>
            <select name="anggotadprd_id" class="form-control" required>
                <option value="">-- Pilih Anggota DPRD --</option>
                @foreach($anggotadprds as $dprd)
                    <option value="{{ $dprd->id }}">
                        {{ $dprd->nama }} ({{ $dprd->jabatan }} - {{ $dprd->komisi }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Kecamatan</label>
                <select name="kecamatan_id" class="form-control" id="kecamatanSelect" required>
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>Desa</label>
                <select name="desa_id" class="form-control" id="desaSelect" required>
                    <option value="">-- Pilih Desa --</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label>Isi Aspirasi</label>
            <textarea name="isi" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Lampiran</label>
            <input type="file" name="lampiran" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Kirim Aspirasi</button>
        <a href="{{ route('masyarakat.aspirasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script>
document.getElementById("kecamatanSelect").addEventListener("change", function() {
    var kecamatanId = this.value;
    var desaSelect = document.getElementById("desaSelect");
    desaSelect.innerHTML = "<option value=''>-- Pilih Desa --</option>";

    if (kecamatanId) {
        fetch("/api/desa-by-kecamatan/" + kecamatanId)
            .then(response => response.json())
            .then(data => {
                data.forEach(function(desa) {
                    var opt = document.createElement("option");
                    opt.value = desa.id;
                    opt.textContent = desa.nama_desa;
                    desaSelect.appendChild(opt);
                });
            });
    }
});
</script>
@endsection