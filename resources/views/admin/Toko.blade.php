@extends('admin.template')
@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-dark ms-2">Toko</h3>

        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#createTokoModal">
            <i class="fa fa-plus me-1"></i> Tambah Toko
        </button>
    </div>
    <hr>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-lg border-0">
        <div class="card-body">
            <table id="example" class="table table-bordered table-hover mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Kontak Toko</th>
                        <th>Owner</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($toko as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_toko }}</td>
                        <td>{{ $item->kontak_toko }}</td>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                        <img src="{{ asset('storage/foto-toko/'.$item->gambar) }}" alt="" width="100" height="100">
                        </td>
                        <td>
                            <a href="{{route('toko.delete',Crypt::encrypt($item->id))}}"
                                   class="btn btn-sm btn-outline-danger"
                                   onclick="return confirm('Delete this data')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>

                                <!-- BUTTON EDIT -->
                                <button class="btn btn-sm btn-outline-primary me-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editTokoModal{{ $item->id }}">
                                    <i class="fas fa-pencil"></i> Edit
                                </button>
                        </td>
                    </tr>

                    {{-- MODAL EDIT --}}
                    <div class="modal fade" id="editTokoModal{{ $item->id }}">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('toko.update', $item->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5>Edit Toko</h5>
                                        <button class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <label>Nama Toko</label>
                                        <input type="text" name="nama_toko" class="form-control" value="{{ $item->nama_toko }}" required>

                                        <label>Kontak Toko</label>
                                        <input type="text" name="kontak_toko" class="form-control" value="{{ $item->kontak_toko }}" required>

                                        <label>Owner</label>
                                        <select name="id_users" class="form-control" required>
                                            @foreach($users as $u)
                                            <option value="{{ $u->id }}" {{ $u->id == $item->id_users ? 'selected' : '' }}>{{ $u->nama }}</option>
                                            @endforeach
                                        </select>

                                        <label class="mt-2">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{ $item->alamat }}" required>

                                        <label class="mt-2">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control">{{ $item->deskripsi }}</textarea>

                                        <label for="gambar" class="form-label">Gambar</label>
                                        <input type="file" name="gambar" id="gambar" class="form-control" min="0">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL CREATE --}}
<div class="modal fade" id="createTokoModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('toko.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5>Tambah Toko</h5>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Toko</label>
                        <input type="text" name="nama_toko" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Kontak Toko</label>
                        <input type="text" name="kontak_toko" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Owner</label>
                        <select name="id_users" class="form-control" required>
                            <option value="">-- pilih user --</option>
                            @foreach($users as $u)
                            <option value="{{ $u->id }}">{{ $u->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="mt-2">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="mt-2">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>

                    <div class="mt-3 mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" min="0">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-warning">Tambah</button>
                </div>

            </div>
        </form>
    </div>
</div>
<script>new DataTable('#example')</script>
@endsection
