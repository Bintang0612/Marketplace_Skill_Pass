@extends('member.template')
@section('content')
<div class="container py-5 text-center">
    <h2 class="text-black bg-success py-3">Daftar Produk</h2>
    <hr>
    <div class="row mt-4 justify-content-center">
        @foreach ($produk as $item)
        <div class="col-12 col-mb-6 col-lg-3 d-flex gap-3">
            <div class="card h-100 shadow-sm border-2"
            style="width: 400px">
                @foreach ($item->gambar_produks as $g)
                    <img src="{{ asset('public/foto-produk/' . $g->nama_gambar) }}"
                    class="card-img-top"
                    style="height: 200px; object-fit: cover;"
                    alt="gambar produk">
                @endforeach
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
        @endforeach
    </div>
</div>

@endsection
