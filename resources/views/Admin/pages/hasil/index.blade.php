@extends('Admin.layouts.app', ['title' => 'Hasil Akhir'])

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Hasil Akhir Perankingan</h1>

        @isset($periodeAktif)
            <a href="{{ route('hasil.show', $periodeAktif->id_periode) }}?cetak=1" target="_blank" class="btn btn-primary">
                <i class="fa fa-print"></i> Cetak Data
            </a>
        @endisset
    </div>

    <!-- Pilih Periode -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold"><i class="fa fa-calendar"></i> Pilih Periode</h6>
        </div>
        <div class="card-body">
            <div class="btn-group" role="group">
                @foreach ($periodes as $p)
                    <a href="{{ route('hasil.show', $p->id_periode) }}"
                        class="btn {{ isset($periodeAktif) && $periodeAktif->id_periode == $p->id_periode ? 'btn-primary' : 'btn-outline-primary' }}">
                        {{ $p->nama_periode }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @if (isset($periodeAktif))
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold"><i class="fa fa-table"></i>
                    Hasil Akhir - {{ $periodeAktif->nama_periode }}
                </h6>
            </div>
            <div class="card-body">
                @if ($hasil->isEmpty())
                    <div class="alert alert-info text-center">
                        Tidak ada data hasil untuk periode ini.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class="bg-primary text-white text-center">
                                <tr>
                                    <th>Nama Alternatif</th>
                                    <th>Nilai</th>
                                    <th>Rank</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($hasil as $rank => $data)
                                    <tr>
                                        <td class="text-left">{{ $data->alternatif->nama ?? '-' }}</td>
                                        <td>
                                            {{ fmod($data->nilai, 1) == 0 ? (int) $data->nilai : number_format($data->nilai, 2, '.', '') }}
                                        </td>
                                        <td>{{ $rank + 1 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection
