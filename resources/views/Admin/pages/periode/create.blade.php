@extends('Admin.layouts.app', [
    'title' => 'Tambah Periode',
    'pageTitle' => 'Tambah Periode',
])

@section('content')
    <h1 class="h3 mb-3 text-gray-800">Tambah Periode Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('periode.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_periode">Nama Periode</label>
                    <input type="text" class="form-control" id="nama_periode" name="nama_periode"
                        placeholder="Contoh: Minggu Ke-1 Oktober 2025" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('periode.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
