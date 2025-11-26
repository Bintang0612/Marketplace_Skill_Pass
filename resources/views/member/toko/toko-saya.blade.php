@extends('member.template')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">Toko Saya</h2>

    {{-- Jika user belum punya toko --}}
    @if(!$toko)

        <div class="alert alert-info">
            Anda belum memiliki toko.
        </div>

        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#buatTokoModal">
            Buat Toko
        </button>

        {{-- MODAL BUAT TOKO --}}
        <div class="modal fade" id="buatTokoModal" tabindex="-1" aria-labelledby="buatTokoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="buatTokoLabel">Buat Toko Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{ route('toko.buat') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body">

                            <div class="mb-3">
                                <label class="form-label">Nama Toko</label>
                                <input type="text" name="nama_toko" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kontak Toko</label>
                                <input type="text" name="kontak_toko" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Toko</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Buat Toko</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    @else

        {{-- HEADER TOKO --}}
        <div class="card shadow-lg mb-4 p-3">
            <div class="row g-0 align-items-center">

                <div class="col-md-4">
                    <div style="max-height: 250px; overflow: hidden; border-radius: 8px;">
                        <img src="{{ asset('storage/foto-toko/'.$toko->gambar) }}"
                        class="w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>

                <div class="col-md-8 ps-4">
                    <h3 class="fw-bold">Nama Toko : {{ $toko->nama_toko }}</h3>

                    <p class="mt-2">Tentang Toko : {{ $toko->deskripsi }}</p>

                    <p><strong>Alamat:</strong> {{ $toko->alamat }}</p>
                    <p><strong>Kontak:</strong> {{ $toko->kontak_toko }}</p>

                    <div class="d-flex gap-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTokoModal">
                            Edit Toko
                        </button>

                        <form action="{{ route('produk.destroy', $toko->id) }}" method="GET" class="w-15"
                            onsubmit="return confirm('Yakin ingin menghapus Toko Anda?');">
                            <button class="btn btn-danger w-15">Hapus Toko</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        {{-- PRODUK TOKO --}}
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="fw-bold">Produk Saya</h4>

            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createProdukModal">
                + Tambah Produk
            </button>

        </div>

        <div class="row">

            @forelse($toko->produk ?? [] as $item)
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm">

                        <div style="width: 100%; height: 180px; overflow: hidden;">
                            <img src="{{ asset('storage/foto-produk/'.optional($item->gambar_produks->first())->nama_gambar) }}"
                                class="w-100 h-100" style="object-fit: cover;">
                        </div>

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $item->nama_produk }}</h5>

                            <p class="text-success fw-bold">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </p>
                            <p class="text-muted">
                                Stok: {{ $item->stok }}
                            </p>

                            <div class="d-flex gap-2">
                                <!-- Tombol Edit (buka modal) -->
                                <button class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#editProdukModal{{ $item->id }}">
                                    Edit
                                </button>
                                <!-- Hapus -->
                                <form action="{{ route('produk.destroy', $item->id) }}" method="GET" class="w-100"
                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    <button class="btn btn-danger w-100">Hapus</button>
                                </form>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addGambar{{ $item->id }}">Tambah Gambar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Produk -->
                <div class="modal fade" id="editProdukModal{{ $item->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form action="{{ route('produk.edit', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="modal-header">
                        <h5 class="modal-title">Edit Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                        <div class="mb-3">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control"
                            value="{{ $item->nama_produk }}" required>
                        </div>
                        <div class="mb-3">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control"
                            value="{{ $item->harga }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control"
                            value="{{ $item->stok }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Kategori</label>
                            <select name="id_kategoris" class="form-control" required>
                                <option value="">-- pilih kategori --</option>
                                @foreach($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3">{{ $item->deskripsi }}</textarea>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                    </div>
                </div>
                </div>
            @empty
            <p class="text-muted">Belum ada produk.</p>
            @endforelse
        </div>
        {{-- MODAL TAMBAH GAMBAR PRODUK --}}
        @foreach($produk as $p)
            <div class="modal fade" id="addGambar{{ $p->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="{{ route('tambah.gambar', $p->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Gambar Produk {{ $p->nama_produk }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="gambar_produk[]" class="form-control" multiple required>
                        <small class="text-muted">Bisa upload lebih dari 1 gambar.</small>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
            @endforeach

        {{-- MODAL EDIT TOKO --}}
        <div class="modal fade" id="editTokoModal" tabindex="-1" aria-labelledby="editTokoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="editTokoLabel">Edit Toko</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{ route('toko.edit', $toko->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="modal-body">

                            <div class="mb-3">
                                <label class="form-label">Nama Toko</label>
                                <input type="text" name="nama_toko" class="form-control"
                                value="{{ $toko->nama_toko }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3" required>{{ $toko->deskripsi }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control"
                                value="{{ $toko->alamat }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kontak Toko</label>
                                <input type="text" name="kontak_toko" class="form-control"
                                value="{{ $toko->kontak_toko }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Toko</label>
                                <input type="file" name="gambar" class="form-control">

                                <small class="text-muted d-block mt-2">Foto Saat Ini:</small>
                                <img src="{{ asset('storage/foto-toko/'.$toko->gambar) }}"
                                style="max-width: 150px; border-radius: 5px; margin-top: 5px;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        {{-- MODAL CREATE PRODUK --}}
        <div class="modal fade" id="createProdukModal" tabindex="-1" aria-labelledby="createProdukLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createProdukLabel">Tambah Produk Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('produk.buat') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="id_kategoris" class="form-control" required>
                        <option value="">-- pilih kategori --</option>
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Produk</label>
                    <input type="file" name="gambar[]" class="form-control" multiple required>
                    <small class="text-muted">Bisa upload lebih dari 1 gambar</small>
                </div>

                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan Produk</button>
                </div>

            </form>

            </div>
        </div>
        </div>

    @endif

</div>
@endsection
