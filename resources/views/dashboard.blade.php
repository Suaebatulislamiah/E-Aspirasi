@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- Header --}}
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold text-primary">Dashboard</h2>
            <p class="text-muted">Selamat datang, {{ Auth::user()->name }} 👋</p>
        </div>
    </div>

    {{-- Statistik Cards --}}
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Jumlah Masyarakat</h5>
                    <h3 class="fw-bold text-primary">{{ $masyarakatCount ?? 0 }}</h3>
                    <i class="bi bi-people fs-1 text-primary"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Jumlah Aspirasi</h5>
                    <h3 class="fw-bold text-success">{{ $aspirasiCount ?? 0 }}</h3>
                    <i class="bi bi-chat-left-text fs-1 text-success"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Dewan</h5>
                    <h3 class="fw-bold text-warning">{{ $dewanCount ?? 0 }}</h3>
                    <i class="bi bi-person-badge fs-1 text-warning"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted">Pengguna</h5>
                    <h3 class="fw-bold text-danger">{{ $userCount ?? 0 }}</h3>
                    <i class="bi bi-person-check fs-1 text-danger"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Grafik dan Data --}}
    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-primary">Statistik Aspirasi</h5>
                    <canvas id="aspirasiChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-primary">Info Cepat</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Total Aspirasi: <strong>{{ $aspirasiCount ?? 0 }}</strong></li>
                        <li class="list-group-item">Aspirasi Selesai: <strong>{{ $aspirasiDone ?? 0 }}</strong></li>
                        <li class="list-group-item">Aspirasi Pending: <strong>{{ $aspirasiPending ?? 0 }}</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ChartJS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('aspirasiChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
            datasets: [{
                label: 'Jumlah Aspirasi',
                data: [12, 19, 3, 5, 2, 3], // nanti bisa diisi dari controller
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
