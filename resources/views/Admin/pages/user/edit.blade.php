@extends('Admin.layouts.app', [
    'title' => 'Edit User',
    'pageTitle' => 'Edit User',
])

@section('content')
    <h2 class="mb-2 text-gray-800"><i class="fas fa-user-edit"></i> Edit User</h2>

    <div class="card shadow mb-4">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Username</label>
                        <input type="text" name="username" class="form-control"
                            value="{{ old('username', $user->username) }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}"
                            required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                            required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Password (kosongkan jika tidak diubah)</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Role</label>
                        <select name="role" class="form-control" required>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator
                            </option>
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
@endsection
