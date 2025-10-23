<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - SPK</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/backend') }}/css/sb-admin-2.min.css" rel="stylesheet">


    <style>
        /* ================================
       🌌 Tema Gelap Mobile Legends
       ================================ */
        .bg-mlbb-dark {
            background: radial-gradient(circle at center, #1e2a44 0%, #0a0f1f 100%);
            min-height: 100vh;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            color: #f1f1f1;
            font-family: "Nunito", sans-serif;
        }

        /* ================================
       🃏 Card Login
       ================================ */
        .card {
            background-color: rgba(28, 28, 28, 0.9);
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.2);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(0, 123, 255, 0.1);
        }

        .card-body {
            padding: 2rem;
        }

        /* ================================
       📝 Input Form
       ================================ */
        .form-control {
            background-color: #222;
            color: #fff;
            border: 1px solid #555;
            border-radius: 8px;
            padding: 12px;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .form-group {
            margin-bottom: 20px;
        }

        /* ================================
       🟦 Tombol Login (Neon Biru)
       ================================ */
        .btn-primary {
            background: linear-gradient(90deg, #0d6efd, #1e90ff);
            border: none;
            box-shadow: 0 0 10px rgba(30, 144, 255, 0.6);
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #1e90ff, #63b3ff);
            box-shadow: 0 0 20px rgba(99, 179, 255, 0.8);
            transform: translateY(-2px);
        }

        .btn-user {
            padding: 12px 24px;
            font-size: 16px;
        }

        /* ================================
       🚨 Alert Error
       ================================ */
        .alert-danger {
            background-color: #e74a3b;
            color: white;
            border: none;
            border-radius: 8px;
        }

        /* ================================
       🧭 Teks
       ================================ */
        .h4,
        .text-gray-900 {
            color: #f1f1f1 !important;
        }
    </style>

</head>

<body class="bg-mlbb-dark">

    <div class="container mt-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">


                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-white-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @include('sweetalert::alert')

                                    <form class="user" method="POST" action="{{ route('login.proses') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="username" value="{{ old('username') }}"
                                                class="form-control form-control-user"
                                                placeholder="Masukkan Username Anda">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/backend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('template/backend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/backend') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/backend') }}/js/sb-admin-2.min.js"></script>

</body>

</html>
