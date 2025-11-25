<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marketplace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.min.css') }}">\
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        /* Navbar */
        .navbar {
            padding: 0.8rem 0;
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(6px);
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
        footer h5 {
            font-weight: 700;
            margin-bottom: 15px;
        }
        .dropdown-menu {
        position: absolute !important;
        z-index: 999999 !important;
        }

        /* Jika ada konten lain yang pakai z-index, tetap tidak menutup dropdown */
        .dropdown {
            position: relative;
            z-index: 99999;
        }
        .hover-link:hover {
        color: #20c997 !important; /* teal */
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg d-flex flex-column">
        <div class="container">

            <a class="navbar-brand" href="/">Marketplace</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">

                <!-- Menu Tengah -->
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('produk') }}">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('toko') }}">Toko</a></li>
                </ul>

                <!-- Search -->
                <form class="d-flex me-3" action="{{ route('produk') }}" method="GET">
                    <input
                        class="form-control"
                        type="search"
                        name="search"
                        placeholder="Cari produk..."
                        style="width: 350px;"
                        value="{{ request('search') }}"
                    >
                    <button class="btn btn-outline-primary ms-2" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>


                <!-- User -->
                <div class="d-flex align-items-center">

                    @if (Auth::check())
                        <span class="me-3 fw-semibold" style="font-size: 18px;">
                            {{ Auth::user()->nama }}
                        </span>

                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-circle-user text-dark" style="font-size: 32px;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="{{ route('toko.saya', Auth::user()->id) }}" class="dropdown-item">Toko Saya</a></li>
                            <li><hr class="dropdown-dvider"></li>
                            <li class="d-flex align-items-center ps-2">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                            </li>
                        </ul>
                        </div>
                        @else
                        <a class="btn btn-primary px-4 py-2" style="font-size: 18px;"
                        href="{{ route('login') }}">Login</a>
                        <a class="btn btn-secondary px-4 py-2 ms-2" style="font-size: 18px;"
                        href="{{ route('regist') }}">Daftar</a>
                        @endif

                    </div>

                </div>

            </div>
    </nav>

    <!-- CONTENT -->
    <div class="m-2">
        @yield('content')
    </div>

    <!-- FOOTER -->
    <footer style="background: #0d9488;" class="text-white pt-5 mt-5"
            class="bg-dark text-light pt-5 mt-5">
    <div class="container">

        <div class="row gy-4">

            <!-- Brand -->
            <div class="col-md-4">
                <h4 class="fw-bold text-teal">Marketplace</h4>
                <p class="text-dark">
                    Platform marketplace modern untuk jual beli produk terbaik dengan mudah dan cepat.
                </p>

                <!-- Sosial Media -->
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="text-light fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-light fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-light fs-4"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-light fs-4"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <!-- Navigation -->
            <div class="col-md-4">
                <h5 class="fw-semibold mb-3">Navigasi</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('home') }}" class="text-light text-decoration-none hover-link">Beranda</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('produk') }}" class="text-light text-decoration-none hover-link">Produk</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('toko') }}" class="text-light text-decoration-none hover-link">Toko</a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-4">
                <h5 class="fw-semibold mb-3">Kontak Kami</h5>
                <p class="text-dark mb-1">
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    Jl. Lapang Bola No. 117, Tasikmalaya
                </p>
                <p class="text-dark mb-1">
                    <i class="bi bi-telephone-fill me-2"></i>
                    0265-545483
                </p>
                <p class="text-dark">
                    <i class="bi bi-envelope-fill me-2"></i>
                    Marketplace@yahoo.co.id
                </p>
            </div>

        </div>

        <hr class="border-dark mt-4">

        <div class="text-center py-3">
            <small class="text-dark">© 2025 Marketplace. All rights reserved.</small>
        </div>

    </div>
</footer>
    <!-- JS -->
    <script src="{{ asset('bootstrap1/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
