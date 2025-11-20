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
                    <li class="nav-item"><a class="nav-link" href="#">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('toko') }}">Toko</a></li>
                </ul>

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
                            <li><a href="#" class="dropdown-item">Toko Saya</a></li>                            <li><hr class="dropdown-dvider"></li>
                            <li class="d-flex align-items-center ps-2">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                            </li>
                        </ul>
                        </div>
                        @else
                        <a class="btn btn-primary px-4 py-2" style="font-size: 18px;"
                        href="{{ route('login') }}">Login</a>
                        @endif

                    </div>

                </div>

            </div>
            {{-- <div id="menu" class="collapse w-75 ">
                <a href="{{ route('logout') }}" class="btn btn-danger w-100">Logout</a>
            </div> --}}
    </nav>

    <!-- CONTENT -->
    <div class="m-2">
        @yield('content')
    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-light pt-4 mt-5">
        <div class="container">
            <div class="row">

                <!-- About -->
                <div class="col-md-4 mb-3">
                    <h5>About Us</h5>
                    <p>Website marketplace modern dan mudah digunakan.</p>
                </div>

                <!-- Links -->
                <div class="col-md-4 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Beranda</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Produk</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Kategori</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Toko</a></li>
                    </ul>
                </div>

                <!-- Contact -->
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
