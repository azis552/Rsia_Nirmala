@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Kamar</h1>
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
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Kelas</th>
                                    <th>Gambar 1</th>
                                    <th>Gambar 2</th>
                                    <th>Gambar 3</th>
                                    <th>Gambar 4</th>
                                    <th>Gambar 5</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kamars as $kamar)
                                    <tr>
                                        <td>{{ $kamar->name }}</td>
                                        <td>{{ $kamar->description }}</td>
                                        <td>{{ $kamar->kelas }}</td>
                                        <td><img src="{{ $kamar->image1 && file_exists(public_path('storage/kamar/' . $kamar->image1)) ? asset('storage/kamar/' . $kamar->image1) : asset('images/preview.png') }}"
                                                alt="Gambar kamar" style="max-width: 100px; height: auto;"></td>
                                        <td><img src="{{ $kamar->image2 && file_exists(public_path('storage/kamar/' . $kamar->image2)) ? asset('storage/kamar/' . $kamar->image2) : asset('images/preview.png') }}"
                                                alt="Gambar kamar" style="max-width: 100px; height: auto;"></td>
                                        <td><img src="{{ $kamar->image3 && file_exists(public_path('storage/kamar/' . $kamar->image3)) ? asset('storage/kamar/' . $kamar->image3) : asset('images/preview.png') }}"
                                                alt="Gambar kamar" style="max-width: 100px; height: auto;"></td>
                                        <td><img src="{{ $kamar->image4 && file_exists(public_path('storage/kamar/' . $kamar->image4)) ? asset('storage/kamar/' . $kamar->image4) : asset('images/preview.png') }}"
                                                alt="Gambar kamar" style="max-width: 100px; height: auto;"></td>
                                        <td><img src="{{ $kamar->image5 && file_exists(public_path('storage/kamar/' . $kamar->image5)) ? asset('storage/kamar/' . $kamar->image5) : asset('images/preview.png') }}"
                                                alt="Gambar kamar" style="max-width: 100px; height: auto;"></td>


                                        <td>
                                            <form action="{{ Route('kamar.destroy', $kamar->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-warning text-white btn-edit"
                                                    data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                    data-id="{{ $kamar->id }}" data-name="{{ $kamar->name }}"
                                                    data-deskripsi="{{ $kamar->description }}"
                                                    data-kelas="{{ $kamar->kelas }}"
                                                    data-gambar1="{{ $kamar->image1 }}"
                                                    data-gambar2="{{ $kamar->image2 }}"
                                                    data-gambar3="{{ $kamar->image3 }}"
                                                    data-gambar4="{{ $kamar->image4 }}"
                                                    data-gambar5="{{ $kamar->image5 }}">
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
                                <form id="formTambah" action="{{ Route('kamar.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <input type="text" class="form-control" name="kelas" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="gambar1">Gambar 1</label>
                                                <input type="file" class="form-control" name="gambar1">
                                            </div>
                                            <img id="gambar1Preview" src="{{ asset('images/preview.png') }}" alt="Preview"
                                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="gambar2">Gambar 2</label>
                                                <input type="file" class="form-control" name="gambar2">
                                            </div>
                                            <img id="gambar2Preview" src="{{ asset('images/preview.png') }}" alt="Preview"
                                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="gambar1">Gambar 3</label>
                                                <input type="file" class="form-control" name="gambar3">
                                            </div>
                                            <img id="gambar3Preview" src="{{ asset('images/preview.png') }}"
                                                alt="Preview"
                                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="gambar2">Gambar 4</label>
                                                <input type="file" class="form-control" name="gambar4">
                                            </div>
                                            <img id="gambar4Preview" src="{{ asset('images/preview.png') }}"
                                                alt="Preview"
                                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label for="gambar1">Gambar 5</label>
                                                <input type="file" class="form-control" name="gambar5">
                                            </div>
                                            <img id="gambar5Preview" src="{{ asset('images/preview.png') }}"
                                                alt="Preview"
                                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" rows="3" required style="height: 150px"></textarea>
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

                <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
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
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name" id="nameEdit"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <input type="text" class="form-control" name="kelas" id="kelasEdit"
                                            required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="gambar1">Gambar 1</label>
                                                <input type="file" class="form-control" name="gambar1">
                                            </div>
                                            <img id="gambar1PreviewEdit" src="{{ asset('images/preview.png') }}"
                                                alt="Preview"
                                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="gambar2">Gambar 2</label>
                                                <input type="file" class="form-control" name="gambar2">
                                            </div>
                                            <img id="gambar2PreviewEdit" src="{{ asset('images/preview.png') }}"
                                                alt="Preview"
                                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="gambar1">Gambar 3</label>
                                                <input type="file" class="form-control" name="gambar3">
                                            </div>
                                            <img id="gambar3PreviewEdit" src="{{ asset('images/preview.png') }}"
                                                alt="Preview"
                                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="gambar2">Gambar 4</label>
                                                <input type="file" class="form-control" name="gambar4">
                                            </div>
                                            <img id="gambar4PreviewEdit" src="{{ asset('images/preview.png') }}"
                                                alt="Preview"
                                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label for="gambar5">Gambar 5</label>
                                                <input type="file" class="form-control" name="gambar5">
                                            </div>
                                            <img id="gambar5PreviewEdit" src="{{ asset('images/preview.png') }}"
                                                alt="Preview"
                                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsiEdit" name="deskripsi" rows="3" required style="height: 150px"></textarea>
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
            var name = $(this).data('name');
            var deskripsi = $(this).data('deskripsi');
            var kelas = $(this).data('kelas');
            var gambar1 = $(this).data('gambar1');
            var gambar2 = $(this).data('gambar2');
            var gambar3 = $(this).data('gambar3');
            var gambar4 = $(this).data('gambar4');
            var gambar5 = $(this).data('gambar5');

            $('#idEdit').val(id);
            $('#nameEdit').val(name);
            $('#deskripsiEdit').val(deskripsi);
            $('#kelasEdit').val(kelas);
            $('#gambar1PreviewEdit').attr('src', "{{ asset('storage/kamar/') }}/" + gambar1);
            $('#gambar2PreviewEdit').attr('src', "{{ asset('storage/kamar/') }}/" + gambar2);
            $('#gambar3PreviewEdit').attr('src', "{{ asset('storage/kamar/') }}/" + gambar3);
            $('#gambar4PreviewEdit').attr('src', "{{ asset('storage/kamar/') }}/" + gambar4);
            $('#gambar5PreviewEdit').attr('src', "{{ asset('storage/kamar/') }}/" + gambar5);
            $('#formEdit').attr('action', '{{ url('kamar') }}/' + id);
        })

        $(document).ready(function() {
            // Preview untuk form tambah
            $('input[name="gambar1"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#gambar1Preview');

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
            $('input[name="gambar2"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#gambar2Preview');

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
            $('input[name="gambar3"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#gambar3Preview');

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
            $('input[name="gambar4"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#gambar4Preview');

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
            $('input[name="gambar5"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#gambar5Preview');

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
            $('input[name="gambar1"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#gambar1PreviewEdit');

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
            $('input[name="gambar2"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#gambar2PreviewEdit');

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
            $('input[name="gambar3"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#gambar3PreviewEdit');

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
            $('input[name="gambar4"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#gambar4PreviewEdit');

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
            $('input[name="gambar5"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#gambar5PreviewEdit');

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

        });
    </script>
@endsection
