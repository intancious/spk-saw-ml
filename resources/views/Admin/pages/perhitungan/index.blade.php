@extends('Admin.layouts.app', ['title' => 'Perhitungan'])

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Perhitungan SPK</h1>
    </div>

    <!-- Pilih Periode -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold"><i class="fa fa-calendar"></i> Pilih Periode</h6>
        </div>
        <div class="card-body">
            <div class="btn-group" role="group">
                @foreach ($periodes as $p)
                    <a href="{{ route('perhitungan.index', ['periode' => $p->id_periode]) }}"
                        class="btn {{ isset($periodeId) && $periodeId == $p->id_periode ? 'btn-primary' : 'btn-outline-primary' }}">
                        {{ $p->nama_periode }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @if (!isset($periodeId))
        <div class="alert alert-info">Pilih periode untuk menampilkan perhitungan.</div>
        @return
    @endif

    {{-- Bobot Preferensi W --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Bobot Preferensi (W)</div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="thead-light">
                    <tr>
                        @foreach ($kriterias as $krit)
                            <th>{{ $krit->kode_kriteria }}<br><small>{{ $krit->type }}</small></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        @foreach ($kriterias as $krit)
                            <td>{{ $krit->bobot }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Matrix X --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Matrix Keputusan (X) - Nilai Mentah</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="bg-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        @foreach ($kriterias as $krit)
                            <th>{{ $krit->kode_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $i => $alt)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $alt->nama }}</td>
                            @foreach ($kriterias as $krit)
                                <td class="text-center">
                                    {{ isset($matrixX[$alt->id_alternatif][$krit->id_kriteria]) ? $matrixX[$alt->id_alternatif][$krit->id_kriteria] : '-' }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Matriks R --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Matriks Ternormalisasi (R)</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="bg-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        @foreach ($kriterias as $krit)
                            <th>{{ $krit->kode_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $i => $alt)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $alt->nama }}</td>
                            @foreach ($kriterias as $krit)
                                <td class="text-center">
                                    @php
                                        $r = $matrixR[$alt->id_alternatif][$krit->id_kriteria] ?? 0;
                                    @endphp
                                    {{ fmod($r, 1) == 0 ? (int) $r : number_format($r, 2, '.', '') }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Perhitungan V --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Perhitungan (V) & Hasil</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="bg-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        <th>Rincian Perhitungan (bobot x r)</th>
                        <th>Nilai V</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $i => $alt)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $alt->nama }}</td>
                            <td>
                                @php
                                    $parts = [];
                                    foreach ($kriterias as $krit) {
                                        $r = $matrixR[$alt->id_alternatif][$krit->id_kriteria] ?? 0;

                                        // Format R agar maksimal 2 angka di belakang koma
                                        $formattedR = fmod($r, 1) == 0 ? (int) $r : number_format($r, 2, '.', '');

                                        $parts[] = '(' . $krit->bobot . ' x ' . $formattedR . ')';
                                    }
                                    echo implode(' + ', $parts);
                                @endphp
                            </td>

                            <td class="text-center">
                                @php
                                    $v = $hasilAkhir[$alt->id_alternatif] ?? 0;
                                    echo fmod($v, 1) == 0 ? (int) $v : number_format($v, 2, '.', '');
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
