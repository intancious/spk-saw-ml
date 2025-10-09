@extends('Admin.layouts.app', [
    'title' => 'Data Alternatif',
    'pageTitle' => 'Data Alternatif',
])

@section('content')
 <h2 class="mb-2 text-gray-800"><i class="fas fa-users"></i> Data Alternatif</h2>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('alternatif.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Alternatif
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Foto</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alternatifs as $alt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alt->nama }}</td>
                                <td>
                                    @if ($alt->foto)
                                        <img src="{{ asset('alternatif/' . $alt->foto) }}"
                                            alt="{{ $alt->nama }}"
                                            class="img-thumbnail"
                                            style="width: 80px; height: 80px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('alternatif.destroy', $alt->id_alternatif) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                        class="d-inline">
                                        <a href="{{ route('alternatif.edit', $alt->id_alternatif) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted text-center">Belum ada data alternatif.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
