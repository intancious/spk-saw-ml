@extends('Admin.layouts.app', [
    'title' => 'Data Perhitungan',
])

@section('content')
    <div class="container">
        <h3 class="mb-4">Perhitungan Periode: <strong>{{ $periode->nama_periode }}</strong></h3>
        <a href="{{ route('perhitungan.index') }}" class="btn btn-secondary mb-3">← Pilih Periode Lain</a>

        {{-- 1️⃣ Bobot Preferensi --}}
        <div class="card mb-4 shadow">
            <div class="card-header bg-primary text-white">Bobot Preferensi (W)</div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            @foreach ($kriteria as $k)
                                <th>{{ $k->kode_kriteria }} ({{ $k->type }})</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($kriteria as $k)
                                <td>{{ $k->bobot }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- 2️⃣ Matriks Keputusan (X) --}}
        <div class="card mb-4 shadow">
            <div class="card-header bg-info text-white">Matriks Keputusan (X)</div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            @foreach ($kriteria as $k)
                                <th>{{ $k->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $i => $alt)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $alt->nama }}</td>
                                @foreach ($kriteria as $k)
                                    <td>{{ $matrixX[$alt->id_alternatif][$k->id_kriteria] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- 3️⃣ Matriks Ternormalisasi (R) --}}
        <div class="card mb-4 shadow">
            <div class="card-header bg-success text-white">Matriks Ternormalisasi (R)</div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            @foreach ($kriteria as $k)
                                <th>{{ $k->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $i => $alt)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $alt->nama }}</td>
                                @foreach ($kriteria as $k)
                                    <td>{{ $matrixR[$alt->id_alternatif][$k->id_kriteria] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- 4️⃣ Perhitungan (V) --}}
        <div class="card mb-4 shadow">
            <div class="card-header bg-warning text-dark">Perhitungan (V)</div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Nilai Akhir (V)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasil as $i => $h)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $h->alternatif->nama }}</td>
                                <td>{{ number_format($h->nilai, 4) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
