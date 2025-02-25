@extends('layouts.app')

@section('content')
    <div class="row">

        <!-- Total KK -->
        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="me-3 bgl-primary text-primary">
                            <i class="fas fa-users"></i> <!-- Ikon Total KK -->
                        </span>
                        <div class="media-body">
                            <p class="mb-1">Total KK</p>
                            <h4 class="mb-0">{{$totalKK}}</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Umat Katolik -->
        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="me-3 bgl-warning text-warning">
                            <i class="fas fa-cross"></i> <!-- Ikon Umat Katolik -->
                        </span>
                        <div class="media-body">
                            <p class="mb-1">Total Umat Katolik</p>
                            <h4 class="mb-0">{{$totalUser}}</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total RT -->
        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="me-3 bgl-danger text-danger">
                            <i class="fas fa-home"></i> <!-- Ikon Total RT -->
                        </span>
                        <div class="media-body">
                            <p class="mb-1">Total RT / RW</p>
                            <h4 class="mb-0">{{$totalRT}} / {{$totalRW}}</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total KUB -->
        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="me-3 bgl-success text-success">
                            <i class="fas fa-church"></i> <!-- Ikon Total KUB -->
                        </span>
                        <div class="media-body">
                            <p class="mb-1">Total KUB</p>
                            <h4 class="mb-0">{{$totalKub}}</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        <!-- Diagram Donat: Jenis Kelamin -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Distribusi Jenis Kelamin</h4>
                </div>
                <div class="card-body">
                    <canvas id="genderChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Diagram Donat: Kelompok Usia -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Distribusi Usia</h4>
                </div>
                <div class="card-body">
                    <canvas id="ageChart"></canvas>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Diagram Donat: Jenis Kelamin
        const genderCtx = document.getElementById('genderChart').getContext('2d');
        new Chart(genderCtx, {
            type: 'doughnut',
            data: {
                labels: ['Pria', 'Wanita'],
                datasets: [{
                    data: [{{ $totalPria }}, {{ $totalWanita }}],
                    backgroundColor: ['#3498db', '#e74c3c'],
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Distribusi Jenis Kelamin'
                    }
                }
            }
        });

        // Diagram Donat: Kelompok Usia
        const ageCtx = document.getElementById('ageChart').getContext('2d');
        new Chart(ageCtx, {
            type: 'doughnut',
            data: {
                labels: ['Anak (0-12)', 'Remaja (13-25)', 'Dewasa (26-45)', 'Lansia (>45)'],
                datasets: [{
                    data: [{{ $usiaAnak }}, {{ $usiaRemaja }}, {{ $usiaDewasa }}, {{ $usiaLansia }}],
                    backgroundColor: ['#1abc9c', '#f39c12', '#9b59b6', '#2ecc71'],
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Distribusi Usia'
                    }
                }
            }
        });
    </script>
@endpush
