@extends('member.template')
@section('content')

<style>
    /* background Section */
    .background-header {
        background: url('{{ asset('storage/foto-guru/IMG-20230614-WA0076.jpg') }}') center/cover no-repeat;
        min-height: 50vh;
        display: flex;
        align-items: center;
        color: #fff;
        position: relative;
    }
    .background-header::before {
        content:"";
        position:absolute;
        top:0;left:0;width:100%;height:100%;
        background:rgba(0,0,0,.5);
    }
    .background-header-inner {
        position: relative;
        z-index: 2;
    }
    .about-images {
        display: grid;
        gap: 10px;
        height: 450px; /* batas tinggi */
    }
    .about-text {
        max-height: 450px;
        overflow-y: auto;
        padding-right: 10px;
    }
</style>

<div id="home" class="container-fluid background-header">
    <div class="container background-header-inner">
        <div class="row">
            <div class="col-10 col-lg-5 text-center text-lg-start">
                <h1 class="display-4 display-lg-1 mb-3 mb-lg-4">Selamat Datang di Marketplace</h1>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 text-center">
    <h2 class="text-teal mb-4 py-3">Produk Terbaru</h2>

    <div class="row g-4 mt-3 justify-content-center">
      <!-- Card 1 -->
        {{-- @foreach ($berita as $item)
        <div class="col-12 col-mb-6 col-lg-3 d-flex gap-3">
            <div class="card h-100 shadow-sm border-2"
            style="width: 400px">
                <img src="{{ asset('storage/foto-berita/'.$item->foto) }}" class="card-img-top" alt=""
                style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h2 class="card-title ">{{ $item->judul }}</h2>
                    <p class="card-text text-muted">{{ $item->isi }}</p>
                    <small class="text-muted mb-2" style="font-size: 12px">
                        <i class="far fa-calendar me-1"></i>
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </small>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <button class="text-center text-white" style="border-radius: 10px; background-color: blue; width: 75%;" >Baca Selengkapnya</button>
                </div>
            </div>
        </div>
        @endforeach --}}
    </div>
</div>

@endsection
