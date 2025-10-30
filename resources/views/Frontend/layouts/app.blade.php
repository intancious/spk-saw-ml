<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Hero Decision System' }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #00bfff;
            --bg-dark: #0d1b2a;
            --bg-darker: #1b263b;
            --text-light: #e0e1dd;
            --accent: #ffd700;
        }

        body {
            background: radial-gradient(circle at top, #0f2027, #203a43, #2c5364);
            color: var(--text-light);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        nav.navbar {
            background: rgba(13, 27, 42, 0.95);
            box-shadow: 0 2px 10px rgba(0, 191, 255, 0.2);
            padding: 0.8rem 1rem;
        }

        nav .navbar-brand {
            color: var(--primary-color);
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        nav .nav-link {
            color: var(--text-light);
            transition: color 0.2s;
        }

        nav .nav-link:hover,
        nav .nav-link.active {
            color: var(--accent);
        }

        footer {
            background-color: var(--bg-darker);
            color: #aaa;
            text-align: center;
            padding: 1.5rem 0;
            margin-top: 3rem;
            font-size: 0.9rem;
        }

        footer a {
            color: var(--primary-color);
            text-decoration: none;
        }

        footer a:hover {
            color: var(--accent);
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- 🔹 Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa-solid fa-dragon"></i> HeroSPK
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('statistics') ? 'active' : '' }}"
                            href="{{ route('frontend.hasil') }}">Statistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="#">Tentang</a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </nav>

    <!-- 🔹 Main Content -->
    <main class="pt-5 mt-4">
        @yield('content')
    </main>

    <!-- 🔹 Footer -->
    <footer>
        <div class="container">
            <p>© {{ date('Y') }} <strong>HeroSPK</strong>. Dibuat dengan ❤️ untuk menentukan hero terbaik.</p>
            {{-- <p>
                <a href="https://github.com/" target="_blank"><i class="fab fa-github"></i></a> |
                <a href="https://mlbb.io/" target="_blank">Terinspirasi oleh MLBB.io</a>
            </p> --}}
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
