@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="py-3 fw-bold text-white d-flex justify-content-between" style="background-color: black;width:100%;border-radius:10px">
        <h3 class="mb-2 ms-4 text-warning">Data User</h3>
        <a href="{{ route('users.create')  }}" class="btn btn-danger mb-2 me-3">
            <i class="fa-solid fa-user-plus me-1"></i> Create User
        </a>
    </div>
    <hr>

    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="table-responsive">
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
                                <a href="{{route('users.delete',Crypt::encrypt($item->id))}}" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this data')"><i class="fas fa-trash"></i> Delete</a>
                                <a href="{{ route('users.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-pencil"></i>Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script> new DataTable('#example', {
    columnDefs: [
        { targets: "_all", className: "dt-left"}
    ]
});
</script>
@endsection
