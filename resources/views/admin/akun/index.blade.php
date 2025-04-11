


@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Akun</h1>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <!-- Button Tambah -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            Tambah Data
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="display  nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->role == 'admin')
                                                <div class="badge bg-success">Admin</div>
                                            @else
                                                <div class="badge bg-warning">Faskes 1</div>
                                            @endif
                                        <td>
                                            <form action="{{ Route('akun.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-warning text-white btn-edit"
                                                    data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                    data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                                    data-email="{{ $user->email }}" data-role="{{ $user->role }}">
                                                    <i class="fa-solid fa-pen-ruler"></i>
                                                </button>
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                    class="btn btn-danger text-white"><i class="fa-solid fa-trash"></i></button>
                                            </form>

                                            
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Tambahkan data lainnya di sini -->
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- Modal Tambah -->
                <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahLabel">Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formTambah" action="{{ Route('akun.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telepon" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" class="form-select" id="role" required>
                                            <option value="faskes1">Faskes 1</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" id="simpanBtn">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahLabel">Edit Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formEdit" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="idEdit" id="idEdit">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="nameEdit" id="nameEdit"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="emailEdit" id="emailEdit"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telepon" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="roleEdit" class="form-select" id="roleEdit" required>
                                            <option value="faskes1">Faskes 1</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" id="simpanBtn">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--//container-fluid-->
        </div><!--//app-content-->


    </div><!--//app-wrapper-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });


            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var email = $(this).data('email');
                var role = $(this).data('role');
                $('#idEdit').val(id);
                $('#nameEdit').val(name);
                $('#emailEdit').val(email);
                $('#roleEdit').val(role);
                $('#formEdit').attr('action', '{{ url('akun') }}/' + id);
            })
        });
    </script>
@endsection
