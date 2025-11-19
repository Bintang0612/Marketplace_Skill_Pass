<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Marketplace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.min.css') }}">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        /* Navbar modern */
        .navbar {
            padding: 0.8rem 0;
            backdrop-filter: blur(6px);
            background: rgba(255, 255, 255, 0.85) !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 800;
            color: #111;
            letter-spacing: 0.5px;
        }

        .nav-link {
            font-size: 20px;
            font-weight: 600;
            color: #222 !important;
            padding: 8px 18px !important;
            transition: 0.2s ease-in-out;
        }

        .nav-link:hover {
            color: #007bff !important;
        }

        /* Footer */
        footer {
            margin-top: 60px;
        }

        footer h5 {
            font-weight: 700;
            margin-bottom: 15px;
        }

        footer a:hover {
            color: #0d6efd !important;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <!-- Brand kiri -->
            <a class="navbar-brand" href="/">Marketplace</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">

                <!-- Menu Tengah -->
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Toko</a></li>
                </ul>

                <!-- User Kanan -->
                <div class="d-flex align-items-center">

                    @if (Auth::check())
                        <span class="me-3 fw-semibold" style="font-size: 18px;">
                            {{ Auth::user()->nama }}
                        </span>

                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-circle-user text-dark" style="font-size: 32px;"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li class="d-flex align-items-center ps-3 py-2">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                                    <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a class="btn btn-primary px-4 py-2" style="font-size: 18px;" href="{{ route('login') }}">Login</a>
                    @endif

                </div>

            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="mt-4">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-light pt-4">
        <div class="container">
            <div class="row">

                <!-- Tentang -->
                <div class="col-md-4 mb-3">
                    <h5>About Us</h5>
                    <p>Website marketplace modern dan mudah digunakan.</p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-4 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Beranda</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Produk</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Kategori</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="col-md-4 mb-3">
                    <h5>Contact</h5>
                    <p>
                        📍 Jl. Lapang Bola No. 117, Tasikmalaya<br>
                        📞 0265-545483<br>
                        ✉️ Marketplace@yahoo.co.id
                    </p>
                </div>

            </div>

            <div class="text-center py-3 border-top border-secondary mt-3">
                <small>© 2025 Marketplace. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script src="{{ asset('bootstrap1/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
