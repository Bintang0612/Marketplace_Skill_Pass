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
    <hr>
    <div class="container pb-5">
        <div class="row g-4">

            @foreach ($produks as $produk)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-lg-start">
                    <div class="card shadow-sm h-100">
                        <!-- Foto Produk -->
                        @php
                        $gambar = $produk->gambar_produks->first();
                        @endphp
                        <div style="width: 100%; height: 180px; overflow: hidden;">
                            <img src="{{ $gambar ? asset('storage/foto-produk/'.$gambar->nama_gambar) : asset('noimage.png') }}"
                            class="w-100 h-100" style="object-fit: cover;">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                            <p class="text-teal fw-bold fs-5">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </p>
                            <p class="text-muted mb-2">Stok: {{ $produk->stok }}</p>
                            <a href="{{ route('produk.detail', $produk->id) }}" class="btn btn-primary w-100">Lihat Detail Produk</a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

<!-- DAFTAR TOKO -->
<div class="container py-5 text-center">
    <h2 class="text-teal mb-4 py-3">Daftar Toko</h2>
    <hr>
    <div class="row g-4">

        @foreach ($toko as $item)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card shadow-sm h-100">

                    {{-- Foto Toko --}}
                    <div class="d-flex justify-content-center mt-3">
                        <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden;">
                            <img src="{{ $item->gambar ? asset('storage/foto-toko/'.$item->gambar) : asset('noimage.png') }}"
                                class="w-100 h-100" style="object-fit: cover;">
                        </div>
                    </div>

                    <div class="card-body">
                    <h5 class="card-title">{{ $item->nama_toko }}</h5>

                    <p class="text-muted" style="font-size: 14px;">
                        {{ Str::limit($item->deskripsi, 60) }}
                    </p>
                    <p class="fw-bold mb-1">Kontak: {{ $item->kontak_toko }}</p>
                    <p class="text-muted mb-2">Alamat: {{ $item->alamat }}</p>

                        <a href="{{ route('toko.detail', $item->id) }}" class="btn btn-success w-100">
                            Kunjungi Toko
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>


@endsection
