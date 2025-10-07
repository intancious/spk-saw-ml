@extends('Admin.layouts.app', [
    'title' => 'Edit Data Pegawai',
    // 'pageTitle' => 'Edit Data Pegawai',
])
@section('content')
    <div class="container-fluid">

        <form id="form_id" method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header text-white bg-info mb-3">
                    Edit Data Pegawai
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Nama Pegawai</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $user->name ?? '') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email', $user->email ?? '') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Username</label>
                            <input type="username" class="form-control @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username', $user->username ?? '') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="" disabled selected>Pilih Role Akses</option>
                                <option value="Super User"
                                    {{ old('role', $user->role ?? '') == 'Super User' ? 'selected' : '' }}>
                                    Super User</option>
                                <option value="User" {{ old('role', $user->role ?? '') == 'User' ? 'selected' : '' }}>
                                    User</option>
                            </select>
                            <small class="text-danger">Pilih Super User untuk dapat mengakses master data</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Jabatan</label>
                            <select class="form-control @error('position_id') is-invalid @enderror" id="position_id"
                                name="position_id">
                                <option value="" disabled selected>Pilih Jabatan</option>
                                @foreach ($positions as $pst)
                                    <option value="{{ $pst->id }}"
                                        {{ old('position_id', $user->position_id) == $pst->id ? 'selected' : '' }}>
                                        {{ $pst->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Shift</label>
                            <select class="form-control @error('shift_id') is-invalid @enderror" id="shift_id"
                                name="shift_id">
                                <option value="" disabled selected>Pilih Shift</option>
                                @foreach ($shifts as $sf)
                                    <option value="{{ $sf->id }}"
                                        {{ old('shift_id', $user->shift_id) == $sf->id ? 'selected' : '' }}>
                                        {{ $sf->shift_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mx-1 mb-2">Submit</button>
                    <button type="reset" class="btn btn-secondary mx-1 mb-2">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection
