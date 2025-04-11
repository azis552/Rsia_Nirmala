<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RSIA Nirmala</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <!-- Bagian atas -->
    <div class="bg-green-700 text-white text-sm py-2 px-4 flex flex-wrap justify-between items-center">
        <div class="flex items-center gap-2">
            <span class="hidden md:flex">Hubungi Kami</span>
            <span class="hidden md:flex">|</span>
            <span class="hidden md:flex"><i class="fas fa-envelope mt-1 mr-2"></i>rsianirmalakdr</span>
            <span class="hidden md:flex">|</span>
            <span><i class="fa-solid fa-phone-volume"></i> 085-317-080-08</span>
        </div>
        <div class="bg-gray-200 text-green-700 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1">
            <i class="fa-solid fa-phone-volume"></i> Emergency Call <span class="text-black">085-317-080-08</span>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center relative">
        <!-- Logo -->
        <div class="flex items-center gap-4">
            <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/Untitled-1000-%C3%97-500-px-1.png"
                alt="Logo RSIA" class="h-12 max-w-full">
        </div>

        <!-- Menu Navigasi (Desktop) -->
        <ul class="hidden md:flex space-x-6 font-bold text-lg">
            <li><a href="#" class="hover:text-green-700">Beranda</a></li>
            <li><a href="#" class="hover:text-green-700">Profil</a></li>
            <li><a href="#" class="hover:text-green-700">Pelayanan</a></li>
            <li><a href="#" class="hover:text-green-700">Informasi Publik</a></li>
            <li><a href="#" class="hover:text-green-700">Promo Spesial</a></li>
        </ul>

        <!-- Tombol Aksi (Desktop) -->
        <div class="hidden md:flex items-center gap-3">
            <a href="#"
                class="bg-green-700 text-white px-4 py-2 rounded-md font-semibold hover:bg-green-800 flex items-center gap-2">
                <i class="fas fa-calendar-check"></i> Booking Online
            </a>
            <a href="#"
                class="border border-green-700 text-green-700 px-4 py-2 rounded-md font-semibold hover:bg-green-100 flex items-center gap-2">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </div>

        <!-- Tombol Hamburger Menu (Mobile) -->
        <button id="menuButton" class="md:hidden text-green-700 text-2xl">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
    <!-- Menu Mobile -->
    <div id="navbar-dropdown" class=" fixed hidden top-30 left-0 w-full bg-white shadow-md z-50 md:hidden">
        <ul class="flex flex-col p-2 text-lg font-bold leading-tight">
            <li class="py-1">
                <a href="#"
                    class="block py-2 px-4 rounded-md hover:text-green-700 hover:bg-green-100 active:bg-green-200 focus:outline-none transition-all duration-300">
                    Beranda
                </a>
            </li>
            <li class="py-1">
                <a href="#"
                    class="block py-2 px-4 rounded-md hover:text-green-700 hover:bg-green-100 active:bg-green-200 focus:outline-none transition-all duration-300">
                    Profil
                </a>
            </li>
            <li class="py-1">
                <a href="#"
                    class="block py-2 px-4 rounded-md hover:text-green-700 hover:bg-green-100 active:bg-green-200 focus:outline-none transition-all duration-300">
                    Pelayanan
                </a>
            </li>
            <li class="py-1">
                <a href="#"
                    class="block py-2 px-4 rounded-md hover:text-green-700 hover:bg-green-100 active:bg-green-200 focus:outline-none transition-all duration-300">
                    Informasi Publik
                </a>
            </li>
            <li class="py-1">
                <a href="#"
                    class="block py-2 px-4 rounded-md hover:text-green-700 hover:bg-green-100 active:bg-green-200 focus:outline-none transition-all duration-300">
                    Promo Spesial
                </a>
            </li>
            <li class="py-1">
                <button
                    class="w-full bg-green-700 text-white px-4 py-2 rounded-md font-semibold shadow-md hover:bg-green-800 hover:shadow-lg active:bg-green-900 focus:outline-none transition-all duration-300">
                    Booking Online
                </button>
            </li>
            <li class="py-1">
                <a href="#"
                class="border border-green-700 text-green-700 px-4 py-2 rounded-md font-semibold hover:bg-green-100 flex items-center gap-2">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            </li>
        </ul>
    </div>
    {{-- jumbotron --}}
    <div id="controls-carousel" class="relative w-full h-[400px] md:h-[600px]" data-carousel="static"
        style="position: relative; z-index: 1;">
        <!-- Carousel wrapper -->
        <div class="relative h-[400px] md:h-[600px] overflow-hidden ">
            <!-- Item 1 -->
            <div class="hidden duration-1000 ease-in-out transition-all" data-carousel-item>
                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg"
                    class="w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-1000 ease-in-out transition-all" data-carousel-item>
                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg"
                    class="w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-1000 ease-in-out transition-all" data-carousel-item>
                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg"
                    class="w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-1000 ease-in-out transition-all" data-carousel-item>
                <img src="https://media-cdn.tripadvisor.com/media/photo-s/06/9b/a5/ef/massive-jumbotron.jpg"
                    class="w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-1000 ease-in-out transition-all" data-carousel-item>
                <img src="https://media-cdn.tripadvisor.com/media/photo-s/06/9b/a5/ef/massive-jumbotron.jpg"
                    class="w-full h-full object-cover" alt="...">
            </div>
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

                    <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Dokter</label>
                            <input type="text" placeholder="Nama Dokter"
                                class="mt-1 block w-full border-2 border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Spesialisasi</label>
                            <select
                                class="mt-1 block w-full border-2 border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500">
                                <option>Pilih Spesialis</option>
                                <option>Spesialis 1</option>
                                <option>Spesialis 2</option>
                                <option>Spesialis 3</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pilihan Hari</label>
                            <input type="date"
                                class="mt-1 block w-full border-2 border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500" />
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Reset</button>
                        <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cari
                            Dokter</button>
                    </div>
                </div>
            </div>
            <div class=" flex  items-center w-full px-4">
                <div class="flex flex-col md:flex-row items-center gap-6 h-90 w-full ">
                    <!-- Card 1 -->
                    <div
                        class="relative  bg-gray-200 w-full md:w-90 h-72 md:h-80 p-6 text-center rounded-lg shadow-lg">
                        <div class="flex justify-center mb-4">
                            <img src="https://cdn-icons-png.flaticon.com/512/1046/1046863.png" alt="Icon"
                                class="w-12 h-12">
                        </div>
                        <p class="text-lg font-semibold">Layanan Lengkap</p>
                        <div
                            class="absolute -bottom-5 right-5 bg-green-600 text-white w-10 h-10 flex items-center justify-center text-lg font-bold rounded-full">
                            1
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="relative bg-gray-200 w-full md:w-90 h-72 md:h-80 p-6 text-center rounded-lg shadow-lg">
                        <div class="flex justify-center mb-4">
                            <img src="https://cdn-icons-png.flaticon.com/512/1046/1046863.png" alt="Icon"
                                class="w-12 h-12">
                        </div>
                        <p class="text-lg font-semibold">
                            <a href="#" class="text-blue-600 hover:underline">Peralatan Modern</a>
                        </p>
                        <div
                            class="absolute -bottom-5 right-5 bg-green-600 text-white w-10 h-10 flex items-center justify-center text-lg font-bold rounded-full">
                            2
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="relative bg-gray-200 w-full md:w-90 h-72 md:h-80 p-6 text-center rounded-lg shadow-lg">
                        <div class="flex justify-center mb-4">
                            <img src="https://cdn-icons-png.flaticon.com/512/1046/1046863.png" alt="Icon"
                                class="w-12 h-12">
                        </div>
                        <p class="text-lg font-semibold">Registrasi Online</p>
                        <div
                            class="absolute -bottom-5 right-5 bg-green-600 text-white w-10 h-10 flex items-center justify-center text-lg font-bold rounded-full">
                            3
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

        <!-- Filter Buttons -->
        <div class="flex justify-start ml-20 gap-3 mb-4 relative z-10">
            <button
                class="bg-green-200 text-green-900 px-4 py-2 rounded-full font-semibold hover:bg-green-300 transition">All</button>
            <button
                class="bg-white border border-green-400 text-green-900 px-4 py-2 rounded-full font-semibold hover:bg-green-100 transition">Artikel</button>
            <button
                class="bg-white border border-green-400 text-green-900 px-4 py-2 rounded-full font-semibold hover:bg-green-100 transition">Pengumuman</button>
        </div>

        <!-- Grid Berita -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto relative z-10">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 m-2">
                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg"
                    alt="berita" class="rounded-xl w-full h-48 object-cover mb-3" />
                <p class="text-sm text-gray-500">13 January 2025</p>
                <h3 class="font-semibold text-md mt-1">Rapat Koordinasi Manajemen Risiko dan Identifikasi Prioritas
                    Layanan Rumah Sakit Tahun 2025</h3>
                <p class="text-sm mt-2 text-gray-600">Pada tanggal 13 Januari 2025, UPT RSKD Dadi Provinsi Sulawesi
                    Selatan menggelar Rapat Koordinasi... <span class="font-semibold text-green-700">Baca
                        Selengkapnya</span></p>
            </div>

            <div class="bg-white rounded-xl shadow p-4 m-2">
                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg"
                    alt="berita" class="rounded-xl w-full h-48 object-cover mb-3" />
                <p class="text-sm text-gray-500">13 January 2025</p>
                <h3 class="font-semibold text-md mt-1">Rapat Koordinasi Manajemen Risiko dan Identifikasi Prioritas
                    Layanan Rumah Sakit Tahun 2025</h3>
                <p class="text-sm mt-2 text-gray-600">Pada tanggal 13 Januari 2025, UPT RSKD Dadi Provinsi Sulawesi
                    Selatan menggelar Rapat Koordinasi... <span class="font-semibold text-green-700">Baca
                        Selengkapnya</span></p>
            </div>

            <div class="bg-white rounded-xl shadow p-4 m-2">
                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg"
                    alt="berita" class="rounded-xl w-full h-48 object-cover mb-3" />
                <p class="text-sm text-gray-500">13 January 2025</p>
                <h3 class="font-semibold text-md mt-1">Rapat Koordinasi Manajemen Risiko dan Identifikasi Prioritas
                    Layanan Rumah Sakit Tahun 2025</h3>
                <p class="text-sm mt-2 text-gray-600">Pada tanggal 13 Januari 2025, UPT RSKD Dadi Provinsi Sulawesi
                    Selatan menggelar Rapat Koordinasi... <span class="font-semibold text-green-700">Baca
                        Selengkapnya</span></p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 m-2">
                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/RSIA-14-of-90-scaled.jpg"
                    alt="berita" class="rounded-xl w-full h-48 object-cover mb-3" />
                <p class="text-sm text-gray-500">13 January 2025</p>
                <h3 class="font-semibold text-md mt-1">Rapat Koordinasi Manajemen Risiko dan Identifikasi Prioritas
                    Layanan Rumah Sakit Tahun 2025</h3>
                <p class="text-sm mt-2 text-gray-600">Pada tanggal 13 Januari 2025, UPT RSKD Dadi Provinsi Sulawesi
                    Selatan menggelar Rapat Koordinasi... <span class="font-semibold text-green-700">Baca
                        Selengkapnya</span></p>
            </div>

            <!-- Ulangi card di atas untuk item ke-2 dan ke-3 -->
            <!-- Bisa disalin 2x atau dibuat loop kalau pakai framework JS -->
        </div>

        <!-- Tombol Lihat Semua -->
        <div class="flex justify-end mt-4 mr-20 relative z-10">
            <a href="#"
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
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/your_video_id" frameborder="0"
                        allowfullscreen></iframe>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="md:w-1/2 bg-gray-100 text-black p-6 rounded-lg shadow-md text-justify">
                <p class="text-md md:text-lg ">
                    Rumah Sakit Ibu dan Anak Nirmala merupakan institusi pelayanan kesehatan swasta yang secara khusus
                    berfokus pada kesehatan ibu dan anak. Terletak strategis di wilayah barat Sungai Brantas, Kota
                    Kediri,
                    RSIA Nirmala hadir sebagai solusi layanan kesehatan yang aman, nyaman, dan terpercaya bagi
                    masyarakat.

                    Dengan berlandaskan pada visi dan misi untuk menjadi rumah sakit unggulan yang memberikan pelayanan
                    prima, RSIA Nirmala senantiasa berkomitmen untuk menyediakan layanan kesehatan yang optimal,
                    profesional, dan berorientasi pada kepuasan pasien.

                    Dalam setiap tindakan medis dan pelayanan yang diberikan, RSIA Nirmala menjunjung tinggi prinsip
                    kesetaraan, tanpa memandang latar belakang suku, ras, agama, maupun golongan. Rumah sakit ini terus
                    berinovasi dan meningkatkan mutu serta kualitas pelayanannya melalui pengembangan sumber daya
                    manusia
                    yang kompeten, penggunaan teknologi medis terkini, serta penerapan standar pelayanan yang tinggi.

                    Upaya tersebut dilakukan secara konsisten agar seluruh lapisan masyarakat merasa aman, dihargai, dan
                    puas dengan setiap layanan yang diterima. RSIA Nirmala bertekad untuk menjadi mitra terpercaya dalam
                    menjaga dan meningkatkan kesehatan ibu dan anak, sekaligus menjadi pilihan utama masyarakat dalam
                    memperoleh layanan kesehatan yang holistik dan berkualitas.
                </p>
            </div>
        </div>
    </section>



    <section class="bg-green-300 relative z-10 py-10 px-6 md:px-16">
        <div class="text-center mb-6 relative z-10">
            <div class="bg-green-700 px-6 py-3 inline-block rounded-lg shadow">
                <h2 class="text-2xl md:text-2xl font-bold text-white">Pelayanan Kami</h2>
                <hr>
                <p class="text-green-100 mt-1 text-sm">Berita dan Artikel Kesehatan Terbaru</p>
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
                <a href="#"
                    class="inline-block bg-green-700 text-white px-4 py-2 text-sm mt-4 rounded-md w-fit">
                    Lihat Semua
                </a>
            </div>

            <!-- Kanan - Kartu Pelayanan -->
            <!-- Carousel Kartu Pelayanan -->
            <div class="md:w-3/4 mx-auto w-full">
                <div class="swiper mySwiper h-[320px] w-full">
                    <div class="swiper-wrapper">

                        <!-- Card 1 -->
                        <div class="swiper-slide w-full ">
                            <div
                                class="bg-gray-100 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center space-y-3">
                                <div class="h-20 w-20 bg-green-800 rounded-sm"></div>
                                <h3 class="text-green-700 font-bold text-lg text-center">24 Jam Unit Gawat Darurat</h3>
                                <div class="w-16 h-1 bg-green-700"></div>
                                <p class="text-sm text-gray-800 text-center">24 Jam Unit Gawat Darurat di RSIA Nirmala
                                    Kediri</p>
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md">Selengkapnya</a>
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    1
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="swiper-slide w-full">
                            <div
                                class="bg-gray-100 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center space-y-3">
                                <div class="h-20 w-20 bg-green-800 rounded-sm"></div>
                                <h3 class="text-green-700 font-bold text-lg text-center">Rawat Inap</h3>
                                <div class="w-16 h-1 bg-green-700"></div>
                                <p class="text-sm text-gray-800 text-center">24 Jam Unit Gawat Darurat di RSIA Nirmala
                                    Kediri</p>
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md">Selengkapnya</a>
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    2
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="swiper-slide w-full">
                            <div
                                class="bg-gray-100 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center space-y-3">
                                <div class="h-20 w-20 bg-green-800 rounded-sm"></div>
                                <h3 class="text-green-700 font-bold text-lg text-center">Rawat Jalan</h3>
                                <div class="w-16 h-1 bg-green-700"></div>
                                <p class="text-sm text-gray-800 text-center">24 Jam Unit Gawat Darurat di RSIA Nirmala
                                    Kediri</p>
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md">Selengkapnya</a>
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    3
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="swiper-slide w-full">
                            <div
                                class="bg-gray-100 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center space-y-3">
                                <div class="h-20 w-20 bg-green-800 rounded-sm"></div>
                                <h3 class="text-green-700 font-bold text-lg text-center">Rawat Jalan</h3>
                                <div class="w-16 h-1 bg-green-700"></div>
                                <p class="text-sm text-gray-800 text-center">24 Jam Unit Gawat Darurat di RSIA Nirmala
                                    Kediri</p>
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md">Selengkapnya</a>
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    3
                                </div>
                            </div>
                        </div>

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
                <h2 class="text-2xl md:text-2xl font-bold text-white">Dokter Spesialist</h2>
                <hr>
            </div>
        </div>

        <!-- Carousel Kartu Pelayanan -->
        <div class="md:w-3/4 mx-auto w-full">
            <div class="swiper mySwiperDokter h-full w-full">
                <div class="swiper-wrapper ml-10 md:ml-0">

                    <!-- Card 1 -->
                    <div class="swiper-slide w-full ">
                        <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                            <!-- Background hijau hanya di bagian atas -->
                            <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                            </div>

                            <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                            <div class="relative z-10 p-4 flex flex-col items-center">
                                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/foto1.jpg"
                                    alt="Foto Dokter"
                                    class="w-55 h-55 object-cover  border-2 border-white shadow-md mb-4">
                                <div class="text-center mt-2">
                                    <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                        KANDUNGAN DAN KEBIDANAN</p>
                                    <p
                                        class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                        dr.
                                        GS Heru Tribawono Sp.OG</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="swiper-slide w-full">
                        <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                            <!-- Background hijau hanya di bagian atas -->
                            <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                            </div>

                            <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                            <div class="relative z-10 p-4 flex flex-col items-center">
                                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/foto1.jpg"
                                    alt="Foto Dokter"
                                    class="w-55 h-55 object-cover  border-2 border-white shadow-md mb-4">
                                <div class="text-center mt-2">
                                    <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                        KANDUNGAN DAN KEBIDANAN</p>
                                    <p
                                        class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                        dr.
                                        GS Heru Tribawono Sp.OG</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide w-full">
                        <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                            <!-- Background hijau hanya di bagian atas -->
                            <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                            </div>

                            <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                            <div class="relative z-10 p-4 flex flex-col items-center">
                                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/foto1.jpg"
                                    alt="Foto Dokter"
                                    class="w-55 h-55 object-cover  border-2 border-white shadow-md mb-4">
                                <div class="text-center mt-2">
                                    <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                        KANDUNGAN DAN KEBIDANAN</p>
                                    <p
                                        class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                        dr.
                                        GS Heru Tribawono Sp.OG</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide w-full">
                        <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                            <!-- Background hijau hanya di bagian atas -->
                            <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                            </div>

                            <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                            <div class="relative z-10 p-4 flex flex-col items-center">
                                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/foto1.jpg"
                                    alt="Foto Dokter"
                                    class="w-55 h-55 object-cover  border-2 border-white shadow-md mb-4">
                                <div class="text-center mt-2">
                                    <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                        KANDUNGAN DAN KEBIDANAN</p>
                                    <p
                                        class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                        dr.
                                        GS Heru Tribawono Sp.OG</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="swiper-slide w-full">
                        <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                            <!-- Background hijau hanya di bagian atas -->
                            <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                            </div>

                            <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                            <div class="relative z-10 p-4 flex flex-col items-center">
                                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/foto1.jpg"
                                    alt="Foto Dokter"
                                    class="w-55 h-55 object-cover  border-2 border-white shadow-md mb-4">
                                <div class="text-center mt-2">
                                    <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                        KANDUNGAN DAN KEBIDANAN</p>
                                    <p
                                        class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                        dr.
                                        GS Heru Tribawono Sp.OG</p>
                                </div>
                            </div>
                        </div>
                    </div>

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
                <a href="#"
                    class="inline-block bg-green-700 text-white px-4 py-2 text-sm mt-4 rounded-md w-fit">
                    Lihat Semua
                </a>
            </div>

            <!-- Kanan - Kartu Pelayanan -->
            <!-- Carousel Kartu Pelayanan -->
            <div class="md:w-3/4 mx-auto w-full">
                <div class="swiper mySwiper h-[420px] w-full">
                    <div class="swiper-wrapper">

                        <!-- Card 1 -->
                        <div class="swiper-slide w-full flex justify-center">
                            <div
                                class="group h-[400px] bg-cover bg-[url('https://www.rsi.co.id/media/k2/items/cache/4723ef876aca4c7cd452b3e97715d01b_XL.webp')]  bg-gray-100 hover:bg-green-700 transition-all duration-300 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center justify-center space-y-3 w-full max-w-xs overflow-visible">

                                <!-- Judul -->
                                <h3
                                    class="text-green-700 group-hover:text-green-800 font-bold text-lg text-center opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-2 transition duration-500 delay-100">
                                    24 Jam Unit Gawat Darurat
                                </h3>

                                <!-- Garis bawah -->
                                <div
                                    class="w-16 h-1 bg-green-700 opacity-0 group-hover:opacity-100 transform group-hover:translate-y-0 translate-y-2 transition duration-500 delay-200">
                                </div>

                                <!-- Tombol -->
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 scale-95 group-hover:scale-100 transition duration-500 delay-300">
                                    Selengkapnya
                                </a>

                                <!-- Angka pojok kanan bawah -->
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    1
                                </div>

                            </div>
                        </div>


                        <!-- Card 1 -->
                        <div class="swiper-slide w-full flex justify-center">
                            <div
                                class="group h-[400px] bg-cover bg-[url('https://www.rsi.co.id/media/k2/items/cache/4723ef876aca4c7cd452b3e97715d01b_XL.webp')]  bg-gray-100 hover:bg-green-700 transition-all duration-300 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center justify-center space-y-3 w-full max-w-xs overflow-visible">

                                <!-- Judul -->
                                <h3
                                    class="text-green-700 group-hover:text-green-800 font-bold text-lg text-center opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-2 transition duration-500 delay-100">
                                    24 Jam Unit Gawat Darurat
                                </h3>

                                <!-- Garis bawah -->
                                <div
                                    class="w-16 h-1 bg-green-700 opacity-0 group-hover:opacity-100 transform group-hover:translate-y-0 translate-y-2 transition duration-500 delay-200">
                                </div>

                                <!-- Tombol -->
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 scale-95 group-hover:scale-100 transition duration-500 delay-300">
                                    Selengkapnya
                                </a>

                                <!-- Angka pojok kanan bawah -->
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    1
                                </div>

                            </div>
                        </div>
                        <!-- Card 1 -->
                        <div class="swiper-slide w-full flex justify-center">
                            <div
                                class="group h-[400px] bg-cover bg-[url('https://www.rsi.co.id/media/k2/items/cache/4723ef876aca4c7cd452b3e97715d01b_XL.webp')]  bg-gray-100 hover:bg-green-700 transition-all duration-300 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center justify-center space-y-3 w-full max-w-xs overflow-visible">

                                <!-- Judul -->
                                <h3
                                    class="text-green-700 group-hover:text-green-800 font-bold text-lg text-center opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-2 transition duration-500 delay-100">
                                    24 Jam Unit Gawat Darurat
                                </h3>

                                <!-- Garis bawah -->
                                <div
                                    class="w-16 h-1 bg-green-700 opacity-0 group-hover:opacity-100 transform group-hover:translate-y-0 translate-y-2 transition duration-500 delay-200">
                                </div>

                                <!-- Tombol -->
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 scale-95 group-hover:scale-100 transition duration-500 delay-300">
                                    Selengkapnya
                                </a>

                                <!-- Angka pojok kanan bawah -->
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    1
                                </div>

                            </div>
                        </div>

                        <!-- Card 1 -->
                        <div class="swiper-slide w-full flex justify-center">
                            <div
                                class="group h-[400px] bg-cover bg-[url('https://www.rsi.co.id/media/k2/items/cache/4723ef876aca4c7cd452b3e97715d01b_XL.webp')]  bg-gray-100 hover:bg-green-700 transition-all duration-300 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center justify-center space-y-3 w-full max-w-xs overflow-visible">

                                <!-- Judul -->
                                <h3
                                    class="text-green-700 group-hover:text-green-800 font-bold text-lg text-center opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-2 transition duration-500 delay-100">
                                    24 Jam Unit Gawat Darurat
                                </h3>

                                <!-- Garis bawah -->
                                <div
                                    class="w-16 h-1 bg-green-700 opacity-0 group-hover:opacity-100 transform group-hover:translate-y-0 translate-y-2 transition duration-500 delay-200">
                                </div>

                                <!-- Tombol -->
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 scale-95 group-hover:scale-100 transition duration-500 delay-300">
                                    Selengkapnya
                                </a>

                                <!-- Angka pojok kanan bawah -->
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    1
                                </div>

                            </div>
                        </div>

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
                        <h4 class="text-xl mt-4 font-semibold text-white">Paviliun Muzdalifah 1 & 2</h4>
                        <p class="text-sm">
                            Fasilitas Tempat Tidur Elektrik, TV 43 Inch, Paket Beverage, Sofa Bed & Sofa Tamu, Kulkas
                            Portable, Lemari Pakaian, Meja Nakas,...
                        </p>
                        <a href="#" class="text-white underline">Selengkapnya</a>
                    </div>

                    <!-- Gambar -->
                    <div class="w-full md:w-1/2 mt-6 md:mt-0 md:pl-6">
                        <div class="swiper imageSwiper rounded-lg overflow-hidden">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://www.rsi.co.id/media/k2/items/cache/4723ef876aca4c7cd452b3e97715d01b_XL.webp"
                                        alt="Kamar 1" class="rounded-lg w-full h-auto object-cover">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://via.placeholder.com/600x400?text=Kamar+2" alt="Kamar 2"
                                        class="rounded-lg w-full h-auto object-cover">
                                </div>
                            </div>
                            <div class="swiper-button-next text-white"></div>
                            <div class="swiper-button-prev text-white"></div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div
                    class="swiper-slide flex flex-col md:flex-row items-center bg-green-700 bg-opacity-20 text-white rounded-lg overflow-hidden p-6">

                    <!-- Teks -->
                    <div class="w-full md:w-1/2 space-y-4">
                        <h2 class="text-xl font-bold">FASILITAS UNGGULAN</h2>
                        <h3 class="text-2xl font-bold">RSIA Nirmala Kediri</h3>
                        <h4 class="text-xl mt-4 font-semibold text-white">Paviliun Muzdalifah 1 & 2</h4>
                        <p class="text-sm">
                            Fasilitas Tempat Tidur Elektrik, TV 43 Inch, Paket Beverage, Sofa Bed & Sofa Tamu, Kulkas
                            Portable, Lemari Pakaian, Meja Nakas,...
                        </p>
                        <a href="#" class="text-white underline">Selengkapnya</a>
                    </div>

                    <!-- Gambar -->
                    <div class="w-full md:w-1/2 mt-6 md:mt-0 md:pl-6">
                        <div class="swiper imageSwiper rounded-lg overflow-hidden">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://www.rsi.co.id/media/k2/items/cache/4723ef876aca4c7cd452b3e97715d01b_XL.webp"
                                        alt="Kamar 1" class="rounded-lg w-full h-auto object-cover">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://www.rsi.co.id/media/k2/items/cache/48b2caa4acdcf286e67d646faa59fcbf_L.webp"
                                        alt="Kamar 2" class="rounded-lg w-full h-auto object-cover">
                                </div>
                            </div>
                            <div class="swiper-button-next text-white"></div>
                            <div class="swiper-button-prev text-white"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination mt-4"></div>
        </div>
    </section>



    <section class="bg-green-300 relative z-10 py-10 px-6 md:px-16">
        <div class="text-center mb-6 relative z-10">
            <div class="bg-green-700 px-6 py-3 inline-block rounded-lg shadow">
                <h2 class="text-2xl md:text-2xl font-bold text-white">Poliklinik</h2>
                <hr>
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
                <a href="#"
                    class="inline-block bg-green-700 text-white px-4 py-2 text-sm mt-4 rounded-md w-fit">
                    Lihat Semua
                </a>
            </div>

            <!-- Kanan - Kartu Pelayanan -->
            <!-- Carousel Kartu Pelayanan -->
            <div class="md:w-3/4 mx-auto w-full">
                <div class="swiper mySwiper h-[320px] w-full">
                    <div class="swiper-wrapper">

                        <!-- Card 1 -->
                        <div class="swiper-slide w-full ">
                            <div
                                class="bg-gray-100 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center space-y-3">
                                <div class="h-20 w-20 bg-green-800 rounded-sm"></div>
                                <h3 class="text-green-700 font-bold text-lg text-center">24 Jam Unit Gawat Darurat</h3>
                                <div class="w-16 h-1 bg-green-700"></div>
                                <p class="text-sm text-gray-800 text-center">24 Jam Unit Gawat Darurat di RSIA Nirmala
                                    Kediri</p>
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md">Selengkapnya</a>
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    1
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="swiper-slide w-full">
                            <div
                                class="bg-gray-100 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center space-y-3">
                                <div class="h-20 w-20 bg-green-800 rounded-sm"></div>
                                <h3 class="text-green-700 font-bold text-lg text-center">Rawat Inap</h3>
                                <div class="w-16 h-1 bg-green-700"></div>
                                <p class="text-sm text-gray-800 text-center">24 Jam Unit Gawat Darurat di RSIA Nirmala
                                    Kediri</p>
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md">Selengkapnya</a>
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    2
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="swiper-slide w-full">
                            <div
                                class="bg-gray-100 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center space-y-3">
                                <div class="h-20 w-20 bg-green-800 rounded-sm"></div>
                                <h3 class="text-green-700 font-bold text-lg text-center">Rawat Jalan</h3>
                                <div class="w-16 h-1 bg-green-700"></div>
                                <p class="text-sm text-gray-800 text-center">24 Jam Unit Gawat Darurat di RSIA Nirmala
                                    Kediri</p>
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md">Selengkapnya</a>
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    3
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="swiper-slide w-full">
                            <div
                                class="bg-gray-100 rounded-lg p-4 h-72 shadow-md relative flex flex-col items-center space-y-3">
                                <div class="h-20 w-20 bg-green-800 rounded-sm"></div>
                                <h3 class="text-green-700 font-bold text-lg text-center">Rawat Jalan</h3>
                                <div class="w-16 h-1 bg-green-700"></div>
                                <p class="text-sm text-gray-800 text-center">24 Jam Unit Gawat Darurat di RSIA Nirmala
                                    Kediri</p>
                                <a href="#"
                                    class="text-white bg-green-700 px-4 py-2 text-sm rounded-md">Selengkapnya</a>
                                <div
                                    class="absolute -bottom-6 right-4 w-12 h-12 bg-white border-4 border-green-300 rounded-full flex items-center justify-center text-xl font-bold text-gray-800">
                                    3
                                </div>
                            </div>
                        </div>

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
                    <a href="#"
                        class="inline-block bg-green-700 text-white px-4 py-2 text-sm mt-4 rounded-md w-fit">
                        Lihat Semua
                    </a>
                </div>

                <!-- Kolom Kanan: List Kamar -->
                <div class="md:w-2/3">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 bg-green-800/40 p-6 rounded-xl">

                        <!-- Contoh Kartu Kamar -->
                        <a href="#" class="bg-white/10 hover:bg-white/20 p-4 rounded-lg transition text-white">
                            <h3 class="font-semibold">Paviliun Annisa</h3>
                            <p class="text-sm opacity-80">VIP</p>
                        </a>

                        <a href="#" class="bg-white/10 hover:bg-white/20 p-4 rounded-lg transition text-white">
                            <h3 class="font-semibold">Paviliun Annisa</h3>
                            <p class="text-sm opacity-80">Kelas 3</p>
                        </a>

                        <a href="#" class="bg-white/10 hover:bg-white/20 p-4 rounded-lg transition text-white">
                            <h3 class="font-semibold">Paviliun Annisa</h3>
                            <p class="text-sm opacity-80">Kelas 2</p>
                        </a>

                        <!-- Duplikat sesuai jumlah kamar -->
                        <!-- ... -->
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

                    <!-- Card 1 -->
                    <div class="swiper-slide w-full ">
                        <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                            <!-- Background hijau hanya di bagian atas -->
                            <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                            </div>

                            <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                            <div class="relative z-10 p-4 flex flex-col items-center">
                                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/foto1.jpg"
                                    alt="Foto Dokter"
                                    class="w-55 h-55 object-cover  border-2 border-white shadow-md mb-4">
                                <div class="text-center mt-2">
                                    <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                        KANDUNGAN DAN KEBIDANAN</p>
                                    <p
                                        class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                        dr.
                                        GS Heru Tribawono Sp.OG</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="swiper-slide w-full">
                        <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                            <!-- Background hijau hanya di bagian atas -->
                            <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                            </div>

                            <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                            <div class="relative z-10 p-4 flex flex-col items-center">
                                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/foto1.jpg"
                                    alt="Foto Dokter"
                                    class="w-55 h-55 object-cover  border-2 border-white shadow-md mb-4">
                                <div class="text-center mt-2">
                                    <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                        KANDUNGAN DAN KEBIDANAN</p>
                                    <p
                                        class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                        dr.
                                        GS Heru Tribawono Sp.OG</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide w-full">
                        <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                            <!-- Background hijau hanya di bagian atas -->
                            <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                            </div>

                            <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                            <div class="relative z-10 p-4 flex flex-col items-center">
                                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/foto1.jpg"
                                    alt="Foto Dokter"
                                    class="w-55 h-55 object-cover  border-2 border-white shadow-md mb-4">
                                <div class="text-center mt-2">
                                    <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                        KANDUNGAN DAN KEBIDANAN</p>
                                    <p
                                        class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                        dr.
                                        GS Heru Tribawono Sp.OG</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide w-full">
                        <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                            <!-- Background hijau hanya di bagian atas -->
                            <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                            </div>

                            <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                            <div class="relative z-10 p-4 flex flex-col items-center">
                                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/foto1.jpg"
                                    alt="Foto Dokter"
                                    class="w-55 h-55 object-cover  border-2 border-white shadow-md mb-4">
                                <div class="text-center mt-2">
                                    <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                        KANDUNGAN DAN KEBIDANAN</p>
                                    <p
                                        class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                        dr.
                                        GS Heru Tribawono Sp.OG</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="swiper-slide w-full">
                        <div class="max-w-xs h-full rounded-xl overflow-hidden shadow-lg bg-white relative">
                            <!-- Background hijau hanya di bagian atas -->
                            <div class="absolute top-0 left-0 w-full h-[70%] z-0 overflow-hidden">
                                <div class="w-full h-full bg-green-700 rounded-br-[160px] rounded-tl-[160px]"></div>
                            </div>

                            <!-- Foto dokter (gunakan img jika ada gambar, di sini pakai placeholder) -->
                            <div class="relative z-10 p-4 flex flex-col items-center">
                                <img src="https://rsianirmalakdr.com/wp-content/uploads/2023/09/foto1.jpg"
                                    alt="Foto Dokter"
                                    class="w-55 h-55 object-cover  border-2 border-white shadow-md mb-4">
                                <div class="text-center mt-2">
                                    <p class="text-sm font-semibold text-white bg-green-700 px-3 py-1 rounded-t-md">
                                        KANDUNGAN DAN KEBIDANAN</p>
                                    <p
                                        class="text-green-700 bg-green-200 text-base font-medium px-3 py-2 rounded-b-md">
                                        dr.
                                        GS Heru Tribawono Sp.OG</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Optional: Navigasi & Pagination -->
                <div class="swiper-pagination mt-6"></div>
                <div class="swiper-button-prev text-green-700"></div>
                <div class="swiper-button-next text-green-700"></div>
            </div>
        </div>
    </section>
    <footer class="bg-white border-t-4 border-green-800 text-sm">
        <div class="max-w-screen-xl mx-auto px-4 py-6 grid grid-cols-1 md:grid-cols-4 gap-6 items-start">

            <!-- Logo dan Alamat -->
            <div class="space-y-2 text-center md:text-left">
                <div class="flex justify-center md:justify-start items-center gap-4">
                    <img src="https://www.rsi.co.id/images/rsia/logo-rsia-nirmala-kediri.png" alt="Logo RSIA"
                        class="h-16">
                    <img src="https://www.kars.or.id/public/uploads/accreditation/logo_paripurna.png" alt="Logo KARS"
                        class="h-16">
                </div>
                <p class="text-gray-700">
                    Jl. Jaksa Agung Suprapto, Mojoroto, Kec. Mojoroto, Kota Kediri, Jawa Timur 64112, Indonesia
                </p>
            </div>

            <!-- Kontak -->
            <div class="space-y-2">
                <h3 class="text-green-700 font-semibold border-l-4 border-green-700 pl-2">Hubungi Kami</h3>
                <p><i class="fa fa-envelope mr-1"></i> rsia.nirmaladekediri@gmail.com</p>
                <p><i class="fa fa-phone mr-1"></i> 0354-399-194 (WhatsApp)</p>
                <p><i class="fa fa-ambulance mr-1"></i> Emergency: 0813-5993-6275</p>
                <p><i class="fa fa-stethoscope mr-1"></i> Pendaftaran: 0896-7798-2098 (WhatsApp)</p>
                <div class="flex gap-2 mt-2">
                    <a href="#"><i class="fab fa-facebook-square text-xl text-green-700"></i></a>
                    <a href="#"><i class="fab fa-instagram text-xl text-green-700"></i></a>
                    <a href="#"><i class="fab fa-youtube text-xl text-green-700"></i></a>
                    <a href="#"><i class="fab fa-tiktok text-xl text-green-700"></i></a>
                </div>
            </div>

            <!-- Informasi -->
            <div class="space-y-2">
                <h3 class="text-green-700 font-semibold border-l-4 border-green-700 pl-2">Informasi</h3>
                <ul class="space-y-1 text-green-800">
                    <li class="flex items-center gap-2"><span class="h-2 w-2 bg-green-600 rounded-full"></span> Jadwal
                        Dokter</li>
                    <li class="flex items-center gap-2"><span class="h-2 w-2 bg-green-600 rounded-full"></span>
                        Ketersediaan Kamar Tidur</li>
                    <li class="flex items-center gap-2"><span class="h-2 w-2 bg-green-600 rounded-full"></span> Berita
                    </li>
                </ul>
            </div>

            <!-- Maps -->
            <div class="w-full">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.735626256398!2d112.002619!3d-7.818737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78574d646e5d75%3A0x8e3b05e36477dbf0!2sRSIA%20Nirmala!5e0!3m2!1sid!2sid!4v1618982720372!5m2!1sid!2sid"
                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>

        <div class="bg-green-800 text-white text-center py-2 text-xs">
            &copy; 2025 RSIA Nirmala Kediri
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuButton = document.getElementById("menuButton");
        const navbarDropdown = document.getElementById("navbar-dropdown");

        menuButton.addEventListener("click", function() {
            navbarDropdown.classList.toggle("hidden");
        });
    });
</script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });

    var swiper = new Swiper(".mySwiperDokter", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
        },
    });
    const imageSwipers = document.querySelectorAll('.imageSwiper');
    imageSwipers.forEach((swiperEl, i) => {
        new Swiper(swiperEl, {
            loop: true,
            navigation: {
                nextEl: swiperEl.querySelector('.swiper-button-next'),
                prevEl: swiperEl.querySelector('.swiper-button-prev'),
            },
        });
    });

    const mainSwiper = new Swiper('.myMainSwiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>

</html>
