@extends('Admin.layouts.app', [
    'title' => 'Tambah Alternatif',
    'pageTitle' => 'Tambah Alternatif',
])

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

        <form id="form_id" method="post" action="{{ route('alternatif.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Tambah Data Alternatif</h5>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        {{-- KODE KRITERIA --}}
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Alternatif <span class="text-danger">*</span></label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukkan nama alternatif" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="foto" class="form-control-file">Foto</label>
                                <div>
                                    <input type="file" id="foto"
                                        class="form-control-file @error('foto') is-invalid @enderror" name="foto"
                                        onchange="previewImage('foto', 'img-preview')">

                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <small class="text-danger">MAX 2MB</small>

                                    <!-- Preview image di bawah form upload -->
                                    <img id="img-preview" class="img-preview img-fluid mt-3"
                                        style="width: 80px; display: none;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('alternatif.index') }}" class="btn btn-secondary"> <i
                                class="fas fa-arrow-left"></i>
                            Kembali</a>
                        <button type="submit" class="btn btn-primary ml-2"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function previewImage(inputId, previewId) {
            const file = document.getElementById(inputId).files[0];
            const imgPreview = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                imgPreview.style.display = 'none';
            }
        }
    </script>
@endsection
