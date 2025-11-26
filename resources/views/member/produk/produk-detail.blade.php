@extends('member.template')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-center align-items-center mb-4 mt-4">
        <h2 class="mb-0">Detail Produk</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0">
                <div class="row g-0">

                    {{-- GAMBAR PRODUK --}}
                    <div class="col-md-5 p-3">

                    {{-- GAMBAR UTAMA --}}
                    <div class="mb-3">
                        <img id="mainImage"
                            src="{{ asset('storage/foto-produk/' . $produk->gambar_produks->first()->nama_gambar) }}"
                            style="width:100%; height:310px; object-fit:cover; border-radius:8px;">
                    </div>

                    {{-- THUMBNAIL --}}
                    <div class="d-flex gap-2 flex-wrap">
                        @foreach ($produk->gambar_produks as $g)
                            <img src="{{ asset('storage/foto-produk/' . $g->nama_gambar) }}"
                                onclick="document.getElementById('mainImage').src=this.src"
                                style="width:70px; height:70px; object-fit:cover; border-radius:5px; cursor:pointer; border:2px solid #ddd;">
                        @endforeach
                    </div>
                </div>

                    {{-- INFORMASI PRODUK --}}
                    <div class="col-md-7">
                        <div class="card-body">

                            <h3 class="card-title fw-bold">{{ $produk->nama_produk }}</h3>

                            <h4 class="text-success fw-bold mt-3">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </h4>

                            <p class="text-muted mt-2">
                                Stok: <span class="fw-bold">{{ $produk->stok }}</span>
                            </p>

                            <hr>

                            <h5 class="fw-bold">Deskripsi Produk</h5>
                            <p class="mt-2" style="font-size: 15px;">
                                {{ $produk->deskripsi }}
                            </p>

                            <hr>
                            <h5 class="fw-bold">Toko</h5>
                            <p class="mt-2" style="font-size: 15px;">
                                {{ $produk->toko->nama_toko }}
                            </p>

                            <div class="mt-4 d-flex gap-3">
                                <a href="https://wa.me/{{ $produk->toko->kontak_toko }}?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($produk->nama_produk) }}"
                                target="_blank"
                                class="btn btn-success w-100">
                                    Pesan Via WhatsApp
                                </a>


                                <a href="{{ url()->previous() }}"
                                   class="btn btn-secondary w-100">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
