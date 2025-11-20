@extends('member.template')
@section('content')
<div class="container py-5 text-center">
    <h2 class="text-black bg-success py-3">Daftar Toko</h2>
    <hr>

    <div class="row mt-4 justify-content-center">

        @foreach ($toko as $item)
        <div class="col-12 col-mb-6 col-lg-3 d-flex gap-3">
            <div class="card h-100 shadow-sm border-2" style="width: 400px">

                {{-- GAMBAR TOKO --}}
                <img src="{{ asset('storage/foto-toko/'.$item->gambar) }}"
                     alt="Gambar Toko"
                     style="height: 200px; object-fit: cover; border-radius: 5px;">

                <div class="card-body">

                    {{-- NAMA TOKO --}}
                    <h5 class="card-title">{{ $item->nama_toko }}</h5>

                    {{-- DESKRIPSI SINGKAT --}}
                    <p class="text-muted" style="font-size: 14px;">
                        {{ Str::limit($item->deskripsi, 60) }}
                    </p>

                    {{-- KONTAK --}}
                    <p class="fw-bold mb-1">Kontak: {{ $item->kontak_toko }}</p>

                    {{-- ALAMAT --}}
                    <p class="text-muted mb-2">Alamat: {{ $item->alamat }}</p>

                    {{-- DETAIL --}}
                    <a href="{{ route('toko.detail', $item->id) }}"
                       class="btn btn-primary w-100">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
