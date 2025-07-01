<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ @$profil->tumbnail != null ? asset('storage/images/' . @$profil->tumbnail) : asset('images/preview.png') }}">
    <title>{{ @$profil->perusahaan != null ? @$profil->perusahaan : 'Perusahaan' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<style>
    .pagination .page-link {
        color: #166534 !important;
        border-color: #166534 !important;
        background-color: white !important;
    }

    .pagination .page-link:hover {
        background-color: #166534 !important; /* Mengubah warna latar belakang saat hover */
        color: #ffffff !important; /* Mengubah warna teks saat hover */
        transition: background-color 0.3s ease, color 0.3s ease; /* Menambahkan transisi halus */
    }

    .pagination .page-item.active .page-link {
        background-color: #166534 !important;
        border-color: #166534 !important;
        color: #ffffff !important;
    }
</style>


<body>
    <!-- Bagian atas -->
    <div class="bg-green-700 text-white text-sm py-2 px-4 flex flex-wrap justify-between items-center">
        <div class="flex items-center gap-2">
            <span class="hidden md:flex">Hubungi Kami</span>
            <span class="hidden md:flex">|</span>
            <span class="hidden md:flex"><i class="fas fa-envelope mt-1 mr-2"></i>
                {{ @$profil->email != null ? @$profil->email : 'Email belum tersedia.' }}</span>
            <span class="hidden md:flex">|</span>
            <span><i class="fa-solid fa-phone-volume"></i>
                {{ @$profil->teleponwa != null ? @$profil->teleponwa : 'Telepon belum tersedia.' }}</span>
        </div>
        <div class="bg-gray-200 text-green-700 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1">
            <i class="fa-solid fa-phone-volume"></i> Emergency Call <span class="text-black">
                {{ @$profil->telepondarurat != null ? @$profil->telepondarurat : 'Telepon belum tersedia.' }} </span>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white shadow-md px-4 py-2 flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center gap-4">
            <img src="{{ @$profil->logo != null ? asset('storage/images/' . @$profil->logo) : asset('images/preview.png') }}"
                alt="Logo RSIA" class="h-20 w-auto max-w-full object-contain" />

        </div>

       <!-- Menu Navigasi (Desktop) -->
<ul class="hidden md:flex items-center space-x-3 font-bold text-lg">

    <!-- Menu Item: Beranda -->
    <li>
        <a href="{{ route('landingpage') }}"
           class="px-3 py-2 rounded-md {{ request()->routeIs('landingpage') ? 'bg-green-100 text-green-700' : 'text-green-900 hover:bg-green-100 hover:text-green-700' }}"
           style="text-decoration: none;">
           Beranda
        </a>
    </li>

    <!-- Menu Item: Dokter -->
    <li>
        <a href="{{ route('dokterlengkap') }}"
           class="px-3 py-2 rounded-md {{ request()->routeIs('dokterlengkap') ? 'bg-green-100 text-green-700' : 'text-green-900 hover:bg-green-100 hover:text-green-700' }}"
           style="text-decoration: none;">
           Dokter
        </a>
    </li>

    <!-- Menu Item: Profil -->
    <li>
        <a href="{{ route('profil.lengkap') }}"
           class="px-3 py-2 rounded-md {{ request()->routeIs('profil.lengkap') ? 'bg-green-100 text-green-700' : 'text-green-900 hover:text-green-700 hover:bg-green-100' }}"
           style="text-decoration: none;">
           Profil
        </a>
    </li>

    <!-- Menu Item: Poliklinik -->
    <li>
        <a href="{{ route('poliklinik.lengkap') }}"
           class="px-3 py-2 rounded-md {{ request()->routeIs('poliklinik.lengkap') ? 'bg-green-100 text-green-700' : 'text-green-900 hover:text-green-700 hover:bg-green-100' }}"
           style="text-decoration: none;">
           Poliklinik
        </a>
    </li>

    <!-- Menu Item: Pelayanan -->
    <li>
        <a href="{{ route('pelayanan.lengkap') }}"
           class="px-3 py-2 rounded-md {{ request()->routeIs('pelayanan.lengkap') ? 'bg-green-100 text-green-700' : 'text-green-900 hover:text-green-700 hover:bg-green-100' }}"
           style="text-decoration: none;">
           Pelayanan
        </a>
    </li>

    <!-- Dropdown: Informasi -->
    <li class="relative">
        <a href="javascript:void(0);" class="px-3 py-2 rounded-md text-green-900 hover:text-green-700 flex items-center gap-2" id="dropdownButton">
            <span>Informasi</span>
            <i class="fas fa-chevron-down"></i>
        </a>

        <!-- Dropdown Menu -->
        <div id="dropdownMenu" class="absolute ml-2 mr-2 left-0 mt-2 w-48 bg-white shadow-lg rounded-md z-50 hidden">
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('berita.selengkapnya') }}"
                       class="block px-4 py-2 text-sm text-green-900 hover:bg-green-100 hover:text-green-700 rounded-md {{ request()->routeIs('berita.selengkapnya') ? 'bg-green-100 text-green-700' : '' }}">
                        Berita
                    </a>
                </li>
                <li>
                    <a href="{{ route('promotion.selengkapnya') }}"
                       class="block px-4 py-2 text-sm text-green-900 hover:bg-green-100 hover:text-green-700 rounded-md {{ request()->routeIs('promotion.selengkapnya') ? 'bg-green-100 text-green-700' : '' }}">
                        Promo Spesial
                    </a>
                </li>
                <li>
                    <a href="{{ route('infoTT') }}"
                       class="block px-4 py-2 text-sm text-green-900 hover:bg-green-100 hover:text-green-700 rounded-md {{ request()->routeIs('infoTT') ? 'bg-green-100 text-green-700' : '' }}">
                        Info Kamar
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>

        <!-- Tombol Aksi (Desktop) -->
        <div class="hidden md:flex items-center gap-3">
            <a href="{{ route('booking.form') }}"
                class="bg-green-700 text-white px-4 py-2 rounded-md font-semibold hover:bg-green-800 flex items-center gap-2">
                <i class="fas fa-calendar-check"></i> Booking Online
            </a>
            @if (Auth::check())
                <a href="{{ route('dashboard') }}"
                    class="border border-green-700 text-green-700 px-4 py-2 rounded-md font-semibold hover:bg-green-100 flex items-center gap-2">
                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="border border-green-700 text-green-700 px-4 py-2 rounded-md font-semibold hover:bg-green-100 flex items-center gap-2">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            @endif
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
                <a href="{{ route('landingpage') }}"
                    class="block py-2 px-4 rounded-md {{ request()->routeIs('landingpage') ? 'text-green-700 bg-green-100' : 'hover:text-green-700 hover:bg-green-100 active:bg-green-200' }} focus:outline-none transition-all duration-300">
                    Beranda
                </a>
            </li>
            <li class="py-1">
                <a href="{{ route('profil.lengkap') }}"
                    class="block py-2 px-4 rounded-md {{ request()->routeIs('profil.lengkap') ? 'text-green-700 bg-green-100' : 'hover:text-green-700 hover:bg-green-100 active:bg-green-200' }} focus:outline-none transition-all duration-300">
                    Profil
                </a>
            </li>
            <li class="py-1">
                <a href="{{ route('pelayanan.lengkap') }}"
                    class="block py-2 px-4 rounded-md {{ request()->routeIs('pelayanan.lengkap') ? 'text-green-700 bg-green-100' : 'hover:text-green-700 hover:bg-green-100 active:bg-green-200' }} focus:outline-none transition-all duration-300">
                    Pelayanan
                </a>
            </li>
            <li class="py-1">
                <a href="{{ route('berita.selengkapnya') }}"
                    class="block py-2 px-4 rounded-md {{ request()->routeIs('berita.selengkapnya') ? 'text-green-700 bg-green-100' : 'hover:text-green-700 hover:bg-green-100 active:bg-green-200' }} focus:outline-none transition-all duration-300">
                    Informasi Publik
                </a>
            </li>
            <li class="py-1">
                <a href="{{ route('promotion.selengkapnya') }}"
                    class="block py-2 px-4 rounded-md {{ request()->routeIs('promotion.selengkapnya') ? 'text-green-700 bg-green-100' : 'hover:text-green-700 hover:bg-green-100 active:bg-green-200' }} focus:outline-none transition-all duration-300">
                    Promo Spesial
                </a>
            </li>
            <li class="py-1">
                <a href="{{ route('infoTT') }}"
                    class="block py-2 px-4 rounded-md {{ request()->routeIs('infoTT') ? 'text-green-700 bg-green-100' : 'hover:text-green-700 hover:bg-green-100 active:bg-green-200' }} focus:outline-none transition-all duration-300">
                    Info Kamar
                </a>
            </li>
            
            <li class="py-1">
                <button
                    class="w-full bg-green-700 text-white px-4 py-2 rounded-md font-semibold shadow-md hover:bg-green-800 hover:shadow-lg active:bg-green-900 focus:outline-none transition-all duration-300">
                    Booking Online
                </button>
            </li>
            <li class="py-1">
                @if (Auth::check())
                    <a href="{{ route('dashboard') }}"
                        class="border border-green-700 text-green-700 px-4 py-2 rounded-md font-semibold hover:bg-green-100 flex items-center gap-2">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="border border-green-700 text-green-700 px-4 py-2 rounded-md font-semibold hover:bg-green-100 flex items-center gap-2">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                @endif

            </li>
        </ul>
    </div>
