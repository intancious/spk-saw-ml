@extends('Admin.layouts.app', [
    'title' => 'Tambah User',
    'pageTitle' => 'Tambah User',
])

@section('content')
    <h2 class="mb-2 text-gray-800"><i class="fas fa-user-plus"></i> Tambah User</h2>

    <div class="card shadow mb-4">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div <div class="form-group col-md-6">
                    <label class="font-weight-bold">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
            </div>
    </div>

    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    </form>
    </div>
@endsection
