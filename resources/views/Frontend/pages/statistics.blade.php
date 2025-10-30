@extends('Frontend.layouts.app', ['title' => 'Statistik Hero Mobile Legends'])

@section('content')
    <div class="container py-5 text-white">

        <h2 class="text-center mb-4 fw-bold">🏆 Hero Ranking Statistics</h2>

        {{-- 🔹 Filter periode --}}
        <form method="GET" action="{{ route('frontend.hasil') }}"
            class="text-center mb-4 d-flex flex-column align-items-center gap-3">

            <div>
                <label for="filter" class="me-2">Lihat hasil untuk:</label>
                <select name="filter" id="filter" class="form-select d-inline-block w-auto mx-2">
                    <option value="1" {{ $filter == '1' ? 'selected' : '' }}>1 Hari Terakhir</option>
                    <option value="3" {{ $filter == '3' ? 'selected' : '' }}>3 Hari Terakhir</option>
                    <option value="7" {{ $filter == '7' ? 'selected' : '' }}>7 Hari Terakhir</option>
                    <option value="15" {{ $filter == '15' ? 'selected' : '' }}>15 Hari Terakhir</option>
                    <option value="30" {{ $filter == '30' ? 'selected' : '' }}>30 Hari Terakhir</option>
                    <option value="periodik" {{ $filter == 'periodik' ? 'selected' : '' }}>Rentang Tanggal (Periodik)
                    </option>
                </select>
            </div>

            {{-- 🔹 Inputan rentang tanggal (muncul hanya jika periodik dipilih) --}}
            <div id="custom-range" class="{{ $filter == 'periodik' ? '' : 'd-none' }}">
                <label class="me-2">Pilih rentang tanggal:</label>
                <input type="date" name="custom_start" value="{{ $startDate ?? '' }}"
                    class="form-control d-inline-block w-auto">
                <span class="mx-2 text-info">sampai</span>
                <input type="date" name="custom_end" value="{{ $endDate ?? '' }}"
                    class="form-control d-inline-block w-auto">
                <button type="submit" class="btn btn-primary btn-sm ms-2">Terapkan</button>
                @if ($startDate || $endDate)
                    <a href="{{ route('frontend.hasil') }}" class="btn btn-outline-light btn-sm ms-2">Reset</a>
                @endif
            </div>
        </form>

        {{-- 🔹 Info periode aktif --}}
        @if ($periode)
            <p class="text-center text-info mb-4">
                Periode aktif: <strong>{{ $periode->nama_periode ?? '-' }}</strong>
                ({{ \Carbon\Carbon::parse($periode->tanggal_mulai)->format('d M Y') }} –
                {{ \Carbon\Carbon::parse($periode->tanggal_selesai)->format('d M Y') }})
            </p>
        @else
            <p class="text-center text-warning mb-4">Tidak ada periode yang cocok dengan filter.</p>
        @endif

        {{-- 🔹 Tabel hasil --}}
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle text-center">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Rank</th>
                        <th>Hero</th>
                        @foreach ($kriterias as $k)
                            <th>{{ $k->nama }}</th>
                        @endforeach
                        <th>Nilai Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hasil as $index => $h)
                        @php
                            $alt = $h->alternatif;
                            $penilaianAlt = $penilaian[$alt->id_alternatif] ?? collect();
                        @endphp
                        <tr>
                            <td>#{{ $index + 1 }}</td>
                            <td class="text-start d-flex align-items-center gap-3">
                                <img src="{{ asset('alternatif/' . $alt->foto) }}" alt="{{ $alt->nama }}"
                                    class="rounded-circle hero-img">
                                <span class="fw-semibold">{{ $alt->nama }}</span>
                            </td>

                            @foreach ($kriterias as $k)
                                @php
                                    $nilai = $penilaianAlt->firstWhere('id_kriteria', $k->id_kriteria)->nilai ?? 0;
                                    $display =
                                        fmod($nilai, 1) == 0 ? number_format($nilai, 0) : number_format($nilai, 2);
                                @endphp
                                <td>{{ $display }}</td>
                            @endforeach

                            <td class="fw-bold text-warning">
                                {{ fmod($h->nilai, 1) == 0 ? number_format($h->nilai, 0) : number_format($h->nilai, 2) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($kriterias) + 3 }}" class="text-center text-muted py-4">
                                Tidak ada data untuk periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- 🔹 Styling & Script --}}
    <style>
        body {
            background: radial-gradient(circle at top, #0f2027, #203a43, #2c5364);
            color: #eee;
            font-family: 'Poppins', sans-serif;
        }

        .hero-img {
            width: 42px;
            height: 42px;
            border: 2px solid gold;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.4);
            transition: all 0.3s ease;
        }

        .hero-img:hover {
            transform: scale(1.15);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.7);
        }

        .table thead th {
            font-weight: 600;
            text-transform: uppercase;
        }

        select.form-select,
        input[type="date"] {
            background-color: #1c2833;
            color: #fff;
            border: 1px solid #00aaff;
            border-radius: 6px;
            padding: 6px 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }

        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>

    <script>
        // Tampilkan input tanggal jika "Rentang Tanggal (Periodik)" dipilih
        document.getElementById('filter').addEventListener('change', function() {
            const rangeDiv = document.getElementById('custom-range');
            if (this.value === 'periodik') {
                rangeDiv.classList.remove('d-none');
            } else {
                rangeDiv.classList.add('d-none');
                this.form.submit(); // otomatis submit untuk filter selain periodik
            }
        });
    </script>
@endsection
