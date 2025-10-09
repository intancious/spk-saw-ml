@extends('Admin.layouts.app', [
    'title' => 'Home',
    'pageTitle' => 'Home',
])

@section('content')
    <!-- Dashboard Content -->
    <div class="mb-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-fw fa-home"></i> Dashboard
            </h1>
        </div>

        @if (Auth::user()->role == 'admin')
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Selamat datang <span class="text-uppercase"><b>{{ Auth::user()->nama }}!</b></span> Anda bisa mengoperasikan
                sistem ini.
            </div>
            <div class="row">
                <!-- Admin Links -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <a href="{{ route('kriteria.index') }}"
                                            class="text-secondary text-decoration-none">Data Kriteria</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cube fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <a href="{{ route('subkriteria.index') }}"
                                            class="text-secondary text-decoration-none">Data Sub Kriteria</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cubes fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <a href="{{ route('alternatif.index') }}"
                                            class="text-secondary text-decoration-none">Data Alternatif</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <a href="{{ route('kriteria.index') }}"
                                            class="text-secondary text-decoration-none">Data Penilaian</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-edit fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <a href="{{ route('kriteria.index') }}"
                                            class="text-secondary text-decoration-none">Data Perhitungan</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calculator fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <a href="{{ route('kriteria.index') }}"
                                            class="text-secondary text-decoration-none">Data Hasil Akhir</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other Admin Sections -->
                <!-- Repeat as needed for other sections like 'Sub Kriteria', 'Alternatif', etc. -->
            </div>
        @elseif (Auth::user()->role == 'user')
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Selamat datang <span class="text-uppercase"><b>{{ Auth::user()->nama }}!</b></span> Anda bisa mengoperasikan
                sistem dengan wewenang tertentu melalui pilihan menu di bawah.
            </div>
            <div class="row">
                <!-- User Links -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <a href="#" class="text-secondary text-decoration-none">Dashboard</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-home fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <a href="#" class="text-secondary text-decoration-none">Data Hasil Akhir</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <a href="#" class="text-secondary text-decoration-none">Data Profile</a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Other User Sections -->
            </div>
        @endif
    </div>
@endsection
