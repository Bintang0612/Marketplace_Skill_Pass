@extends('member.template')
@section('content')
<div class="container py-5 text-center">
    <h2 class="text-black">Daftar Produk</h2>
    <hr>
    {{-- FILTER KATEGORI --}}
    <form action="" method="GET" class="mb-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <select name="kategori" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ request('kategori') == $kat->id ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
    <hr>

    <div class="row mt-4 justify-content-center">
        @foreach ($produk as $item)
        <div class="col-12 col-mb-6 col-lg-3 d-flex gap-3">
            <div class="card h-100 shadow-sm border-2"
            style="width: 400px">
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
        @endforeach
    </div>
</div>

@endsection
