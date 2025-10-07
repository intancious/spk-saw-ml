@extends('Admin.layouts.app', [
    'title' => 'Data Sub Kriteria',
])

@section('content')
    <h2 class="mb-2 text-gray-800 my-4"> <i class="fa fa-table"></i> Data Sub Kriteria</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($kriteria->isEmpty())
        <div class="alert alert-info">
            Semua kriteria menggunakan penilaian input langsung.
        </div>
    @else
        @foreach ($kriteria as $kr)
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold"><i class="fa fa-table"></i>
                        {{ $kr->nama }} ({{ $kr->kode_kriteria }})
                    </h6>

                    <!-- Tombol tambah modal -->
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah{{ $kr->id_kriteria }}">
                        <i class="fa fa-plus"></i> Tambah Sub Kriteria
                    </button>
                </div>

                <!-- Modal Tambah -->
                <div class="modal fade" id="tambah{{ $kr->id_kriteria }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('subkriteria.store') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Sub Kriteria {{ $kr->nama }}</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="kriteria_id" value="{{ $kr->id_kriteria }}">
                                    <div class="form-group">
                                        <label>Nama Sub Kriteria</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nilai</label>
                                        <input type="number" step="0.01" name="nilai" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Table Sub Kriteria -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sub Kriteria</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kr->subKriteria as $i => $sub)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td class="text-left">{{ $sub->nama }}</td>
                                        <td>{{ $sub->nilai }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $sub->id_sub_kriteria }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <!-- Hapus -->
                                                <form action="{{ route('subkriteria.destroy', $sub->id_sub_kriteria) }}"
                                                    method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="edit{{ $sub->id_sub_kriteria }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('subkriteria.update', $sub->id_sub_kriteria) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit {{ $sub->nama }}</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Nama Sub Kriteria</label>
                                                            <input type="text" name="nama" class="form-control"
                                                                value="{{ $sub->nama }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nilai</label>
                                                            <input type="number" step="0.01" name="nilai"
                                                                class="form-control" value="{{ $sub->nilai }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="4">Belum ada sub kriteria</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
