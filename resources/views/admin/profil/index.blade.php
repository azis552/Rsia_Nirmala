@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Profil Rumah Sakit</h1>
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
                    <form action="{{ route('profil.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4>Data Rumah Sakit</h4>
                            <div class="row">
                                <div class=" col-md-6 mb-3">
                                    <label for="">Nama Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-building"></i></span>
                                        <input type="text" class="form-control" name="perusahaan" id="Perusahaan"
                                            placeholder="Nama Rumah Sakit" value="{{ @$profil->perusahaan }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Alamat Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-map-location"></i></span>
                                        <input type="text" class="form-control" name="alamat" id="Alamat"
                                            placeholder="Alamat Rumah Sakit" value="{{ @$profil->alamat }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Logo Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-inbox"></i></span>
                                        <input type="file" class="form-control" name="logo" id="logo"
                                            placeholder="Logo Rumah Sakit" value="{{ @$profil->logo }}">
                                    </div>
                                    <div>
                                        <img id="previewlogo" src="{{ @$profil->logo != null ? asset('images/' . $profil->logo) : asset('images/preview.png') }}" alt="Preview"
                                            style="max-width: 350px; height: auto; object-fit: cover; border-radius: 8px;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Direktur</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-id-card"></i></span>
                                        <input type="text" class="form-control" name="nama_direktur" id="nama_direktur"
                                            placeholder="Nama Rumah Sakit" value="{{ @$profil->nama_direktur }}">
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-inbox"></i></span>
                                        <input type="file" class="form-control" name="direktur" id="direktur"
                                            placeholder="Foto Direktur Rumah Sakit" value="{{ @$profil->direktur }}">
                                    </div>
                                    <img id="previewDirektur" 
                                    src="{{ @$profil->direktur != null ? asset('images/' . $profil->direktur) : asset('images/preview.png') }}" 
                                    alt="Preview"
                                    style="max-width: 150px; height: auto; object-fit: cover; border-radius: 8px;">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Susunan Organisasi Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-inbox"></i></span>
                                        <input type="file" class="form-control" name="susunan_organisasi"
                                            id="susunan_organisasi" placeholder="Susunan Organisasi Rumah Sakit"
                                            value="{{ @$profil->susunan_organisasi }}">
                                    </div>
                                    <div>
                                        <img id="previewSusunan" src="{{ @$profil->susunan_organisasi != null ? asset('images/' . $profil->susunan_organisasi) : asset('images/preview.png') }}" alt="Preview"
                                            style="max-width: 150px; height: auto; object-fit: cover; border-radius: 8px;">
                                    </div>
                                </div>
                            </div>
                            <h4>Visi, Misi, Motto</h4>
                            <div class="row">
                                <div class=" col-md-6 mb-3">
                                    <label for="">Visi</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-eye"></i></span>
                                        <input type="text" class="form-control" name="visi" id="visi"
                                            placeholder="Visi Rumah Sakit" value="{{ @$profil->visi }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Misi</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-minimize"></i></span>
                                        <input type="text" class="form-control" name="misi" id="misi"
                                            placeholder="Misi Rumah Sakit" value="{{ @$profil->misi }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-12 mb-3">
                                    <label for="">Motto</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-font-awesome"></i></span>
                                        <input type="text" class="form-control" name="motto" id="motto"
                                            placeholder="Motto Rumah Sakit" value="{{ @$profil->motto }}">
                                    </div>
                                </div>
                            </div>
                            <h4>Sambutan</h4>
                            <div class="row">
                                <div class=" col-md-12 mb-3">
                                    <label for="">Sambutan</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-comment"></i></span>
                                        <textarea class="form-control" name="tentang" id="tentang" style="height: 200px"
                                            placeholder="Sambutan Rumah Sakit">{{ @$profil->tentang }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <h4>Social Media</h4>
                            <div class="row">
                                <div class=" col-md-6 mb-3">
                                    <label for="">Telepon Darurat</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-phone-volume"></i></span>
                                        <input type="text" class="form-control" name="telepondarurat"
                                            id="telepondarurat" placeholder="Telepon Darurat"
                                            value="{{ @$profil->telepondarurat }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Telepon Pendaftaran</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-phone-flip"></i></span>
                                        <input type="text" class="form-control" name="teleponpendaftaran"
                                            id="teleponpendaftaran" placeholder="Telepon Pendaftaran"
                                            value="{{ @$profil->teleponpendaftaran }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6 mb-3">
                                    <label for="">Whatsapp Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-brands fa-whatsapp"></i></span>
                                        <input type="text" class="form-control" name="teleponwa" id="teleponwa"
                                            placeholder="Whatsapp" value="{{ @$profil->teleponwa }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-envelope-open-text"></i></span>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Email Rumah Sakit" value="{{ @$profil->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6 mb-3">
                                    <label for="">Instagram Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-brands fa-instagram"></i></span>
                                        <input type="text" class="form-control" name="instagram" id="instagram"
                                            placeholder="Instagram Rumah Sakit" value="{{ @$profil->instagram }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Facebook Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-brands fa-facebook"></i></span>
                                        <input type="text" class="form-control" name="facebook" id="Facebook"
                                            placeholder="Facebook Rumah Sakit" value="{{ @$profil->facebook }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6 mb-3">
                                    <label for="">X Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-brands fa-square-x-twitter"></i></span>
                                        <input type="text" class="form-control" name="X" id="X"
                                            placeholder="X Rumah Sakit" value="{{ @$profil->X }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Tiktok Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-brands fa-tiktok"></i></span>
                                        <input type="text" class="form-control" name="tiktok" id="tiktok"
                                            placeholder="Tiktok Rumah Sakit" value="{{ @$profil->tiktok }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6 mb-3">
                                    <label for="">Maps Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-map-pin"></i></span>
                                        <input type="text" class="form-control" name="maps" id="maps"
                                            placeholder="Maps Rumah Sakit" value="{{ @$profil->maps }}">
                                    </div>
                                </div>
                                <div class=" col-md-6 mb-3">
                                    <label for="">Youtube Rumah Sakit</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-youtube"></i></span>
                                        <input type="text" class="form-control" name="youtube" id="youtube"
                                            placeholder="Youtube Rumah Sakit" value="{{ @$profil->youtube }}">
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="card-footer ">

                                <button type="submit" class="btn btn-warning btn-sm">Simpan</button>

                        </div>
                    </form>
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
