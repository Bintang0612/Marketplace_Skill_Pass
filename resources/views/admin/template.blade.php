<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('bootstrap1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/fontawesome-free-6.7.2-web/css/all.min.css')}}">
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
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            position: fixed;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 sidebar d-none d-md-block">
            <div class="py-4 text-center">
                <h3 class="text-white">Marketplace</h3>
            </div>
            <hr class="text-white">
            <ul class="navbar-nav me-auto">
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{ route('home') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{ route('users') }}">
                        Users
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{ route('produk') }}">
                        Produk
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{ route('toko') }}">
                        Toko
                    </a>
                </li>
            </ul>
        </nav>
        <main class="col-md-10 ms-sm-auto px-4 py-4">
            <h2 class="mb-4">@yield('title')</h2>
            @yield('content')
        </main>
    </div>
</div>
<script src="{{asset('bootstrap1/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
