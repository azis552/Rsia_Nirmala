@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
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
                <div class="container py-4">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Form Data Pegawai</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pegawai.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"
                                            class="form-control" readonly>

                                    <div class="col-md-12 mb-3">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" value="{{ @$pegawai->nama_lengkap }}"
                                            class="form-control">
                                    </div>

                                    <!-- Baris 2 -->
                                    <div class="col-md-6 mb-3">
                                        <label for="nip">NIP</label>
                                        <input type="text" name="nip" value="{{ @$pegawai->nip }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" value="{{ @$pegawai->nik }}"
                                            class="form-control">
                                    </div>

                                    <!-- Baris 3 -->
                                    <div class="col-md-6 mb-3">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="L"
                                                {{ @$pegawai->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="P"
                                                {{ @$pegawai->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" value="{{ @$pegawai->tanggal_lahir }}"
                                            class="form-control">
                                    </div>

                                    <!-- Baris 4 -->
                                    <div class="col-md-6 mb-3">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" value="{{ @$pegawai->tempat_lahir }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" class="form-control">{{ @$pegawai->alamat }}</textarea>
                                    </div>

                                    <!-- Baris 5 -->
                                    <div class="col-md-4 mb-3">
                                        <label for="kota">Kota</label>
                                        <input type="text" name="kota" value="{{ @$pegawai->kota }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" name="provinsi" value="{{ @$pegawai->provinsi }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" name="kode_pos" value="{{ @$pegawai->kode_pos }}"
                                            class="form-control">
                                    </div>

                                    <!-- Baris 6 -->
                                    <div class="col-md-6 mb-3">
                                        <label for="no_telepon">No. Telepon</label>
                                        <input type="text" name="no_telepon" value="{{ @$pegawai->no_telepon }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                        <input type="text" name="pendidikan_terakhir"
                                            value="{{ @$pegawai->pendidikan_terakhir }}" class="form-control">
                                    </div>

                                    <!-- Baris 7 -->
                                    <div class="col-md-6 mb-3">
                                        <label for="jenis_pegawai">Jenis Pegawai</label>
                                        <input type="text" name="jenis_pegawai" value="{{ @$pegawai->jenis_pegawai }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" name="jabatan" value="{{ @$pegawai->jabatan }}"
                                            class="form-control">
                                    </div>

                                    <!-- Baris 8 -->
                                    <div class="col-md-6 mb-3">
                                        <label for="unit_kerja">Unit Kerja</label>
                                        <input type="text" name="unit_kerja" value="{{ @$pegawai->unit_kerja }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_masuk">Tanggal Masuk</label>
                                        <input type="date" name="tanggal_masuk" value="{{ @$pegawai->tanggal_masuk }}"
                                            class="form-control">
                                    </div>

                                    <!-- Baris 9 -->
                                    <div class="col-md-6 mb-3">
                                        <label for="bank">Bank</label>
                                        <input type="text" name="bank" value="{{ @$pegawai->bank }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="nomor_rekening">Nomor Rekening</label>
                                        <input type="text" name="nomor_rekening"
                                            value="{{ @$pegawai->nomor_rekening }}" class="form-control">
                                    </div>

                                    <!-- Baris 10 - Foto -->
                                    <div class="col-md-12 mb-3">
                                        <label for="foto">Foto</label><br>
                                        @if (@$pegawai->foto)
                                            <img src="{{ asset('storage/pegawai/foto/' . @$pegawai->foto) }}" alt="Foto Pegawai"
                                                width="400" class="mb-2 rounded shadow">
                                        @endif
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
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
            var name = $(this).data('name');
            var email = $(this).data('email');
            var role = $(this).data('role');
            var faskes = $(this).data('faskes');

            $('#idEdit').val(id);
            $('#nameEdit').val(name);
            $('#emailEdit').val(email);
            $('#roleEdit').val(role);
            $('#faskesEdit').val(faskes);
            $('#formEdit').attr('action', 'akunUpdate/' + id);
        });
    </script>
@endsection
