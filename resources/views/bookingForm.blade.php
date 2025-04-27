@extends('template.master')
@section('content')
    <div class="bg-[#8BF0AB] min-h-screen p-6">
        <div class="max-w-7xl mx-auto grid  gap-6">

            <div class="bg-white rounded-xl shadow-md p-4">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Booking Form</h2>
                <hr>
                <br>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="jenis_pasien">Jenis Pasien</label>
                            <select name="jenis_pasien" id="jenis_pasien" class="w-full border rounded-md p-2 mt-1">
                                <option value="Umum">Umum</option>
                                <option value="BPJS">BPJS</option>
                            </select>
                        </div>
                        <div>
                            <label for="tanggal_booking">Tanggal Booking</label>
                            <input type="date" name="tanggal_booking" id="tanggal_booking" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"
                                class="w-full border rounded-md p-2 mt-1" required>
                        </div>
                        <div>
                            <label for="poliklinik_id">Poliklinik</label>
                            <select name="poliklinik_id" id="poliklinik_id" class="w-full border rounded-md p-2 mt-1">
                               
                            </select>
                        </div>
                        <div>
                            <label for="dokter_id">Dokter</label>
                            <select name="dokter_id" id="dokter_id" class="w-full border rounded-md p-2 mt-1">
                               
                            </select>
                        </div>
                        <div>
                            <label for="jadwal_dokter">Jadwal</label>
                            <select name="jadwal_dokter_id" id="jadwal_dokter_id" class="w-full border rounded-md p-2 mt-1">
                                
                            </select>
                        </div>
                        <div>
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" class="w-full border rounded-md p-2 mt-1"
                                placeholder="Masukkan NIK Anda" required>
                        </div>
                        <div>
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="w-full border rounded-md p-2 mt-1"
                                placeholder="Masukkan Nama Lengkap Anda" required>
                        </div>
                        <div>
                            <label for="no_hp">No Hp</label>
                            <input type="text" name="no_hp" id="no_hp" class="w-full border rounded-md p-2 mt-1"
                                placeholder="Masukkan No Hp Anda" required>
                        </div>
                        
                    </div>
                    <hr class="mt-6 mb-6">
                    <div class="mt-4 text-end">
                        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">
                            Submit
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('#tanggal_booking').on('change', function () {
        let tanggal = $(this).val();
        if (tanggal) {
            $.get('/get-poliklinik-by-tanggal', { tanggal: tanggal }, function (response) {
                $('#poliklinik_id').empty().append('<option value="">Pilih Poliklinik</option>');
                $.each(response.polikliniks, function (index, poliklinik) {
                    $('#poliklinik_id').append(`<option value="${poliklinik.id}">${poliklinik.name}</option>`);
                });
            });
        }
    });
</script>
<script>
    // Saat memilih poliklinik
    $('#poliklinik_id').on('change', function () {
        const poliklinikID = $(this).val();
        if (poliklinikID) {
            $.get(`/get-dokter-by-poliklinik/${poliklinikID}`, function (data) {
                $('#dokter_id').empty().append('<option value="">Pilih Dokter</option>');
                $('#jadwal_dokter_id').empty().append('<option value="">Pilih Jadwal</option>');
                $.each(data, function (key, value) {
                    $('#dokter_id').append(`<option value="${value.id}">${value.name}</option>`);
                });
            });
        }
    });

    // Saat memilih dokter
    $('#dokter_id').on('change', function () {
        const dokterID = $(this).val();
        if (dokterID) {
            $.get(`/get-jadwal-by-dokter/${dokterID}`, function (data) {
                $('#jadwal_dokter_id').empty().append('<option value="">Pilih Jadwal</option>');
                $.each(data, function (key, value) {
                    $('#jadwal_dokter_id').append(`<option value="${value.id}">${value.hari} (${value.jam_mulai} - ${value.jam_selesai})</option>`);
                });
            });
        }
    });
</script>
@endsection