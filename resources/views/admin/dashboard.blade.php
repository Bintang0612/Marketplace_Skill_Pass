@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="py-2 fw-bold text-white">
        <h3 class="mb-2 ms-2 text-dark">Dashboard</h3>
    </div>
    <hr>
    <div class="d-md-flex gap-3">
        <div class="card bg bg-success" style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between text-white">
                <i class="fa-solid fa-users" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h3>Data Users</h3>
                    <h4 class="text-center">{{ $user->count() }}</h4>
                </div>
            </div>
        </div>

        <div class="card bg bg-warning" style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between text-white">
                <i class="fa-solid fa-box" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h3>Data Produk</h3>
                    <h4 class="text-center">{{ $produk->count() }}</h4>
                </div>
            </div>
        </div>

        <div class="card bg bg-danger" style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between text-white">
                <i class="fa-solid fa-tags" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h3>Data Kategori</h3>
                    <h4 class="text-center">{{ $kategori->count() }}</h4>
                </div>
            </div>
        </div>

        <div class="card bg bg-secondary" style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between text-white">
                <i class="fa-solid fa-shop" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h3>Data toko</h3>
                    <h4 class="text-center">{{ $toko->count() }}</h4>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
@endsection
