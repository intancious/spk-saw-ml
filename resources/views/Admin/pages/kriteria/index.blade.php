@extends('Admin.layouts.app', [
    'title' => 'Data Kriteria',
    'pageTitle' => 'Data Kriteria',
])

@section('content')
    <h2 class="mb-2 text-gray-800"><i class="fas fa-cube"></i> Data Kriteria</h2>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('kriteria.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Kriteria
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Kriteria</th>
                            <th>Tipe</th>
                            <th>Bobot</th>
                            <th>Cara Penilaian</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kriteria as $krt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $krt->kode_kriteria }}</td>
                                <td>{{ $krt->nama }}</td>
                                <td>
                                    @if ($krt->type === 'Benefit')
                                        <span class="badge badge-success">{{ $krt->type }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ $krt->type }}</span>
                                    @endif
                                </td>
                                <td>{{ number_format($krt->bobot) }}</td>
                                <td>
                                    @if ($krt->ada_pilihan)
                                        <span class="badge badge-info">Pilihan Sub Kriteria</span>
                                    @else
                                        <span class="badge badge-warning">Input Langsung</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                        action="{{ route('kriteria.destroy', $krt->id_kriteria) }}" method="POST">
                                        <a href="{{ route('kriteria.edit', $krt->id_kriteria) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Belum ada data kriteria.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
