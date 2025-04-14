@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">promotion</h1>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
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
                                    <th>Judul</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $promotion)
                                    <tr>
                                        <td>{{ $promotion->title }}</td>
                                        <td><img src="{{ asset("storage/promotion/".$promotion->image) }}" alt="Gambar promotion"
                                                style="max-width: 100px; height: auto;"></td>
                                        
                                        <td>
                                            <form action="{{ Route('promotion.destroy', $promotion->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-warning text-white btn-edit"
                                                    data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                    data-id="{{ $promotion->id }}" 
                                                    data-title = "{{ $promotion->title }}"
                                                    data-gambar = "{{ $promotion->image }}"
                                                    >
                                                    <i class="fa-solid fa-pen-ruler"></i>
                                                </button>
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                    class="btn btn-danger text-white"><i
                                                        class="fa-solid fa-trash"></i></button>
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
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahLabel">Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formTambah" action="{{ Route('promotion.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">promotion</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Foto</label>
                                        <input type="file" class="form-control" name="gambar" required>
                                    </div>
                                    <div>
                                        <img id="preview" src="" alt="Preview"
                                            style="max-width: 100%; height: 10%;">
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
                                <form id="formEdit" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Foto</label>
                                        <input type="file" class="form-control" name="gambar" >
                                    </div>
                                    <div>
                                        <img id="previewEdit" src="" alt="Preview"
                                            style="max-width: 100%; height: auto;">
                                    </div>
                                    <input type="hidden" name="idEdit" id="idEdit">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">promotion</label>
                                        <input type="text" class="form-control" id="titleEdit" name="titleEdit"
                                            required>
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
        });

        // Mengisi data ke dalam modal edit
        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var gambar = $(this).data('gambar');
            $('#idEdit').val(id);
            $('#titleEdit').val(title);
            $('#previewEdit').attr('src', "{{ asset('storage/promotion/') }}/" + gambar);
            $('#formEdit').attr('action', '{{ url('promotion') }}/' + id);
        })

        $(document).ready(function() {
            // Preview untuk form tambah
            $('input[name="gambar"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#preview');

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.attr('src', e.target.result); // Set src dari <img> dengan data file
                    };

                    reader.readAsDataURL(file); // Membaca file sebagai URL data
                } else {
                    preview.attr('src', ''); // Kosongkan preview jika tidak ada file
                }
            });

            // Preview untuk form edit
            $('input[name="gambar"]').on('change', function(event) {
                const file = event.target.files[0];
                const previewEdit = $('#previewEdit');

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewEdit.attr('src', e.target.result); // Set src dari <img> dengan data file
                    };

                    reader.readAsDataURL(file); // Membaca file sebagai URL data
                } else {
                    previewEdit.attr('src', ''); // Kosongkan preview jika tidak ada file
                }
            });
        });
    </script>
@endsection
