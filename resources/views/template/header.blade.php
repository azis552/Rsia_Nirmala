<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ @$profil->perusahaan != null ? @$profil->perusahaan : 'Perusahaan' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<style>
    .pagination .page-link {
        color: #16a34a;
        /* Warna teks hijau */
        border-color: #16a34a;
        /* Warna border hijau */
    }

    .pagination .page-link:hover {
        background-color: #16a34a;
        /* Warna latar hijau saat hover */
        color: #ffffff;
        /* Warna teks putih */
    }

    .pagination .page-item.active .page-link {
        background-color: #16a34a;
        /* Warna latar hijau untuk halaman aktif */
        border-color: #16a34a;
        /* Warna border hijau untuk halaman aktif */
        color: #ffffff;
        /* Warna teks putih */
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
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center relative">
        <!-- Logo -->
        <div class="flex items-center gap-4">
            <img src="{{ @$profil->logo != null ? asset('images/' . @$profil->logo) : asset('images/preview.png') }}"
                alt="Logo RSIA" class="h-20 w-auto max-w-full object-contain" />

        </div>

        <!-- Menu Navigasi (Desktop) -->
        <ul class="hidden md:flex space-x-3 font-bold text-lg">
            <li>
                <a href="{{ route('landingpage') }}"
                    class="px-3 py-2 {{ request()->routeIs('landingpage') ? 'text-green-700 underline' : 'hover:text-green-700' }}">
                    Beranda
                </a>
            </li>

            <li>
                <a href="{{ route('dokterlengkap') }}"
                    class="px-3 py-2 {{ request()->routeIs('dokterlengkap') ? 'text-green-700 underline' : 'hover:text-green-700' }}">
                    Dokter
                </a>
            </li>
            <li>
                <a href="{{ route('profil.lengkap') }}"
                    class="px-3 py-2 {{ request()->routeIs('profil.lengkap') ? 'text-green-700 underline' : 'hover:text-green-700' }}">
                    Profil
                </a>
            </li>
            <li>
                <a href="{{ route('poliklinik.lengkap') }}"
                    class="px-3 py-2 {{ request()->routeIs('poliklinik.lengkap') ? 'text-green-700 underline' : 'hover:text-green-700' }}">
                    Poliklinik
                </a>
            </li>
            <li>
                <a href="{{ route('pelayanan.lengkap') }}"
                    class="px-3 py-2 {{ request()->routeIs('pelayanan.lengkap') ? 'text-green-700 underline' : 'hover:text-green-700' }}">
                    Pelayanan
                </a>
            </li>
            <li>
                <a href="{{ route('berita.selengkapnya') }}"
                    class="px-3 py-2 {{ request()->routeIs('berita.selengkapnya') ? 'text-green-700 underline' : 'hover:text-green-700' }}">
                    Informasi Publik
                </a>
            </li>
            <li>
                <a href="{{ route('promotion.selengkapnya') }}"
                    class="px-3 py-2 {{ request()->routeIs('promotion.selengkapnya') ? 'text-green-700 underline' : 'hover:text-green-700' }}">
                    Promo Spesial
                </a>
            </li>
        </ul>

        <!-- Tombol Aksi (Desktop) -->
        <div class="hidden md:flex items-center gap-3">
            <a href="#"
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
                <a href="{{ route('berita.selengkapnya') }}"
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
