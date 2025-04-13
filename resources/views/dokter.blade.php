@extends('template.master')
@section('content')
    <div class="bg-[#8BF0AB] min-h-screen p-6">
        <div class="max-w-7xl mx-auto grid  gap-6">

            <!-- Konten Utama -->
            <div class="md:col-span-2 bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Dokter</h2>
                <hr>
                <!-- Grid poliklinik -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
                    @foreach ($dokters as $dokter)
                        <!-- Card -->
                        <div class="swiper-slide w-full">
                            <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                                <!-- Background hijau hanya di bagian atas -->
                                <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                    <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                                </div>

                                <!-- Konten -->
                                <div class="relative z-10 p-4 flex flex-col items-center">
                                    <!-- Foto -->
                                    <img src="{{ asset('storage/dokter/' . ($dokter->foto ?? $dokter->dokter->foto)) }}" alt="Foto Dokter"
                                        class="w-[220px] h-[320px] object-cover border-4 border-white shadow-lg mb-4">

                                    <!-- Nama dan Poliklinik -->
                                    <div class="text-center mt-2 w-full">
                                        <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                            {{ $dokter->poliklinik->name ?? ($poliklinik->name ?? '-') }}</p>
                                        <p class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                            {{ $dokter->name ?? $dokter->dokter->name }}</p>
                                    </div>

                                    <!-- Jadwal -->
                                    @php
                                        $realDokter =
                                            $dokter instanceof \App\Models\JadwalDokter ? $dokter->dokter : $dokter;
                                        $jadwals =
                                            $dokter instanceof \App\Models\JadwalDokter
                                                ? collect([$dokter])
                                                : $realDokter->jadwal;
                                    @endphp

                                    <div class="mt-2">
                                        @if ($jadwals && $jadwals->count())
                                            <ul class="text-sm text-gray-600 text-left">
                                                @foreach ($jadwals as $jadwal)
                                                    <li>{{ $jadwal->hari }} - {{ $jadwal->jam_mulai }} s/d
                                                        {{ $jadwal->jam_selesai }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-sm text-red-500 italic">Belum diatur</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <!-- Pagination -->
                <div class="flex justify-center mt-8">
                    {{ $dokters->links() }}
                </div>
            </div>


        </div>
    </div>
@endsection
