@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Poliklinik</h1>
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
                                    <th>Gambar 1</th>
                                    <th>Dokter</th>
                                    <th>Foto Dokter</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($polikliniks as $poliklinik)
                                    @php
                                        $namaDokters = json_decode($poliklinik->nama_dokter, true);
                                        $gambarDokters = json_decode($poliklinik->gambar_dokter, true);
                                    @endphp
                                    <tr>
                                        <td>{{ $poliklinik->name }}</td>
                                        <td>{{ $poliklinik->deskripsi }}</td>
                                        <td><img src="{{ asset('storage/poliklinik/' . $poliklinik->image1) }}"
                                                alt=""
                                                style="width: 190px; height: auto; object-fit: cover; border-radius: 6px; margin-bottom: 5px;">
                                        </td>
                                        {{-- Kolom Nama Dokter --}}
                                        <td>
                                            @php
                                                $namaDokters = json_decode($poliklinik->nama_dokter, true);
                                                $gambarDokters = json_decode($poliklinik->gambar_dokter, true);
                                            @endphp

                                            @if ($namaDokters)
                                                <ul class="mb-0 ps-3">
                                                    @foreach ($namaDokters as $nama)
                                                        <li>{{ $nama }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <em>Tidak ada dokter</em>
                                            @endif
                                        </td>

                                        {{-- Kolom Gambar Dokter --}}
                                        <td>
                                            @if ($gambarDokters)
                                                @foreach ($gambarDokters as $gambar)
                                                    <img src="{{ asset('storage/foto_dokter/' . $gambar) }}"
                                                        style="width: 60px; height: auto; object-fit: cover; border-radius: 6px; margin-bottom: 5px;">
                                                @endforeach
                                            @else
                                                <em>Tidak ada gambar</em>
                                            @endif
                                        </td>

                                        {{-- Kolom Aksi --}}
                                        <td>
                                            <form action="{{ Route('poliklinik.destroy', $poliklinik->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-warning text-white btn-edit"
                                                    data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                    data-id="{{ $poliklinik->id }}" data-name="{{ $poliklinik->name }}"
                                                    data-deskripsi="{{ $poliklinik->deskripsi }}"
                                                    data-gambar1="{{ $poliklinik->image1 }}"
                                                    data-namadokter="{{ $poliklinik->nama_dokter }}"
                                                    data-gambardokter="{{ $poliklinik->gambar_dokter }}">
                                                    <i class="fa-solid fa-pen-ruler"></i>
                                                </button>
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                    class="btn btn-danger text-white">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
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
                                <form id="formTambah" action="{{ Route('poliklinik.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="gambar1">Gambar 1</label>
                                                <input type="file" class="form-control" name="gambar1">
                                            </div>
                                            <img id="gambar1Preview" src="{{ asset('images/preview.png') }}" alt="Preview"
                                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                        </div>

                                    </div>
                                    <div id="dokter-container">
                                        <div class="row dokter-item">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Foto Dokter</label>
                                                    <input type="file" class="form-control gambar-input" name="gambar[]">
                                                    <img src="{{ asset('images/preview.png') }}"
                                                        class="gambar-preview mt-2"
                                                        style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="mb-3">
                                                    <label>Nama Dokter</label>
                                                    <input type="text" class="form-control" name="namadokter[]" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-start">
                                                <button type="button"
                                                    class="btn btn-danger btn-sm mt-4 remove-dokter">X</button>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary mt-3" id="add-dokter">Tambah
                                        Dokter</button>


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
                                    <!-- Hidden ID -->
                                    <input type="hidden" name="id" id="edit-id">

                                    <!-- Nama -->
                                    <div class="mb-3">
                                        <label for="edit-name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name" id="edit-name"
                                            required>
                                    </div>

                                    <!-- Gambar 1 -->
                                    <div class="mb-3">
                                        <label for="edit-gambar1">Gambar 1</label>
                                        <input type="file" class="form-control" name="gambar1">
                                        <img id="gambar1EditPreview" src="{{ asset('images/preview.png') }}"
                                            alt="Preview"
                                            style="max-width: 250px; height: auto; object-fit: cover; border-radius: 8px;"
                                            class="mt-2">
                                    </div>

                                    <!-- Dokter -->
                                    <div id="dokter-containerEdit" class="mt-3">
                                        <!-- Dinamis dari JavaScript -->
                                    </div>
                                    <button type="button" class="btn btn-primary mt-2" id="add-dokter-edit">Tambah
                                        Dokter</button>

                                    <!-- Deskripsi -->
                                    <div class="mb-3 mt-3">
                                        <label for="edit-deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="edit-deskripsi" rows="3" required style="height: 150px"></textarea>
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
            var gambar1 = $(this).data('gambar1');
            var namaDokters = $(this).data('namadokter');
            var gambarDokters = $(this).data('gambardokter');
            $('#idEdit').val(id);
            // Isi nama poliklinik
            $('#edit-name').val(name);

            // Isi deskripsi
            $('#edit-deskripsi').val(deskripsi);

            // Preview gambar1
            $('#gambar1EditPreview').attr('src', gambar1 ? '{{ asset('storage/poliklinik/') }}/' + gambar1 :
                '{{ asset('images/preview.png') }}');

            // Isi data dokter (nama dokter dan gambar)
            if (namaDokters && gambarDokters) {
                for (let i = 0; i < namaDokters.length; i++) {
                    let html = `
                    <div class="row dokter-item">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Foto Dokter</label>
                                <input type="file" class="form-control gambar-input" name="gambar[]">
                                <img src="{{ asset('storage/foto_dokter/') }}/${gambarDokters[i]}" class="gambar-preview mt-2"
                                    style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label>Nama Dokter</label>
                                <input type="text" class="form-control" name="namadokter[]" value="${namaDokters[i]}" required>
                            </div>
                        </div>
                        <div class="col-md-1 d-flex align-items-start">
                            <button type="button" class="btn btn-danger btn-sm mt-4 remove-dokter">X</button>
                        </div>
                    </div>
                `;
                
                    $('#dokter-containerEdit').append(html);
                }

                
            }

            $('#formEdit').attr('action', '{{ url('poliklinik') }}/' + id);

            // Tambah dokter baru (tombol add-dokter-edit)
            $('#add-dokter-edit').off('click').on('click', function() {
                let html = `
                <div class="row dokter-item">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Foto Dokter</label>
                            <input type="file" class="form-control gambar-input" name="gambar[]">
                            <img src="{{ asset('images/preview.png') }}" class="gambar-preview mt-2"
                                style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label>Nama Dokter</label>
                            <input type="text" class="form-control" name="namadokter[]" required>
                        </div>
                    </div>
                    <div class="col-md-1 d-flex align-items-start">
                        <button type="button" class="btn btn-danger btn-sm mt-4 remove-dokter">X</button>
                    </div>
                </div>
            `;
                $('#dokter-containerEdit').append(html);
            });

            // Hapus dokter (tombol X)
            $(document).on('click', '.remove-dokter', function() {
                $(this).closest('.dokter-item').remove();
            });
        });

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

    <script>
        $(document).ready(function() {
            // Tambah dokter
            $('#add-dokter').click(function() {
                let newItem = `
            <div class="row dokter-item">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Foto Dokter</label>
                        <input type="file" class="form-control gambar-input" name="gambar[]">
                        <img src="{{ asset('images/preview.png') }}" class="gambar-preview mt-2" style="max-width: 76px; height: auto; object-fit: cover; border-radius: 8px;">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                        <label>Nama Dokter</label>
                        <input type="text" class="form-control" name="namadokter[]" required>
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-start">
                    <button type="button" class="btn btn-danger btn-sm mt-4 remove-dokter">X</button>
                </div>
            </div>`;
                $('#dokter-container').append(newItem);
            });

            // Hapus dokter
            $(document).on('click', '.remove-dokter', function() {
                $(this).closest('.dokter-item').remove();
            });

            // Preview gambar
            $(document).on('change', '.gambar-input', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    const imgPreview = $(this).siblings('.gambar-preview');
                    reader.onload = function(e) {
                        imgPreview.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
