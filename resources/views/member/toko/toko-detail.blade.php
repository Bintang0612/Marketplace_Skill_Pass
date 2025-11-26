@extends('member.template')

@section('content')
<div class="container py-5">

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">
        Kembali
    </a>

    {{-- HEADER TOKO --}}
    <div class="card shadow-lg mb-4 mt-4">
        <div class="row g-0">

            {{-- FOTO TOKO --}}
            <div class="col-md-5">
                <div style="max-height: 320px; overflow: hidden; border-radius: 8px;">
                    <img src="{{ asset('storage/foto-toko/' . $toko->gambar) }}"
                        class="img-fluid w-100"
                        style="height: 100%; object-fit: cover;"
                        alt="Foto Toko">
                </div>
            </div>


            {{-- INFORMASI TOKO --}}
            <div class="col-md-7">
                <div class="card-body">
                    <h2 class="fw-bold">Nama Toko : {{ $toko->nama_toko }}</h2>
                    <p class="mt-3">Deskripsi : {{ $toko->deskripsi }}</p>
                    <p class="mt-2"><strong>Alamat:</strong> {{ $toko->alamat }}</p>
                    <p><strong>Kontak:</strong> {{ $toko->kontak_toko }}</p>
                </div>
            </div>

        </div>
    </div>

    {{-- PRODUK YANG DIJUAL OLEH TOKO --}}
    <h3 class="fw-bold mb-3">Produk dari Toko Ini</h3>

    <div class="row">

        @forelse ($toko->produk ?? [] as $item)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card shadow-sm h-100">
                    <!-- Foto Produk -->
                    @php
                    $gambar = $item->gambar_produks->first();
                    @endphp
                    <div style="width: 100%; height: 180px; overflow: hidden;">
                        <img src="{{ $gambar ? asset('storage/foto-produk/'.$gambar->nama_gambar) : asset('noimage.png') }}"
                        class="w-100 h-100" style="object-fit: cover;">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_produk }}</h5>
                        <p class="text-teal fw-bold fs-5">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </p>
                        <p class="text-muted mb-2">Stok: {{ $item->stok }}</p>
                        <a href="{{ route('produk.detail', $item->id) }}" class="btn btn-primary w-100">Lihat Detail</a>
                    </div>

                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada produk yang dijual oleh toko ini.</p>
        @endforelse

    </div>

</div>
@endsection
