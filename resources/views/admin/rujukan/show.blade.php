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
                                                <label for="nik" class="form-label">NIK Pasien</label>
                                                <input type="text" class="form-control" value="{{ @$rujukan->nik }}" readonly id="nik" name="nik"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama" value="{{ @$rujukan->nama }}" readonly name="nama"
                                                    required>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="no_rujukan" class="form-label">No Rujukan</label>
                                                <input type="text" class="form-control" id="no_rujukan" value="{{ @$rujukan->No_Rujukan }}" readonly name="no_rujukan"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="dokter_perujuk" class="form-label">Perujuk</label>
                                                <input type="text" class="form-control" id="perujuk" name="perujuk" value="{{ @$rujukan->perujuk }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="profesi" class="form-label">Profesi</label>
                                                <select name="profesi" id="profesi" class="form-control">
                                                    <option value="bidan" {{ @$rujukan->profesi == 'bidan' ? 'selected' : '' }} >Bidan</option>
                                                    <option value="dokter" {{ @$rujukan->profesi == 'dokter' ? 'selected' : '' }} >Dokter</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="subjek" class="form-label">Subjek</label>
                                                <input type="text" class="form-control" id="subjek" value="{{ @$rujukan->subjek }}" readonly name="subjek"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="objek" class="form-label">Objek</label>
                                                <input type="text" class="form-control" id="objek" value="{{ @$rujukan->objek }}" readonly name="objek"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="suhu">Suhu (C)</label>
                                                <input type="number" class="form-control" id="suhu" value="{{ @$rujukan->suhu }}" readonly name="suhu" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="tensi">Tensi (mmHg)</label>
                                                <input type="number" class="form-control" id="tensi" value="{{ @$rujukan->tensi }}" readonly name="tensi"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="berat"> Berat(Kg)</label>
                                                <input type="number" class="form-control" id="berat" name="berat" value="{{ @$rujukan->berat }}" readonly
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="tinggi">Tinggi(CM)</label>
                                                <input type="number" class="form-control" id="tinggi" name="tinggi" value="{{ @$rujukan->tinggi }}" readonly
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="RR">RR(x/menit)</label>
                                                <input type="number" class="form-control" id="RR" name="RR" value="{{ @$rujukan->RR }}" readonly  required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="nadi">Nadi(x/menit)</label>
                                                <input type="number" class="form-control" id="nadi" name="nadi" value="{{ @$rujukan->nadi }}" readonly
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="spo2">SpO2(%)</label>
                                                <input type="number" class="form-control" id="SpO2" name="SpO2" value="{{ @$rujukan->SpO2 }}" readonly
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="gcs">GCS(E,V,M)</label>
                                                <input type="number" class="form-control" id="GCS" name="GCS" value="{{ @$rujukan->GCS }}" readonly    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="kesadaran">Kesadaran</label>
                                                <input type="text" class="form-control" id="Kesadaran" value="{{ @$rujukan->Kesadaran }}" readonly
                                                    name="Kesadaran" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="LP">L.P(CM)</label>
                                                <input type="number" class="form-control" id="LP" value="{{ @$rujukan->LP }}" readonly name="LP" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="alergi">Alergi</label>
                                                <input type="text" class="form-control" id="alergi" value="{{ @$rujukan->Alergi }}" readonly name="Alergi" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="asesmen">Asesmen</label>
                                                <input type="text" class="form-control" id="asesmen" value="{{ @$rujukan->Asesmen }}" readonly  name="Asesmen" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="plan">Plan</label>
                                                <input type="text" class="form-control" id="plan" value="{{ @$rujukan->Plan }}" readonly name="Plan" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="asesmen">Instruksi</label>
                                                <input type="text" class="form-control" id="instruksi" value="{{ @$rujukan->Instruksi }}" readonly name="Instruksi" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="plan">Evaluasi</label>
                                                <input type="text" class="form-control" id="evaluasi" value="{{ @$rujukan->Evaluasi }}" readonly name="Evaluasi" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" value="{{ @$rujukan->Keterangan }}" readonly name="keterangan"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="berkas">Berkas (png, jpg, jpeg, pdf)</label>
                                        @if ($rujukan->Berkas == null)
                                            <p class="text-danger">Berkas belum tersedia.</p>
                                        @else
                                            <img src="{{ asset('storage/berkas/'.$rujukan->Berkas) }}" alt="" class="img-fluid" id="previewEdit">
                                        @endif
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
