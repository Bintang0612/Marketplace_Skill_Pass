@extends('member.template')

@section('content')
<div class="container py-5">

    {{-- HEADER TOKO --}}
    <div class="card shadow-lg mb-4">
        <div class="row g-0">

            {{-- FOTO TOKO --}}
            <div class="col-md-5">
                <img src="{{ asset('storage/foto-toko/' . $toko->gambar) }}"
                     class="img-fluid rounded-start"
                     style="height: 100%; object-fit: cover;"
                     alt="Foto Toko">
            </div>

            {{-- INFORMASI TOKO --}}
            <div class="col-md-7">
                <div class="card-body">
                    <h2 class="fw-bold">{{ $toko->nama_toko }}</h2>

                    <p class="mt-3">{{ $toko->deskripsi }}</p>

                    <p class="mt-2"><strong>Alamat:</strong> {{ $toko->alamat }}</p>
                    <p><strong>Kontak:</strong> {{ $toko->kontak_toko }}</p>

                    <a href="{{ route('toko') }}" class="btn btn-secondary mt-4">
                        Kembali
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- PRODUK YANG DIJUAL OLEH TOKO --}}
    <h3 class="fw-bold mb-3">Produk dari Toko Ini</h3>

    <div class="row">

        @forelse ($toko->produk as $item)
        <div class="col-12 col-md-6 col-lg-3 d-flex mb-4">
            <div class="card h-100 shadow-sm">

                {{-- GAMBAR PRODUK --}}
                @foreach ($item->gambar_produks as $g)
                    <img src="{{ asset('public/foto-produk/' . $g->nama_gambar) }}"
                    style="width: 100%; height: 300px; object-fit:cover; border-radius: 5px;">
                @endforeach

                <div class="card-body text-center">

                    <h5 class="card-title">{{ $item->nama_produk }}</h5>

                    <p class="text-success fw-bold">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </p>

                    <p class="text-muted">Stok: {{ $item->stok }}</p>

                    <a href="{{ route('produk.detail', $item->id) }}"
                       class="btn btn-primary w-100 mt-2">
                        Lihat Detail Produk
                    </a>
                </div>

            </div>
        </div>
        @empty
            <p class="text-muted">Belum ada produk yang dijual oleh toko ini.</p>
        @endforelse

    </div>

</div>
@endsection
