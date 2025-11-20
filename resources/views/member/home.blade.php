@extends('member.template')
@section('content')

<style>
    .about-images {
        display: grid;
        gap: 10px;
        height: 450px;
    }
    .about-text {
        max-height: 450px;
        overflow-y: auto;
        padding-right: 10px;
    }
</style>

<!-- HERO -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div style="
                background:
                    linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                    url('{{ asset('public/foto/img.jpg') }}') center/cover no-repeat;
                height: 500px;
                width: 100%;
                "
                class="d-flex align-items flex-column justify-content-center col-10 col-lg-5 text-center text-lg-start">
                <h1 class="display-4 ms-4 mb-3 text-white w-50">Selamat Berbelanja di Marketplace</h1>
            </div>
        </div>
    </div>
</div>


<!-- PRODUK TERBARU -->
<div class="container py-5 text-center">
    <h2 class="text-teal mb-4 py-3">Produk Terbaru</h2>

    <div class="container pb-5">
        <div class="row g-4">

            @foreach ($produks as $produk)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm h-100">
                        <!-- Foto Produk -->
                        @foreach ($produk->gambar_produks as $g)
                            <img src="{{ asset('public/foto-produk/' . $g->nama_gambar) }}"
                                 class="card-img-top"
                                 style="height: 200px; object-fit: cover;"
                                 alt="gambar produk">
                        @endforeach
                        <div class="card-body">
                            <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                            <p class="text-teal fw-bold fs-5">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </p>
                            <p class="text-muted mb-2">Stok: {{ $produk->stok }}</p>
                            <a href="{{ route('produk.detail', $produk->id) }}" class="btn btn-primary w-100">Lihat Detail</a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
