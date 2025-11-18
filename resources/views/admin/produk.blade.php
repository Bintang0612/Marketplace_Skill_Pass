@extends('admin.template')
@section('content')

<div class="container mt-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center py-2">
        <h3 class="mb-2 ms-2 fw-bold text-dark">Produk</h3>

        <!-- BUTTON CREATE -->
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#createProdukModal">
            <i class="fa-solid fa-plus me-1"></i> Tambah Produk
        </button>
    </div>
    <hr>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- CARD TABEL -->
    <div class="card shadow-lg border-0">
        <div class="card-body">
                <table id="example" class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Upload</th>
                            <th>Kategori</th>
                            <th>Toko</th>
                            <th>Gambar</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($produk as $item)
                        <tr>
                            <td>{{ $item->nama_produk }}</td>
                            <td>Rp {{ number_format($item->harga) }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->tanggal_upload }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ $item->toko->nama_toko }}</td>
                            <td>
                                <div class="d-flex flex-wrap">
                                    @foreach ($item->gambar_produks as $g)
                                        <img src="{{ asset('public/foto-produk/'.$g->nama_gambar) }}" alt="" width="60" class="me-1 mb-1 rounded">
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <!-- EDIT -->
                                <button class="btn btn-sm btn-outline-primary me-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editProdukModal{{ $item->id }}">
                                    <i class="fa fa-pencil"></i> Edit
                                </button>

                                <!-- DELETE -->
                                <form action="{{ route('produk.delete', $item->id) }}"
                                      class="d-inline">
                                    <button onclick="return confirm('Hapus produk ini?')"
                                        class="btn btn-sm btn-outline-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                        <!-- EDIT PRODUK -->
                        <div class="modal fade" id="editProdukModal{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">Edit Produk</h5>
                                        <button class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <form action="{{ route('produk.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')

                                        <div class="modal-body">

                                            <input type="hidden" name="id" value="{{ $item->id }}">

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
                                                <label>Toko</label>
                                                <select name="id_tokos" class="form-control" required>
                                                    <option value="">-- pilih toko --</option>
                                                    @foreach($toko as $t)
                                                    <option value="{{ $t->id }}">{{ $t->nama_toko }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label>Deskripsi</label>
                                                <textarea name="deskripsi" class="form-control" rows="3">{{ $item->deskripsi }}</textarea>
                                            </div>
                                            <div class="mt-3 mb-3">
                                                <label for="gambar" class="form-label">Gambar</label>
                                                <input type="file" name="gambar" id="gambar" class="form-control" min="0">
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                        @endforeach

                    </tbody>
                </table>
        </div>
    </div>

</div>


<!-- CREATE PRODUK -->
<div class="modal fade" id="createProdukModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <h5 class="modal-title">Tambah Produk</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="id_kategoris" class="form-control" required>
                            <option value="">-- kategori --</option>
                            @foreach($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Toko</label>
                        <select name="id_tokos" class="form-control" required>
                            <option value="">-- toko --</option>
                            @foreach($toko as $t)
                            <option value="{{ $t->id }}">{{ $t->nama_toko }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" min="0">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-warning" type="submit">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>
<script>new DataTable('#example')</script>

@endsection
