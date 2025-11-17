@extends('admin.template')
@section('content')

<div class="container mt-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center py-2">
        <h3 class="mb-2 ms-2 fw-bold text-dark">Kategori</h3>

        <!-- BUTTON CREATE -->
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#createKategoriModal">
            <i class="fa-solid fa-plus me-1"></i> Tambah Kategori
        </button>
    </div>
    <hr>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- CARD -->
    <div class="card shadow-lg border-0">
        <div class="card-body">
                <table id="example" class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>
                                <!-- BUTTON DELETE -->
                                <a href="{{route('kategori.delete',Crypt::encrypt($item->id))}}"
                                   class="btn btn-sm btn-outline-danger"
                                   onclick="return confirm('Delete this data')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>

                                <!-- BUTTON EDIT -->
                                <button class="btn btn-sm btn-outline-primary me-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editKategoriModal{{ $item->id }}">
                                    <i class="fas fa-pencil"></i> Edit
                                </button>
                            </td>
                        </tr>

                        <!-- ========== MODAL EDIT KATEGORI ========== -->
                        <div class="modal fade" id="editKategoriModal{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">Edit Kategori</h5>
                                        <button class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <form action="{{ route('kategori.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('POST')

                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>Nama Kategori</label>
                                                <input type="text" name="nama_kategori" value="{{ $item->nama_kategori }}" class="form-control" required>
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
                        <!-- =========================================== -->

                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>


</div>



<!-- ========== MODAL CREATE KATEGORI ========== -->
<div class="modal fade" id="createKategoriModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" required>
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
<!-- =========================================== -->

<script>
new DataTable('#example', {
    columnDefs: [{ targets: "_all", className: "dt-left"}]
});
</script>

@endsection
