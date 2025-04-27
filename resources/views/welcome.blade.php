@extends('template.master')
@section('content')
    {{-- jumbotron --}}
    <div id="controls-carousel" class="relative w-full h-[400px] md:h-[600px]" data-carousel="static"
        style="position: relative; z-index: 1;">
        <!-- Carousel wrapper -->
        <div class="relative h-[400px] md:h-[600px] overflow-hidden ">
            @foreach ($sliders as $slider)
                <!-- Item 1 -->
                <div class="hidden duration-1000 ease-in-out transition-all" data-carousel-item>
                    <img src="{{ asset('images/slider/' . $slider->gambar) }}" class="w-full h-full object-cover"
                        alt="...">
                </div>
            @endforeach

        </div>

        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    {{-- dokter filter --}}

    <section
        class="h-[1550px] md:h-[600px] bg-cover bg-center  bg-no-repeat mt-[-140px] md:mt-[-10px] bg-[url('https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg')] bg-green-900 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <div class="container mx-auto p-5 md:mt-[-280px] relative z-10 ">
                <div class="text-center rounded-lg bg-gray-200 pb-2">
                    <h1 class="text-2xl font-bold text-green-600">Cari Dokter</h1>
                    <p class="text-gray-600">Cari dan Temukan Jadwal Dokter dan Buat Janji dengan Dokter Ahli,
                        Spesialis dan Umum</p>
                </div>
                <div class="bg-white rounded shadow-md p-6" style="margin-top: -8px">
                    <form action="{{ route('jadwal.cari') }}" method="post">
                        @csrf
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Dokter</label>
                                <select name="dokter_id" id="dokter_id" required
                                    class="form-control mt-1 block w-full border-2 border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500">
                                    <option value="">Pilih Dokter</option>
                                    @foreach ($dokters as $dokter)
                                        <option value="{{ $dokter->id }}">{{ $dokter->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Spesialisasi</label>
                                <select name="poliklinik_id" id="poli" required
                                    class="mt-1 block w-full border-2 border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500">
                                    <option>Pilih Spesialis</option>
                                    @foreach ($polikliniks as $poliklinik)
                                        <option value="{{ $poliklinik->id }}">{{ $poliklinik->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pilihan Hari</label>
                                <input required type="date" name="tanggal" id="tanggal"
                                    class="mt-1 block w-full border-2 border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500" />
                            </div>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <button type="reset"
                                class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Reset</button>
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cari
                                Dokter</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach ($unggulans as $key => $unggulan)
                    <div class="relative bg-gray-200 w-full md:w-72 lg:w-80 h-auto p-6 text-center rounded-lg shadow-lg">
                        <div class="flex justify-center mb-4">
                            <img src="{{ asset('images/unggulan/' . $unggulan->image) }}" alt="Icon"
                                class="w-40 h-40 object-cover rounded-sm shadow-md">
                        </div>
                        <p class="text-xl font-semibold text-gray-800">{{ $unggulan->title }}</p>
                        <p class="text-sm text-gray-600 mt-2">{{ $unggulan->description }}</p>
                        <div
                            class="absolute -bottom-5 right-5 bg-green-600 text-white w-10 h-10 flex items-center justify-center text-lg font-bold rounded-full">
                            {{ $key + 1 }}
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    @if (session('errorJadwal'))
    <div id="alert" class="fixed top-5 right-5 bg-red-200 border border-red-500 text-red-800 px-8 py-5 rounded-xl shadow-2xl flex items-center space-x-4 scale-0 opacity-0 transition-all duration-500 origin-top-right z-50 text-lg">
        <i class="fa-solid fa-square-xmark fa-xl"></i>
        <div>
            <strong class="font-bold">Oops!</strong>
            <span class="block">{{ session('errorJadwal') }}</span>
        </div>
        <button onclick="hideAlert()" class="text-red-600 hover:text-red-800 ml-4">
            ✖
        </button>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const alert = document.getElementById('alert');
            alert.classList.remove('scale-0', 'opacity-0');
            alert.classList.add('scale-100', 'opacity-100');

            setTimeout(() => {
                hideAlert();
            }, 5000);
        });

        function hideAlert() {
            const alert = document.getElementById('alert');
            if (alert) {
                alert.classList.remove('scale-100', 'opacity-100');
                alert.classList.add('scale-0', 'opacity-0');
                setTimeout(() => alert.remove(), 500); // 0.5 detik setelah animasi
            }
        }
    </script>
@endif



    {{-- berita dan artikel --}}
    <section class="relative bg-center bg-no-repeat pt-10 pb-5 bg-green-300 bg-blend-multiply overflow-hidden">

        <!-- Hiasan Lingkaran Seperempat di Pojok Kiri Atas -->
        <div class="absolute top-0 left-0 w-40 h-40 bg-green-700 rounded-br-full z-0"></div>
        <!-- Hiasan Lingkaran Seperempat di Pojok Kiri Atas -->
        <div class="absolute bottom-0 right-0 w-40 h-40 bg-green-700 opacity-50 rounded-tl-full z-0"></div>
        <!-- Header -->
        <div class="text-center mb-6 relative z-10">
            <div class="bg-green-700 px-6 py-3 inline-block rounded-lg shadow">
                <h2 class="text-2xl md:text-2xl font-bold text-white">Berita & Artikel</h2>
                <hr>
                <p class="text-green-100 mt-1 text-sm">Berita dan Artikel Kesehatan Terbaru</p>
            </div>
        </div>

        @if ($beritas->isEmpty())
            <div class="text-center mb-6 relative z-10">
                <div class="bg-white px-6 py-3 inline-block rounded-lg shadow">
                    <h2 class="text-2xl md:text-2xl font-bold text-green-700">Berita & Artikel Tidak Tersedia</h2>
                    <hr>
                </div>
            </div>
        @endif

        <!-- Filter Buttons -->
        <div class="flex justify-start ml-20 gap-3 mb-4 relative z-10">
            {{-- <button
                class="bg-green-200 text-green-900 px-4 py-2 rounded-full font-semibold hover:bg-green-300 transition">All</button>
            <button
                class="bg-white border border-green-400 text-green-900 px-4 py-2 rounded-full font-semibold hover:bg-green-100 transition">Artikel</button>
            <button
                class="bg-white border border-green-400 text-green-900 px-4 py-2 rounded-full font-semibold hover:bg-green-100 transition">Pengumuman</button> --}}
        </div>
        <!-- Grid Berita -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto relative z-10">
            @foreach ($beritas as $berita)
                <!-- Card -->
                <div class="bg-white rounded-xl shadow p-4 m-2">
                    <img src="{{ asset('images/berita/' . $berita->gambar) }}" alt="berita"
                        class="rounded-xl w-full h-48 object-cover mb-3" />
                    <p class="text-sm text-gray-500">{{ date('d F Y', strtotime($berita->created_at)) }}</p>
                    <h3 class="font-semibold text-md mt-1">{{ $berita->judul }}</h3>
                    <p class="text-sm mt-2 text-gray-600">{{ Str::limit($berita->deskripsi, 80) }}
                        <a href="{{ route('berita.show', $berita->slug) }}" class="font-semibold text-green-700">Baca
                            Selengkapnya</a>
                    </p>
                </div>
                <!-- Ulangi card di atas untuk item ke-2 dan ke-3 -->
                <!-- Bisa disalin 2x atau dibuat loop kalau pakai framework JS -->
            @endforeach
        </div>
        <!-- Tombol Lihat Semua -->
        <div class="flex justify-end mt-4 mr-20 relative z-10">
            <a href="{{ route('berita.selengkapnya') }}"
                class="bg-green-700 text-white font-semibold px-6 py-2 rounded-full hover:bg-green-800 transition">Lihat
                Semua</a>
        </div>
    </section>

    {{-- profil --}}
    <section
        class="relative bg-cover bg-center bg-no-repeat bg-[url('https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg')] bg-green-900 bg-blend-multiply py-12 overflow-hidden">

        <!-- Lingkaran pojok kanan bawah -->
        <div class="absolute bottom-0 right-0 w-32 h-32 bg-green-700 opacity-50 rounded-tl-full z-0"></div>

        <div class="relative z-10 container mx-auto px-4 md:flex md:items-start md:gap-10">
            <!-- Kolom Kiri -->
            <div class="md:w-1/2 text-white mb-8 md:mb-0">
                <div class="border-l-8 border-white pl-4 mb-4">
                    <h2 class="text-3xl md:text-4xl font-bold leading-tight">
                        Rumah Sakit Ibu & Anak<br>Nirmala Kediri
                    </h2>
                </div>

                <!-- Video -->
                <div class="aspect-video w-full rounded-md overflow-hidden">
                    <iframe class="w-full h-full "
                        src="{{ @$profil->youtube != null ? @$profil->youtube : 'https://www.youtube.com/embed/9RZ0H4xY0Bw' }}"
                        frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="md:w-1/2 bg-gray-100 text-black p-6 rounded-lg shadow-md text-justify  md:min-h-[500px]">
                <p class="text-md md:text-lg ">
                    {{ @$profil->tentang != null ? @$profil->tentang : 'Sambutan Direktur belum tersedia.' }}
                </p>
            </div>
        </div>
    </section>



    <section class="bg-green-300 relative z-10 py-10 px-6 md:px-16">
        <div class="text-center mb-6 relative z-10">
            <div class="bg-green-700 px-6 py-3 inline-block rounded-lg shadow">
                <h2 class="text-2xl md:text-2xl font-bold text-white">Pelayanan Kami</h2>
                <hr>
                <p class="text-green-100 mt-1 text-sm">Pelayanan Kami</p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row md:items-start md:justify-end">
            <!-- Kiri -->
            <div class="w-full mb-10 md:mb-0 pl-2  pt-10  md:w-1/4 flex flex-col justify-between gap-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-black leading-snug">
                        Apa saja <br>
                        <span class="text-green-700 font-bold text-3xl md:text-4xl">Pelayanan</span><br>
                        di RSIA NIRMALA ?
                    </h2>
                    <div class="w-24 h-1 bg-green-700 mt-2"></div>
                </div>
                <a href="{{ route('pelayanan.lengkap') }}"
                    class="inline-block bg-green-700 text-white px-4 py-2 text-sm mt-4 rounded-md w-fit">
                    Lihat Semua
                </a>
            </div>

            <!-- Kanan - Kartu Pelayanan -->
            <!-- Carousel Kartu Pelayanan -->
            <div class="md:w-3/4 mx-auto w-full">
                <div class="swiper mySwiper h-[320px] w-full">
                    <div class="swiper-wrapper">
                        @foreach ($pelayanans as $pelayanan)
                            <!-- Card 1 -->
                            <div class="swiper-slide w-full ">
                                <div
                                    class="bg-gray-100 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center space-y-3">
                                    <img src="{{ asset('storage/pelayanan/' . $pelayanan->image1) }}" alt="berita"
                                        class="rounded-xl w-[130px] h-[100px] object-fit mb-3" />

                                    <h3 class="text-green-700 font-bold text-lg text-center">{{ $pelayanan->name }}</h3>
                                    <div class="w-16 h-1 bg-green-700"></div>
                                    <p class="text-sm text-gray-800 text-center">
                                        {{ Str::limit($pelayanan->deskripsi, 20) }}</p>
                                    <a href="{{ route('pelayanan.show', $pelayanan->slug) }}"
                                        class="text-white bg-green-700 px-4 py-2 text-sm rounded-md">Selengkapnya</a>
                                    <div
                                        class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                        {{ $loop->iteration }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Optional: Navigasi & Pagination -->
                    <div class="swiper-pagination mt-6"></div>
                    <div class="swiper-button-prev text-green-700"></div>
                    <div class="swiper-button-next text-green-700"></div>
                </div>
            </div>

        </div>
    </section>

    <section
        class="relative bg-cover bg-center bg-no-repeat bg-[url('https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg')] bg-green-900 bg-blend-multiply py-12 overflow-hidden">
        <div class="text-center mb-6 relative z-10">
            <div class="bg-green-700 px-6 py-3 pb-8 inline-block rounded-lg shadow">
                <h2 class="text-2xl md:text-2xl font-bold text-white">Dokter Kami</h2>
                <hr>
            </div>
        </div>

        <!-- Carousel Kartu Pelayanan -->
        <div class="md:w-3/4 mx-auto w-full">
            <div class="swiper mySwiperDokter h-full w-full">
                <div class="swiper-wrapper ml-10 md:ml-0">
                    @foreach ($dokters as $dokter)
                        <!-- Card 1 -->
                        <div class="swiper-slide w-full ">
                            <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                                <!-- Background hijau hanya di bagian atas -->
                                <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                    <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                                </div>

                                <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                                <div class="relative z-10 p-4 flex flex-col items-center">
                                    <img src="{{ asset('storage/dokter/' . $dokter->foto) }}" alt="Foto Dokter"
                                        class="w-[320px] h-[420px] object-cover  border-4 border-white shadow-lg mb-4">

                                    <div class="text-center mt-2 w-full">
                                        <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                            {{ $dokter->poliklinik->name }}</p>
                                        <p
                                            class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                            {{ $dokter->name }}</p>
                                        {{-- Jadwal --}}
                                        <div class="mt-2">
                                            @if ($dokter->jadwal->isNotEmpty())
                                                <ul class="text-sm text-gray-600">
                                                    @foreach ($dokter->jadwal as $jadwal)
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
                        </div>
                    @endforeach
                </div>


                <!-- Optional: Navigasi & Pagination -->
                <div class="swiper-pagination mt-6"></div>
                <div class="swiper-button-prev text-green-700"></div>
                <div class="swiper-button-next text-green-700"></div>
            </div>
        </div>
    </section>
    <section class="bg-green-300 relative z-10 py-10 px-6 md:px-16">
        <div class="text-center mb-6 relative z-10">
            <div class="bg-green-700 px-6 py-3 inline-block rounded-lg shadow">
                <h2 class="text-2xl md:text-2xl font-bold text-white">Promo Spesial</h2>
                <hr>
                <p class="text-green-100 mt-1 text-sm">Promo Kesehatan Terbaru</p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row md:items-start md:justify-end">
            <!-- Kiri -->
            <div class="w-full mb-10 md:mb-0 pl-2  pt-10  md:w-1/4 flex flex-col justify-between gap-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-black leading-snug">
                        Apa saja <br>
                        <span class="text-green-700 font-bold text-3xl md:text-4xl">Promo Spesial</span><br>
                        di RSIA NIRMALA ?
                    </h2>
                    <div class="w-24 h-1 bg-green-700 mt-2"></div>
                </div>
                <a href="{{ route('promotion.selengkapnya') }}"
                    class="inline-block bg-green-700 text-white px-4 py-2 text-sm mt-4 rounded-md w-fit">
                    Lihat Semua
                </a>
            </div>

            <!-- Kanan - Kartu Pelayanan -->
            <!-- Carousel Kartu Pelayanan -->
            <div class="md:w-3/4 mx-auto w-full">
                <div class="swiper mySwiper h-[420px] w-full">

                    <div class="swiper-wrapper">
                        @foreach ($promotions as $promotion)
                            <!-- Swiper Slide -->
                            <div class="swiper-slide w-full flex justify-center">
                                <div
                                    class="group relative h-[400px] bg-cover bg-center bg-[url('{{ asset('storage/promotion/' . $promotion->image) }}')] rounded-lg shadow-md p-4 w-full max-w-xs flex flex-col justify-center items-center space-y-3 overflow-visible transition-all duration-500">

                                    <!-- Overlay gelap saat hover -->
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-500 rounded-lg z-0">
                                    </div>

                                    <!-- Judul -->
                                    <h3
                                        class="text-green-700 group-hover:text-white font-bold text-lg text-center opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-2 transition duration-500 delay-100 z-10">
                                        {{ $promotion->title }}
                                    </h3>

                                    <!-- Garis bawah -->
                                    <div
                                        class="w-16 h-1 bg-green-700 group-hover:bg-white opacity-0 group-hover:opacity-100 transform group-hover:translate-y-0 translate-y-2 transition duration-500 delay-200 z-10">
                                    </div>

                                    <!-- Tombol -->
                                    <button onclick="showModal('modalImage')"
                                        data-image="{{ asset('storage/promotion/' . $promotion->image) }}"
                                        class="text-white bg-green-700 px-4 py-2 text-sm rounded-md opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 scale-95 group-hover:scale-100 transition duration-500 delay-300 z-10">
                                        Selengkapnya
                                    </button>

                                    <!-- Angka pojok kanan bawah -->
                                    <div
                                        class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800 z-10">
                                        {{ $loop->iteration }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <!-- Optional: Navigasi & Pagination -->
                    <div class="swiper-pagination mt-6"></div>
                    <div class="swiper-button-prev text-green-700"></div>
                    <div class="swiper-button-next text-green-700"></div>
                </div>
            </div>

        </div>
    </section>


    <section
        class="relative bg-cover bg-center bg-no-repeat bg-[url('https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg')] bg-green-900 bg-blend-multiply py-12 overflow-hidden">

        <div class="swiper myMainSwiper w-full">
            <div class="swiper-wrapper">
                @foreach ($promosiUnggulans as $promosiUnggulan)
                    <!-- Slide 1 -->
                    <div
                        class="swiper-slide flex flex-col md:flex-row items-center bg-green-700 bg-opacity-20 text-white rounded-lg overflow-hidden p-6">

                        <!-- Teks -->
                        <div class="w-full md:w-1/2 space-y-4">
                            <div class="border-l-8 border-white pl-4 mb-4">
                                <h2 class="text-3xl md:text-4xl font-bold leading-tight">
                                    Rumah Sakit Ibu & Anak<br>Nirmala Kediri
                                </h2>
                            </div>
                            <h2 class="text-xl font-bold">FASILITAS UNGGULAN</h2>
                            <h4 class="text-xl mt-4 font-semibold text-white">{{ $promosiUnggulan->name }}</h4>
                            <p class="text-sm">
                                {{ Str::limit($promosiUnggulan->description, 100) }}
                            </p>
                            <a href="{{ route('promosiUnggulan.show', $promosiUnggulan->id) }}"
                                class="text-white underline">Selengkapnya</a>
                        </div>

                        <!-- Gambar -->
                        <div class="w-full md:w-1/2 mt-6 md:mt-0 md:pl-6">
                            <div class="swiper imageSwiper rounded-lg overflow-hidden">
                                <div class="swiper-wrapper">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @php
                                            $image = 'image' . $i;
                                        @endphp
                                        @if (!empty($promosiUnggulan->$image))
                                            <div class="swiper-slide">
                                                <div
                                                    class="border border-gray-300 rounded-xl p-3 shadow-md hover:shadow-lg transition duration-300 bg-white">
                                                    <img src="{{ asset('storage/fasilitasUnggulan/' . $promosiUnggulan->$image) }}"
                                                        alt="Gambar Artikel"
                                                        class="w-full h-auto rounded-lg object-cover" />
                                                </div>
                                            </div>
                                        @endif
                                    @endfor

                                </div>
                                <div class="swiper-button-next text-white"></div>
                                <div class="swiper-button-prev text-white"></div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="swiper-pagination mt-4"></div>
        </div>
    </section>



    <section class="bg-green-300 relative z-10 py-10 px-6 md:px-16">
        <div class="text-center mb-6 relative z-10">
            <div class="bg-green-700 px-6 py-3 inline-block rounded-lg shadow">
                <h2 class="text-2xl md:text-2xl font-bold text-white">Poliklinik</h2>
                <hr>
                <p class="text-green-100 mt-1 text-sm">Pelayanan Kami</p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row md:items-start md:justify-end">
            <!-- Kiri -->
            <div class="w-full mb-10 md:mb-0 pl-2  pt-10  md:w-1/4 flex flex-col justify-between gap-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-black leading-snug">
                        Apa saja <br>
                        <span class="text-green-700 font-bold text-3xl md:text-4xl">Poliklinik</span><br>
                        di RSIA NIRMALA ?
                    </h2>
                    <div class="w-24 h-1 bg-green-700 mt-2"></div>
                </div>
                <a href="{{ route('poliklinik.lengkap') }}"
                    class="inline-block bg-green-700 text-white px-4 py-2 text-sm mt-4 rounded-md w-fit">
                    Lihat Semua
                </a>
            </div>

            <!-- Kanan - Kartu poliklinik -->
            <!-- Carousel Kartu poliklinik -->
            <div class="md:w-3/4 mx-auto w-full">
                <div class="swiper mySwiper h-[320px] w-full">
                    <div class="swiper-wrapper">
                        @foreach ($polikliniks as $poliklinik)
                            <!-- Card 1 -->
                            <div class="swiper-slide w-full ">
                                <div
                                    class="bg-gray-100 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center space-y-3">
                                    <img src="{{ asset('storage/poliklinik/' . $poliklinik->image1) }}" alt="berita"
                                        class="rounded-xl w-[130px] h-[100px] object-fit mb-3" />

                                    <h3 class="text-green-700 font-bold text-lg text-center">{{ $poliklinik->name }}</h3>
                                    <div class="w-16 h-1 bg-green-700"></div>
                                    <p class="text-sm text-gray-800 text-center">
                                        {{ Str::limit($poliklinik->deskripsi, 20) }}</p>
                                    <a href="{{ route('poliklinik.show', $poliklinik->slug) }}"
                                        class="text-white bg-green-700 px-4 py-2 text-sm rounded-md">Selengkapnya</a>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Optional: Navigasi & Pagination -->
                    <div class="swiper-pagination mt-6"></div>
                    <div class="swiper-button-prev text-green-700"></div>
                    <div class="swiper-button-next text-green-700"></div>
                </div>
            </div>

        </div>
    </section>
    <section
        class="relative bg-cover bg-center bg-no-repeat bg-[url('https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg')] bg-green-900 bg-blend-multiply py-12 overflow-hidden">
        <div class=" backdrop-brightness-75 w-full py-16 px-4 md:px-20 text-white">

            <div class="flex flex-col md:flex-row gap-10">

                <!-- Kolom Kiri -->
                <div class="md:w-1/3 flex flex-col justify-center">
                    <div class="border-l-4 border-white pl-4 mb-4">
                        <h2 class="text-2xl font-bold leading-tight">INSTALASI<br>RAWAT INAP</h2>
                    </div>
                    <p class="mb-4 text-sm text-white/90">Perawatan komprehensif dengan lingkungan yang nyaman dan
                        aman.</p>
                    {{-- <a href="#"
                        class="inline-block bg-green-700 text-white px-4 py-2 text-sm mt-4 rounded-md w-fit">
                        Lihat Semua
                    </a> --}}
                </div>

                <!-- Kolom Kanan: List Kamar -->
                <div class="md:w-2/3">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 bg-green-800/40 p-6 rounded-xl">
                        @foreach ($kamars as $kamar)
                            <!-- Contoh Kartu Kamar -->
                            <a href="{{ Route('kamar.show', $kamar->id) }}"
                                class="bg-white/10 hover:bg-white/20 p-4 rounded-lg transition text-white">
                                <h3 class="font-semibold">{{ $kamar->name }}</h3>
                                <p class="text-sm opacity-80">{{ $kamar->kelas }}</p>
                            </a>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="bg-green-300 relative z-10 py-10 px-6 md:px-16">
        <div class="text-center mb-6 relative z-10">
            <div class="bg-green-700 px-6 py-3 pb-8 inline-block rounded-lg shadow">
                <h2 class="text-2xl md:text-2xl font-bold text-white">Partner Kami</h2>
                <hr>
            </div>
        </div>

        <!-- Carousel Kartu Pelayanan -->
        <div class="md:w-3/4 mx-auto w-full">
            <div class="swiper mySwiperDokter h-full w-full">
                <div class="swiper-wrapper ml-10 md:ml-0">
                    @foreach ($partners as $partner)
                        <!-- Card 1 -->
                        <div class="swiper-slide w-full ">
                            <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">


                                <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                                <div class="relative z-10 p-4 flex flex-col items-center">
                                    <div
                                        class="w-[220px] h-[220px] overflow-hidden rounded-md border-2 border-white shadow-md mb-4">
                                        <img src="{{ asset('storage/partner/' . $partner->image) }}" alt="Foto Partner"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div class="text-center mt-2">
                                        <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                            {{ $partner->name }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Optional: Navigasi & Pagination -->
                <div class="swiper-pagination mt-6"></div>
                <div class="swiper-button-prev text-green-700"></div>
                <div class="swiper-button-next text-green-700"></div>
            </div>
        </div>
    </section>

    <section
        class="relative bg-cover bg-center bg-no-repeat bg-[url('https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg')] bg-green-900 bg-blend-multiply py-12 overflow-hidden">
        <div class="backdrop-brightness-75 w-full py-16 px-4 md:px-20 text-white">

            <div class="flex flex-col items-center gap-10">

                <!-- Judul Form -->
                <div class="text-center">
                    <div class="border-l-4 border-white pl-4 mb-4 inline-block">
                        <h2 class="text-2xl font-bold leading-tight">KRITIK & SARAN</h2>
                    </div>
                    <p class="mb-4 text-sm text-white/90">Kami menghargai setiap masukan Anda untuk meningkatkan layanan
                        kami.</p>

                    @if (session('successKritik'))
                        <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                            {{ session('successKritik') }}
                        </div>
                    @endif

                </div>

                <!-- Formulir Kritik dan Saran -->
                <form action="{{ route('kritikSaran.store') }}" method="POST"
                    class="w-full max-w-2xl bg-green-400/40 p-6 rounded-xl space-y-4">
                    @csrf

                    <div>
                        <label for="nama" class="block text-sm font-medium mb-1">Nama</label>
                        <input type="text" name="name" id="nama" class="w-full rounded-md p-2 text-black"
                            placeholder="Nama Anda" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" id="email" class="w-full rounded-md p-2 text-black"
                            placeholder="Email Anda" required>
                    </div>
                    <div>
                        <label for="no_hp" class="block text-sm font-medium mb-1">No. HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="w-full rounded-md p-2 text-black"
                            placeholder="No. HP Anda" required>

                        <div>
                            <label for="pesan" class="block text-sm font-medium mb-1 mt-1">Kritik / Saran</label>
                            <textarea name="message" id="pesan" rows="5" class="w-full rounded-md p-2 text-black"
                                placeholder="Tulis kritik atau saran Anda di sini..." required></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit"
                                class="bg-green-700 hover:bg-green-800 text-white px-6 py-2 rounded-md transition">
                                Kirim
                            </button>
                        </div>
                </form>

            </div>
        </div>
    </section>

    <!-- Modal Fullscreen -->
    <div id="modalImage" class="fixed inset-0 z-50 bg-black bg-opacity-80 hidden items-center justify-center">
        <div class="relative max-w-4xl w-full mx-auto p-4">
            <!-- Tombol Close -->
            <button onclick="hideModal('modalImage')"
                class="absolute top-4 right-4 text-white text-3xl font-bold z-50">&times;</button>

            <!-- Gambar Besar -->
            <img src="https://www.rsi.co.id/media/k2/items/cache/4723ef876aca4c7cd452b3e97715d01b_XL.webp"
                alt="Gambar Besar" id="modalImageContent"
                class="w-[500px] rounded-lg shadow-lg transition-transform duration-500 transform scale-100 hover:scale-105">
        </div>
    </div>

    <!-- Script Modal -->
    <script>
        function showModal(id) {
            const imageSrc = event.target.getAttribute('data-image');
            document.getElementById('modalImageContent').src = imageSrc;
            document.getElementById(id).classList.remove('hidden');
            document.getElementById(id).classList.add('flex');
        }

        function hideModal(id) {
            document.getElementById(id).classList.remove('flex');
            document.getElementById(id).classList.add('hidden');
        }
    </script>
@endsection
