@extends('Admin.layouts.app', [
    'title' => 'Edit Alternatif',
    'pageTitle' => 'Edit Alternatif',
])


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

        <form method="post" action="{{ route('alternatif.update', $alternatif->id_alternatif) }}"
            enctype="multipart/form-data" id="edit-article-form">
            @csrf
            @method('PUT')

            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Edit Data Alternatif</h5>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Alternatif <span class="text-danger">*</span></label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ old('nama', $alternatif->nama) }}" required>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="foto">Ganti Foto (Opsional)</label>
                                <input type="file" name="foto" id="foto" class="form-control-file"
                                    accept="image/*" onchange="previewImage('foto', 'img-thumbnail')">
                                @error('foto')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Gambar preview dan foto lama -->
                            <div class="form-group">
                                <label>Preview Foto</label><br>
                                @if ($alternatif->foto)
                                    <img src="{{ asset('alternatif/' . $alternatif->foto) }}" alt="{{ $alternatif->nama }}"
                                        id="img-thumbnail" class="img-thumbnail"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <img src="#" alt="Preview Image" id="img-thumbnail" class="img-thumbnail"
                                        style="width: 100px; height: 100px; object-fit: cover; display: none;">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('alternatif.index') }}" class="btn btn-secondary"><i
                                class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-success ml-2"><i class="fas fa-save"></i> Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
<script>
    function previewImage(inputId, imgId) {
        const fileInput = document.getElementById(inputId);
        const img = document.getElementById(imgId);

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                img.style.display = 'block'; // Tampilkan gambar
            }
            reader.readAsDataURL(fileInput.files[0]);
        } else {
            img.style.display = 'none'; // Sembunyikan jika tidak ada file
        }
    }
</script>
