@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Detail Rujukan</h1>
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
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Faskes 1</label>
                            <input type="text" name="faskes" class="form-control" id="faskes" readonly
                                value="{{ @$rujukan->faskes->faskes }}">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="{{ $rujukan->nama }}" readonly
                                        id="nama" name="nama" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" value="{{ $rujukan->nik }}" readonly
                                        id="nik" name="nik" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="no_rujukan" class="form-label">No Rujukan</label>
                                    <input type="text" class="form-control" value="{{ $rujukan->No_Rujukan }}" readonly
                                        id="no_rujukan" name="no_rujukan" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="dokter_perujuk" class="form-label">Dokter Perujuk</label>
                                    <input type="text" class="form-control" value="{{ $rujukan->Dokter_Perujuk }}"
                                        readonly id="dokter_perujuk" name="dokter_perujuk" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="diagnosa" class="form-label">Diagnosa</label>
                                    <input type="text" class="form-control" value="{{ $rujukan->Diagnosa }}" readonly
                                        id="diagnosa" name="diagnosa" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kategori_rujukan" class="form-label">Kategori Rujukan</label>
                                    <input type="text" class="form-control" value="{{ $rujukan->Kategori_Rujukan }}"
                                        readonly id="kategori_rujukan" name="kategori_rujukan" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" value="{{ $rujukan->Keterangan }}"
                                readonly name="keterangan" required>
                        </div>
                    </div>
                    <div class="card-footer ">
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('rujukan.updateStatus', ['id' => $rujukan->id, 'status' => 'diterima']) }}"
                                type="submit" class="btn btn-warning btn-sm">Terima</a>
                            <a href="{{ route('rujukan.updateStatus', ['id' => $rujukan->id, 'status' => 'ditolak']) }}"
                                type="submit" class="btn btn-danger btn-sm">Tolak</a>
                        @endif
                        <a href="{{ route('rujukan.index') }}" class="btn btn-secondary btn-sm">Kembali</a>

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

            $('input[name="logo"]').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#previewlogo');

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
            $('input[name="direktur"]').on('change', function(event) {
                const file = event.target.files[0];
                const previewEdit = $('#previewDirektur');

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
            $('input[name="susunan_organisasi"]').on('change', function(event) {
            const file = event.target.files[0];
            const previewEdit = $('#previewSusunan');

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
