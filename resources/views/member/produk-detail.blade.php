@extends('member.template')

@section('content')
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0">
                <div class="row g-0">

                    {{-- GAMBAR PRODUK --}}
                    <div class="col-md-5">
                        @foreach ($produk->gambar_produks as $g)
                        <img src="{{ asset('public/foto-produk/' . $g->nama_gambar) }}"
                        style="width: 100%; height: 300px; object-fit:cover;">
                        @endforeach
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

                            <div class="mt-4 d-flex gap-3">
                                <a href="#" class="btn btn-primary w-100">
                                    Pesan Via Whatsapp
                                </a>

                                <a href="{{ route('home') }}"
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
