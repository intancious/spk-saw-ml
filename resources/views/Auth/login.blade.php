@extends('Auth.layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3 class="text-center mb-4 text-gray-900">Login Account</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ url('/login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="username" value="{{ old('username') }}" class="form-control"
                                    placeholder="Username" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="fas fa-sign-in-alt mr-1"></i> Masuk
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
