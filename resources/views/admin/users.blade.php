@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center py-3">
        <h3 class="mb-2 ms-1 text-dark fw-bold">Data User</h3>

        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#createUserModal">
            <i class="fa-solid fa-user-plus me-1"></i> Create User
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
                <table id="example" class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Kontak</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kontak }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->role }}</td>
                            <td>
                                <!-- DELETE -->
                                <a href="{{route('users.delete',Crypt::encrypt($item->id))}}"
                                   class="btn btn-sm btn-outline-danger"
                                   onclick="return confirm('Delete this data')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>

                                <!-- EDIT (MODAL) -->
                                <button class="btn btn-sm btn-outline-primary me-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editUserModal{{ $item->id }}">
                                    <i class="fas fa-pencil"></i> Edit
                                </button>
                            </td>
                        </tr>

                        <!-- ====================== MODAL EDIT USER ========================= -->
                        <div class="modal fade" id="editUserModal{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">Edit User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <form action="{{ route('users.update', Crypt::encrypt($item->id)) }}" method="POST">
                                        @csrf
                                        @method('POST')

                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label>Nama</label>
                                                <input type="text" name="nama" value="{{ $item->nama }}" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Kontak</label>
                                                <input type="text" name="kontak" value="{{ $item->kontak }}" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Username</label>
                                                <input type="text" name="username" value="{{ $item->username }}" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label>Role</label>
                                                <select name="role" class="form-control" required>
                                                    <option value="admin" {{ $item->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="member" {{ $item->role == 'member' ? 'selected' : '' }}>Member</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
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


<!-- MODAL CREATE USER -->
<div class="modal fade" id="createUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Create Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Kontak</label>
                        <input type="text" name="kontak" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="member">Member</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- ================================================================== -->

<script>
new DataTable('#example', {
    columnDefs: [{ targets: "_all", className: "dt-left"}]
});
</script>

@endsection
