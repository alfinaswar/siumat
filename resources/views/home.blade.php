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
                            <h4 class="mb-0">3280</h4>
                            <span class="badge badge-primary">+3.5%</span>
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
                            <h4 class="mb-0">2570</h4>
                            <span class="badge badge-warning">+3.5%</span>
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
                            <p class="mb-1">Total RT</p>
                            <h4 class="mb-0">364</h4>
                            <span class="badge badge-danger">-3.5%</span>
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
                            <h4 class="mb-0">128</h4>
                            <span class="badge badge-success">+5.2%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
