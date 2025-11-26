@extends('member.template')
@section('content')
<div class="container py-5 text-center">
    <h2 class="text-black">Daftar Toko</h2>
    <hr>

    <div class="row mt-4 justify-content-center">

        @foreach ($toko as $item)
        <div class="col-12 col-mb-6 col-lg-3 d-flex gap-3">
            <div class="card h-100 shadow-sm border-2" style="width: 400px">

                {{-- GAMBAR TOKO --}}
                <div class="d-flex justify-content-center mt-3">
                    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden;">
                        <img src="{{ $item->gambar ? asset('storage/foto-toko/'.$item->gambar) : asset('noimage.png') }}"
                            class="w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>

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
