@extends('Admin.layouts.app', [
    'title' => 'Data User',
    'pageTitle' => 'Data User',
])

@section('content')
    {{-- <div class="container-fluid"> --}}

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>Tambah
                Pegawai</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Jabatan</th>
                            <th>Shift</th>
                            <th>Tgl Daftar</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $us)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $us->name }}</td>
                                <td>{{ $us->email }}</td>
                                <td>{{ $us->username }}</td>
                                <td>
                                    @if ($us->role == 'Super User')
                                        <span class="badge badge-primary">{{ $us->role }}</span>
                                    @else
                                        <span class="badge badge-success">{{ $us->role }}</span>
                                    @endif
                                </td>
                                <td>{{ $us->position->name }}</td>
                                <td>{{ $us->shift->shift_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($us->created_at)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('user.destroy', $us->id) }}" method="POST">
                                        {{-- <a href="{{ route('user.show', $us->slug) }}" class="btn btn-sm btn-info"><i
                                            class="fas fa-eye"></i></a> --}}
                                        <a href="{{ route('user.edit', $us->id) }}" class="btn btn-sm btn-primary"><i
                                                class="far fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- </div> --}}
@endsection
