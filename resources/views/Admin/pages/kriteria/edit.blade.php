@extends('Admin.layouts.app', ['title' => 'Edit Data Kriteria'])

@section('content')
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('kriteria.update', $kriteria->id_kriteria) }}">
            @csrf
            @method('PUT')

            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Edit Data Kriteria</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Kode Kriteria</label>
                            <input type="text" name="kode_kriteria" class="form-control"
                                value="{{ $kriteria->kode_kriteria }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Kriteria</label>
                            <input type="text" name="nama" class="form-control"
                                value="{{ old('nama', $kriteria->nama) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jenis Kriteria</label>
                            <select name="type" class="form-control" required>
                                <option value="Benefit" {{ old('type', $kriteria->type) == 'Benefit' ? 'selected' : '' }}>
                                    Benefit</option>
                                <option value="Cost" {{ old('type', $kriteria->type) == 'Cost' ? 'selected' : '' }}>Cost
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Bobot</label>
                            <input type="number" step="0.01" name="bobot" class="form-control"
                                value="{{ old('bobot', $kriteria->bobot) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Ada Pilihan?</label>
                            <select name="ada_pilihan" class="form-control" required>
                                <option value="0"
                                    {{ old('ada_pilihan', $kriteria->ada_pilihan) == 0 ? 'selected' : '' }}>Inputan Langsung
                                </option>
                                <option value="1"
                                    {{ old('ada_pilihan', $kriteria->ada_pilihan) == 1 ? 'selected' : '' }}>Pilihan Sub
                                    Kriteria</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('kriteria.index') }}" class="btn btn-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
