@extends('Admin.layouts.app', ['title' => 'Input Penilaian'])

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h2 class="mb-4 text-gray-800">
        <i class="fa fa-table"></i> Data Penilaian Periode {{ $periodeAktif->nama_periode }}
    </h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatifs as $i => $alt)
                            @php
                                // cek apakah alternatif ini sudah ada di periode aktif
                                $sudahDinilai = \App\Models\Penilaian::where('id_periode', $periodeAktif->id_periode)
                                    ->where('id_alternatif', $alt->id_alternatif)
                                    ->exists();
                            @endphp

                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td class="text-left">{{ $alt->nama }}</td>
                                <td>
                                    <button class="btn btn-sm {{ $sudahDinilai ? 'btn-warning' : 'btn-primary' }}"
                                        data-toggle="modal" data-target="#modalInput{{ $alt->id_alternatif }}">
                                        <i class="fa {{ $sudahDinilai ? 'fa-edit' : 'fa-pen' }}"></i>
                                        {{ $sudahDinilai ? 'Edit' : 'Input' }} Penilaian
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal Input/Edit -->
                            <div class="modal fade" id="modalInput{{ $alt->id_alternatif }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form class="form-penilaian" data-id="{{ $alt->id_alternatif }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $sudahDinilai ? 'Edit' : 'Input' }} Penilaian - {{ $alt->nama }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <input type="hidden" name="id_alternatif"
                                                    value="{{ $alt->id_alternatif }}">

                                                @foreach ($kriterias as $kr)
                                                    @php
                                                        $nilaiLama = \App\Models\Penilaian::where(
                                                            'id_periode',
                                                            $periodeAktif->id_periode,
                                                        )
                                                            ->where('id_alternatif', $alt->id_alternatif)
                                                            ->where('id_kriteria', $kr->id_kriteria)
                                                            ->value('nilai');
                                                    @endphp

                                                    <div class="form-group row align-items-center">
                                                        <label class="col-md-4 col-form-label text-left">
                                                            {{ $kr->nama }} ({{ $kr->kode_kriteria }})
                                                        </label>
                                                        <div class="col-md-8">
                                                            @if ($kr->ada_pilihan)
                                                                <select name="nilai[{{ $kr->id_kriteria }}]"
                                                                    class="form-control" required>
                                                                    <option value="">-- Pilih {{ $kr->nama }} --
                                                                    </option>
                                                                    @foreach ($kr->subKriteria as $sub)
                                                                        <option value="{{ $sub->id_sub_kriteria }}"
                                                                            {{ $nilaiLama == $sub->nilai ? 'selected' : '' }}>
                                                                            {{ $sub->nama }} ({{ $sub->nilai }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            @else
                                                                <input type="number" step="0.01"
                                                                    name="nilai[{{ $kr->id_kriteria }}]"
                                                                    class="form-control" placeholder="Masukkan nilai"
                                                                    value="{{ $nilaiLama }}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-save"></i> Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- AJAX untuk submit -->
    <script>
        document.querySelectorAll('.form-penilaian').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const id = this.getAttribute('data-id');

                fetch("{{ route('penilaian.store') }}", {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) throw response;
                        return response.text();
                    })
                    .then(() => {
                        alert('✅ Penilaian berhasil disimpan!');
                        $('#modalInput' + id).modal('hide');
                        location.reload();
                    })
                    .catch(async (err) => {
                        const errText = await err.text();
                        console.error('Error detail:', errText);
                        alert('❌ Gagal menyimpan penilaian! Cek console untuk detail.');
                    });
            });
        });
    </script>
@endsection
