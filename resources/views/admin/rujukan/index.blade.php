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
                                    <th>Perujuk</th>
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
                                        <td>{{ $rujukan->perujuk }}</td>

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
                                                    @if ($rujukan->status == 'menunggu')
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                            class="btn btn-danger text-white"><i
                                                                class="fa-solid fa-trash"></i>Delete</button>
                                                    @endif
                                                @endif
                                                @if (Auth::user()->role == 'faskes1')
                                                    @if ($rujukan->status == 'menunggu')
                                                        <button type="button" class="btn btn-warning text-white btn-edit"
                                                            data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                            data-id="{{ $rujukan->id }}" data-nama="{{ $rujukan->nama }}"
                                                            data-nik="{{ $rujukan->nik }}"
                                                            data-no_rujukan="{{ $rujukan->No_Rujukan }}"
                                                            data-perujuk="{{ $rujukan->perujuk }}"
                                                            data-profesi="{{ $rujukan->profesi }}"
                                                            data-subjek="{{ $rujukan->subjek }}"
                                                            data-objek="{{ $rujukan->objek }}"
                                                            data-suhu="{{ $rujukan->suhu }}"
                                                            data-tensi="{{ $rujukan->tensi }}"
                                                            data-berat="{{ $rujukan->berat }}"
                                                            data-tinggi="{{ $rujukan->tinggi }}"
                                                            data-rr="{{ $rujukan->RR }}" data-nadi="{{ $rujukan->nadi }}"
                                                            data-spo2="{{ $rujukan->SpO2 }}"
                                                            data-gcs="{{ $rujukan->GCS }}"
                                                            data-kesadaran="{{ $rujukan->Kesadaran }}"
                                                            data-lp="{{ $rujukan->LP }}"
                                                            data-alergi="{{ $rujukan->Alergi }}"
                                                            data-asesmen="{{ $rujukan->Asesmen }}"
                                                            data-plan="{{ $rujukan->Plan }}"
                                                            data-instruksi="{{ $rujukan->Instruksi }}"
                                                            data-evaluasi="{{ $rujukan->Evaluasi }}"
                                                            data-berkas="{{ $rujukan->Berkas }}"
                                                            data-keterangan="{{ $rujukan->Keterangan ?? '-' }}">
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
                    <div class="modal-dialog modal-lg ">
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
                                                <label for="nik" class="form-label">NIK Pasien</label>
                                                <input type="text" class="form-control" id="nik" name="nik"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="no_rujukan" class="form-label">No Rujukan</label>
                                                <input type="text" class="form-control" id="no_rujukan"
                                                    name="no_rujukan" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="dokter_perujuk" class="form-label">Perujuk</label>
                                                <input type="text" class="form-control" id="perujuk" name="perujuk"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="profesi" class="form-label">Profesi</label>
                                                <select name="profesi" id="profesi" class="form-control">
                                                    <option value="bidan">Bidan</option>
                                                    <option value="dokter">Dokter</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="subjek" class="form-label">Subjek</label>
                                                <input type="text" class="form-control" id="subjek" name="subjek"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="objek" class="form-label">Objek</label>
                                                <input type="text" class="form-control" id="objek" name="objek"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="suhu">Suhu (C)</label>
                                                <input type="number" class="form-control" id="suhu" name="suhu"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="tensi">Tensi (mmHg)</label>
                                                <input type="number" class="form-control" id="tensi" name="tensi"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="berat"> Berat(Kg)</label>
                                                <input type="number" class="form-control" id="berat" name="berat"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="tinggi">Tinggi(CM)</label>
                                                <input type="number" class="form-control" id="tinggi" name="tinggi"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="RR">RR(x/menit)</label>
                                                <input type="number" class="form-control" id="RR" name="RR"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="nadi">Nadi(x/menit)</label>
                                                <input type="number" class="form-control" id="nadi" name="nadi"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="spo2">SpO2(%)</label>
                                                <input type="number" class="form-control" id="SpO2" name="SpO2"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="gcs">GCS(E,V,M)</label>
                                                <input type="number" class="form-control" id="GCS" name="GCS"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="kesadaran">Kesadaran</label>
                                                <input type="text" class="form-control" id="Kesadaran"
                                                    name="Kesadaran" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="LP">L.P(CM)</label>
                                                <input type="number" class="form-control" id="LP" name="LP"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="alergi">Alergi</label>
                                                <input type="text" class="form-control" id="alergi" name="Alergi"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="asesmen">Asesmen</label>
                                                <input type="text" class="form-control" id="asesmen" name="Asesmen"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="plan">Plan</label>
                                                <input type="text" class="form-control" id="plan" name="Plan"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="asesmen">Instruksi</label>
                                                <input type="text" class="form-control" id="instruksi"
                                                    name="Instruksi" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="plan">Evaluasi</label>
                                                <input type="text" class="form-control" id="evaluasi"
                                                    name="Evaluasi" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="berkas">Berkas (png, jpg, jpeg, pdf)</label>
                                        <input type="file" class="form-control" id="berkas" name="Berkas">
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
                                <div class="row">
                                    <div class="col">
                                        <label for="nikEdit" class="form-label">NIK Pasien</label>
                                        <input type="text" class="form-control" id="nikEdit" name="nik"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="namaEdit" class="form-label">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namaEdit" name="nama"
                                            required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="no_rujukanEdit" class="form-label">No Rujukan</label>
                                        <input type="text" class="form-control" id="no_rujukanEdit" name="no_rujukan"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="perujukEdit" class="form-label">Perujuk</label>
                                        <input type="text" class="form-control" id="perujukEdit" name="perujuk"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="profesiEdit" class="form-label">Profesi</label>
                                        <select name="profesi" id="profesiEdit" class="form-control" required>
                                            <option value="bidan">Bidan</option>
                                            <option value="dokter">Dokter</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="subjekEdit" class="form-label">Subjek</label>
                                        <input type="text" class="form-control" id="subjekEdit" name="subjek"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="objekEdit" class="form-label">Objek</label>
                                        <input type="text" class="form-control" id="objekEdit" name="objek"
                                            required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="suhuEdit" class="form-label">Suhu (°C)</label>
                                        <input type="number" class="form-control" id="suhuEdit" name="suhu"
                                            step="0.1" required>
                                    </div>
                                    <div class="col">
                                        <label for="tensiEdit" class="form-label">Tensi (mmHg)</label>
                                        <input type="number" class="form-control" id="tensiEdit" name="tensi"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="beratEdit" class="form-label">Berat (Kg)</label>
                                        <input type="number" class="form-control" id="beratEdit" name="berat"
                                            step="0.1" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="tinggiEdit" class="form-label">Tinggi (cm)</label>
                                        <input type="number" class="form-control" id="tinggiEdit" name="tinggi"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="RRedit" class="form-label">RR (x/menit)</label>
                                        <input type="number" class="form-control" id="RRedit" name="RR"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="nadiEdit" class="form-label">Nadi (x/menit)</label>
                                        <input type="number" class="form-control" id="nadiEdit" name="nadi"
                                            required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="SpO2Edit" class="form-label">SpO2 (%)</label>
                                        <input type="number" class="form-control" id="SpO2Edit" name="SpO2"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="GCSEdit" class="form-label">GCS (E,V,M)</label>
                                        <input type="text" class="form-control" id="GCSEdit" name="GCS"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="KesadaranEdit" class="form-label">Kesadaran</label>
                                        <input type="text" class="form-control" id="KesadaranEdit" name="Kesadaran"
                                            required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="LPEdit" class="form-label">L.P (cm)</label>
                                        <input type="number" class="form-control" id="LPEdit" name="LP"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="AlergiEdit" class="form-label">Alergi</label>
                                        <input type="text" class="form-control" id="AlergiEdit" name="Alergi"
                                            required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="AsesmenEdit" class="form-label">Asesmen</label>
                                        <input type="text" class="form-control" id="AsesmenEdit" name="Asesmen"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="PlanEdit" class="form-label">Plan</label>
                                        <input type="text" class="form-control" id="PlanEdit" name="Plan"
                                            required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="InstruksiEdit" class="form-label">Instruksi</label>
                                        <input type="text" class="form-control" id="InstruksiEdit" name="Instruksi"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label for="EvaluasiEdit" class="form-label">Evaluasi</label>
                                        <input type="text" class="form-control" id="EvaluasiEdit" name="Evaluasi"
                                            required>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label for="keteranganEdit" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keteranganEdit" name="keterangan"
                                        required>
                                </div>

                                <div class="mt-3">
                                    <label for="berkasEdit" class="form-label">Berkas (png, jpg, jpeg, pdf)</label>
                                    <input type="file" class="form-control" id="berkasEdit" name="Berkas">

                                    <div class="mt-2" id="previewBerkasContainer">
                                        <img id="previewBerkasEdit" src="#" alt="Preview Gambar"
                                            class="img-fluid" style="max-height: 200px; display: none;">
                                        <a id="previewPdfLink" href="#" target="_blank"
                                            class="btn btn-sm btn-outline-primary mt-2" style="display: none;">Lihat
                                            PDF</a>
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

        // Mengisi data ke dalam modal edit
        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var nik = $(this).data('nik');
            var no_rujukan = $(this).data('no_rujukan');
            var perujuk = $(this).data('perujuk');
            var profesi = $(this).data('profesi');
            var subjek = $(this).data('subjek');
            var objek = $(this).data('objek');
            var suhu = $(this).data('suhu');
            var tensi = $(this).data('tensi');
            var berat = $(this).data('berat');
            var tinggi = $(this).data('tinggi');
            var rr = $(this).data('rr');
            var nadi = $(this).data('nadi');
            var spo2 = $(this).data('spo2');
            var gcs = $(this).data('gcs');
            var kesadaran = $(this).data('kesadaran');
            var lp = $(this).data('lp');
            var alergi = $(this).data('alergi');
            var asesmen = $(this).data('asesmen');
            var plan = $(this).data('plan');
            var instruksi = $(this).data('instruksi');
            var evaluasi = $(this).data('evaluasi');
            var keterangan = $(this).data('keterangan');
            var berkas = $(this).data('berkas'); // path URL file berkas

            $('#namaEdit').val(nama);
            $('#nikEdit').val(nik);
            $('#no_rujukanEdit').val(no_rujukan);
            $('#perujukEdit').val(perujuk);
            $('#profesiEdit').val(profesi);
            $('#subjekEdit').val(subjek);
            $('#objekEdit').val(objek);
            $('#suhuEdit').val(suhu);
            $('#tensiEdit').val(tensi);
            $('#beratEdit').val(berat);
            $('#tinggiEdit').val(tinggi);
            $('#RRedit').val(rr);
            $('#nadiEdit').val(nadi);
            $('#SpO2Edit').val(spo2);
            $('#GCSEdit').val(gcs);
            $('#KesadaranEdit').val(kesadaran);
            $('#LPEdit').val(lp);
            $('#AlergiEdit').val(alergi);
            $('#AsesmenEdit').val(asesmen);
            $('#PlanEdit').val(plan);
            $('#InstruksiEdit').val(instruksi);
            $('#EvaluasiEdit').val(evaluasi);
            $('#keteranganEdit').val(keterangan);
            $('#formEdit').attr('action', '{{ url('rujukan') }}/' + id);

            // Preview gambar/pdf jika ada
            if (berkas) {
                let ekstensi = berkas.split('.').pop().toLowerCase();
                if (['jpg', 'jpeg', 'png'].includes(ekstensi)) {
                    $('#previewBerkasEdit').attr('src', 'storage/berkas/' + berkas).show(); // Set src dari <img> dengan data file').show();
                } else {
                    $('#previewBerkasEdit').hide();
                }
            } else {
                $('#previewBerkasEdit').hide();
            }
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
