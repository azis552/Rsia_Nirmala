@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Berita & Artikel</h1>
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
                                    <th>Tanggal</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beritas as $berita)
                                    <tr>
                                        <td>{{ $berita->judul }}</td>
                                        <td>{{ date('d-M-Y', strtotime($berita->created_at)) }}</td>
                                        <td><img src="{{ asset('images/berita/' . $berita->gambar) }}" alt="Gambar berita"
                                                style="max-width: 100px; height: auto;"></td>
                                        <td>{{ Str::limit(strip_tags($berita->deskripsi), 50) }}</td>
                                        <td>
                                            @if ($berita->status == 'published')
                                                <span class="badge bg-success">Public</span>
                                            @else
                                                <span class="badge bg-danger">Draft</span>
                                            @endif
                                        </td>
                                        <td><span class="badge bg-info">{{ $berita->kategori }}</span></td>
                                        <td>
                                            <form action="{{ Route('berita.destroy', $berita->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-warning text-white btn-edit"
                                                    data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                    data-id="{{ $berita->id }}" data-judul="{{ $berita->judul }}"
                                                    data-status="{{ $berita->status }}"
                                                    data-gambar="{{ $berita->gambar }}"
                                                    data-kategori="{{ $berita->kategori }}"
                                                    data-deskripsi="{{ $berita->deskripsi }}">

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
                <div class="modal fade" id="modalTambah" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahLabel">Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formTambah" action="{{ Route('berita.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" name="gambar" required>
                                    </div>
                                    <div>
                                        <img id="preview" src="" alt="Preview"
                                            style="max-width: 100%; height: 10%;">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="judul" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control " style="height: 500px;" id="deskripsi" rows="10"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Kategori</label>
                                                <select name="kategori" class="form-select" id="kategori" required>
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="Artikel">Artikel</option>
                                                    <option value="Pengumuman">Pengumuman</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="mb-3">
                                                <label for="role" class="form-label">Status</label>
                                                <select name="status" class="form-select" id="role" required>
                                                    <option value="Published">Public</option>
                                                    <option value="Draft">Draft</option>
                                                </select>
                                            </div>
                                        </div>
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

                <div class="modal fade" id="modalEdit" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" aria-hidden="true">
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
                                    <input type="hidden" name="idEdit" id="idEdit">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" id="gambarEdit" name="gambar">
                                    </div>
                                    <div>
                                        <img id="previewEdit" src="" alt="Preview"
                                            style="max-width: 100%; height: 10%;">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="judulEdit" name="judul"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control " id="deskripsiEdit" style="height: 500px;" id="deskripsi"
                                            rows="10"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Kategori</label>
                                                <select name="kategori" class="form-select" id="kategoriEdit" required>
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="artikel">Artikel</option>
                                                    <option value="pengumuman">Pengumuman</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="mb-3">
                                                <label for="role" class="form-label">Status</label>
                                                <select name="status" class="form-select" id="statusEdit" required>
                                                    <option value="published">Public</option>
                                                    <option value="draft">Draft</option>
                                                </select>
                                            </div>
                                        </div>
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

        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            var judul = $(this).data('judul');
            var status = $(this).data('status');
            var gambar = $(this).data('gambar');
            var kategori = $(this).data('kategori');
            var deskripsi = $(this).data('deskripsi');

            console.log(id, judul, status, gambar, kategori, deskripsi);

            $('#idEdit').val(id);
            $('#judulEdit').val(judul);
            $('#statusEdit').val(status);
            $('#kategoriEdit').val(kategori);
            $('#deskripsiEdit').val(deskripsi);
            $('#previewEdit').attr('src', "{{ asset('images/berita/') }}/" + gambar);
            $('#formEdit').attr('action', '{{ url('berita') }}/' + id);
        });

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
