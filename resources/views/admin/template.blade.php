<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>

    {{-- Bootstrap & Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('bootstrap1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.min.css') }}">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
    <script src ="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>
    <link herf="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link herf="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link herf="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap5.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F4F6F6;
            color: #333;
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: row;

        }

        /* === SIDEBAR === */
        .sidebar {
            width: 250px;
            background-color: #0D47A1;
            min-height: 100vh;
            flex-shrink: 0;
            display: block;
            flex-direction: column;
            padding: 1rem;
            position: fixed
        }

        .sidebar h4 {
            font-weight: 600;
        }

        .sidebar .nav-pills {
            padding-top: 0.5rem;
        }

        .sidebar .nav-link {
            color: #E8F5E9;
            font-weight: 500;
            margin-bottom: 0.5rem;
            padding: 0.6rem 0.9rem;
            border-radius: 0.6rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: background-color 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #1E1E2F;
            color: #fff;
        }

        .sidebar .nav-link i {
            font-size: 1rem;
        }

        /* === MAIN WRAPPER === */
        .main-wrapper {
            flex: 1;
            margin-left:250px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* === CONTENT === */
        .content {
            flex: 1;
            padding: 25px;
        }

        /* Button custom */
        .btn-primary {
            background-color: #FF9800;
            border: none;
        }

        .btn-primary:hover {
            background-color: #FB8C00;
        }
    </style>
</head>

<body>
    {{-- SIDEBAR --}}
    <nav class="sidebar">
        <h4 class="text-white text-center mb-4">
            <i class="fa-solid fa-shop me-2"></i> Marketplace
        </h4>

        <ul class="nav nav-pills flex-column mb-4">
            <li class="mb-1">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-align-justify"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('user') ? 'active' : '' }}">
                    <i class="fa-solid fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('admin.produk') }}" class="nav-link {{ request()->routeIs('produk') ? 'active' : '' }}">
                    <i class="fa-brands fa-product-hunt"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('admin.kategori') }}" class="nav-link {{ request()->routeIs('admin.kategori') ? 'active' : '' }}">
                    <i class="fa-solid fa-tags"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('admin.toko') }}" class="nav-link {{ request()->routeIs('toko') ? 'active' : '' }}">
                    <i class="fa-solid fa-shop"></i>
                    <span>Toko</span>
                </a>
            </li>
            <li class="mb-1 ms-1">
                <a href="{{ route('logout') }}" class="nav-link" style="background-color: red">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    {{-- MAIN WRAPPER --}}
    <div class="main-wrapper">

        {{-- MAIN CONTENT --}}
        <div class="content">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('bootstrap1/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
