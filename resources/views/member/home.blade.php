@extends('member.template')
@section('content')

<style>
    /* background Section */
    .background-header {
        background: url('{{ asset('public/foto/img.jpg') }}') center/cover no-repeat;
        min-height: 80vh;
        display: flex;
        align-items: center;
        color: #fff;
        position: relative;
    }
    .background-header::before {
        content:"";
        position:absolute;
        top:0;left:0;width:100%;height:100%;
        background:rgba(0,0,0,.5);
    }
    .background-header-inner {
        position: relative;
        z-index: 2;
    }
    .about-images {
        display: grid;
        gap: 10px;
        height: 450px; /* batas tinggi */
    }
    .about-text {
        max-height: 450px;
        overflow-y: auto;
        padding-right: 10px;
    }
</style>

<div id="home" class="container-fluid background-header">
    <div class="container background-header-inner">
        <div class="row">
            <div class="col-10 col-lg-5 text-center text-lg-start">
                <h1 class="display-4 display-lg-1 mb-3 mb-lg-4">Selamat Datang di Marketplace</h1>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 text-center">
    <h2 class="text-teal mb-4 py-3">Produk Terbaru</h2>
    <div class="container pb-5">
        <div class="row g-4">

            @foreach ($produks as $produk)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card shadow-sm h-100">

                    <!-- Foto Produk -->
                    @foreach ($produk->gambar_produks as $g)
                        <img src="{{ asset('public/foto-produk/'.$g->nama_gambar) }}" alt="" width="60" class="card-img-top"
                        style="height: 200px; object-fit: cover;">
                    @endforeach

                    <div class="card-body">
                        <!-- Nama Produk -->
                        <h5 class="card-title">{{ $produk->nama_produk }}</h5>

                        <!-- Harga -->
                        <p class="text-teal fw-bold fs-5">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

                        <!-- Stok -->
                        <p class="text-muted mb-2">Stok: {{ $produk->stok }}</p>

                        <!-- Tombol -->
                        <a href="#"
                        class="btn btn-primary w-100">
                            Lihat Detail
                        </a>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>

</div>

@endsection
