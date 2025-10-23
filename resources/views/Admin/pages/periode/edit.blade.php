@extends('Admin.layouts.app', [
    'title' => 'Edit Periode',
    'pageTitle' => 'Edit Periode',
])

@section('content')
    <h1 class="h3 mb-3 text-gray-800">Edit Periode</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('periode.update', $periode->id_periode) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_periode">Nama Periode</label>
                    <input type="text" class="form-control" id="nama_periode" name="nama_periode"
                        value="{{ old('nama_periode', $periode->nama_periode) }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                        value="{{ old('tanggal_mulai', $periode->tanggal_mulai) }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai"
                        value="{{ old('tanggal_selesai', $periode->tanggal_selesai) }}" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('periode.index') }}" class="btn btn-secondary btn-sm"><i
                            class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
