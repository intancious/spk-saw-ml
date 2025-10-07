@extends('Admin.layouts.app', ['title' => 'Tambah Data Kriteria'])

@section('content')
    <div class="container-fluid">
        {{-- Notifikasi error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('kriteria.store') }}">
            @csrf
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Tambah Data Kriteria</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- KODE KRITERIA --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Kode Kriteria</label>
                            <input type="text" name="kode_kriteria" class="form-control" value="{{ $kodeBaru }}"
                                readonly>
                        </div>

                        {{-- NAMA --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Kriteria</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}" placeholder="Masukkan nama kriteria" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- TYPE (Benefit / Cost) --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jenis Kriteria</label>
                            <select name="type" class="form-control @error('type') is-invalid @enderror" required>
                                <option value="" disabled selected>-- Pilih Jenis --</option>
                                <option value="Benefit" {{ old('type') == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                                <option value="Cost" {{ old('type') == 'Cost' ? 'selected' : '' }}>Cost</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- BOBOT --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Bobot</label>
                            <input type="number" step="0.01" name="bobot"
                                class="form-control @error('bobot') is-invalid @enderror" value="{{ old('bobot') }}"
                                placeholder="Masukkan bobot kriteria" required>
                            @error('bobot')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ADA PILIHAN --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Ada Pilihan?</label>
                            <select name="ada_pilihan" class="form-control @error('ada_pilihan') is-invalid @enderror"
                                required>
                                <option value="0" {{ old('ada_pilihan') == '0' ? 'selected' : '' }}>Input Langsung
                                </option>
                                <option value="1" {{ old('ada_pilihan') == '1' ? 'selected' : '' }}>Pilihan Sub
                                    Kriteria</option>
                            </select>
                            @error('ada_pilihan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('kriteria.index') }}" class="btn btn-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
