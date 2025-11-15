@extends('admin.template')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 450px;">

        <div class="card-header text-white text-center rounded-top-4"
             style="background: orange;">
            <h3 class="mb-0 fw-bold">
                <i class="fas fa-plus me-2"></i>Edit User
            </h3>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('users.update', Crypt::encrypt($user->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="{{ old('nama', $user->nama) }}" required>
                    <label for="nama">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="integer" id="kontak" name="kontak" class="form-control" placeholder="Kontak" value="{{ old('kontak', $user->kontak) }}" required>
                    <label for="kontak">Kontak</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ old('username', $user->username) }}" required>
                    <label for="username">Username</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label fw-semibold">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="admin">Admin</option>
                        <option value="member">member</option>
                    </select>
                </div>
                    <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm" style="transition:0.3s;">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
