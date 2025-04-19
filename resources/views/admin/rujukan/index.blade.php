@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Rujukan Pasien</h1>
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
                                    <th>#</th>
                                    <th>ID Rujukan</th>
                                    <th>Faskes</th>
                                    <th>Status</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>No Rujukan</th>
                                    <th>Kategori Rujukan</th>
                                    <th>Dokter Perujuk</th>
                                    <th>Diagnosa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rujukans as $rujukan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::limit($rujukan->rujukan_id, 5) }}</td>
                                        <td>{{ @$rujukan->faskes->faskes }}</td>
                                        <td>
                                            @if ($rujukan->status == 'menunggu')
                                                <span class="badge"
                                                    style="background-color: rgb(10, 64, 82) ;">{{ $rujukan->status }}</span>
                                            @elseif ($rujukan->status == 'diterima')
                                                <span class="badge"
                                                    style="background-color: lightgreen ">{{ $rujukan->status }}</span>
                                            @elseif ($rujukan->status == 'ditolak')
                                                <span class="badge"
                                                    style="background-color: lightcoral ">{{ $rujukan->status }}</span>
                                            @elseif ($rujukan->status == 'Dibatalkan')
                                                <span class="badge"
                                                    style="background-color: lightgray ">{{ $rujukan->status }}</span>
                                            @else
                                                <span class="badge"
                                                    style="background-color: lightyellow ">{{ $rujukan->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $rujukan->nik }}</td>
                                        <td>{{ $rujukan->nama }}</td>
                                        <td>{{ $rujukan->No_Rujukan }}</td>
                                        <td>{{ $rujukan->Kategori_Rujukan }}</td>
                                        <td>{{ $rujukan->Dokter_Perujuk }}</td>
                                        <td>{{ $rujukan->Diagnosa }}</td>

                                        <td>
                                            <form action="{{ Route('rujukan.destroy', $rujukan->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ Route('rujukan.show', $rujukan->rujukan_id) }}"
                                                    class="btn btn-info text-white">
                                                    <i class="fa-solid fa-circle-info"></i> Detail
                                                </a>
                                                @if (Auth::user()->role == 'admin')
                                                    <a href="{{ route('rujukan.updateStatus', ['id' => $rujukan->id, 'status' => 'diterima']) }}"
                                                        class="btn btn-warning text-white">
                                                        <i class="fa-solid fa-check-to-slot"></i> Terima
                                                    </a>
                                                    <a href="{{ route('rujukan.updateStatus', ['id' => $rujukan->id, 'status' => 'ditolak']) }}"
                                                        class="btn btn-danger text-white">
                                                        <i class="fa-solid fa-square-xmark"></i> Tidak Diterima
                                                    </a>
                                                @endif
                                                @if (Auth::user()->role == 'faskes1')
                                                    @if ($rujukan->status == 'menunggu')
                                                        <button type="button" class="btn btn-warning text-white btn-edit"
                                                            data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                            data-id="{{ $rujukan->id }}"
                                                            data-nama="{{ $rujukan->nama }}"
                                                            data-nik = "{{ $rujukan->nik }}"
                                                            data-no_rujukan="{{ $rujukan->No_Rujukan }}"
                                                            data-dokter_perujuk="{{ $rujukan->Dokter_Perujuk }}"
                                                            data-diagnosa="{{ $rujukan->Diagnosa }}"
                                                            data-kategori_rujukan="{{ $rujukan->Kategori_Rujukan }}"
                                                            data-keterangan="{{ $rujukan->Keterangan }}"
                                                            >
                                                            <i class="fa-solid fa-pen-ruler"></i> Edit
                                                        </button>
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                            class="btn btn-danger text-white"><i
                                                                class="fa-solid fa-trash"></i>Delete</button>
                                                    @endif
                                                @endif

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
                                <form id="formTambah" action="{{ Route('rujukan.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="text" class="form-control" id="nik" name="nik"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="no_rujukan" class="form-label">No Rujukan</label>
                                                <input type="text" class="form-control" id="no_rujukan" name="no_rujukan"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="dokter_perujuk" class="form-label">Dokter Perujuk</label>
                                                <input type="text" class="form-control" id="dokter_perujuk"
                                                    name="dokter_perujuk" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="diagnosa" class="form-label">Diagnosa</label>
                                                <input type="text" class="form-control" id="diagnosa"
                                                    name="diagnosa" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="kategori_rujukan" class="form-label">Kategori Rujukan</label>
                                                <input type="text" class="form-control" id="kategori_rujukan"
                                                    name="kategori_rujukan" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan"
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
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="namaEdit" name="nama"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="text" class="form-control" id="nikEdit" name="nik"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="no_rujukan" class="form-label">No Rujukan</label>
                                            <input type="text" class="form-control" id="no_rujukanEdit" name="no_rujukan"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="dokter_perujuk" class="form-label">Dokter Perujuk</label>
                                            <input type="text" class="form-control" id="dokter_perujukEdit"
                                                name="dokter_perujuk" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="diagnosa" class="form-label">Diagnosa</label>
                                            <input type="text" class="form-control" id="diagnosaEdit"
                                                name="diagnosa" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="kategori_rujukan" class="form-label">Kategori Rujukan</label>
                                            <input type="text" class="form-control" id="kategori_rujukanEdit"
                                                name="kategori_rujukan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keteranganEdit" name="keterangan"
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
            var nama = $(this).data('nama');
            var nik = $(this).data('nik');
            var no_rujukan = $(this).data('no_rujukan');
            var dokter_perujuk = $(this).data('dokter_perujuk');
            var diagnosa = $(this).data('diagnosa');
            var kategori_rujukan = $(this).data('kategori_rujukan');
            var keterangan = $(this).data('keterangan');
            $('#namaEdit').val(nama);
            $('#nikEdit').val(nik);
            $('#no_rujukanEdit').val(no_rujukan);
            $('#dokter_perujukEdit').val(dokter_perujuk);
            $('#diagnosaEdit').val(diagnosa);
            $('#kategori_rujukanEdit').val(kategori_rujukan);
            $('#keteranganEdit').val(keterangan);
            $('#formEdit').attr('action', '{{ url('rujukan') }}/' + id);
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
