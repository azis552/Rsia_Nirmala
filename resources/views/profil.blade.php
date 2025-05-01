@extends('template.master')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-green-700 text-center mb-10">Profil Kami</h1>

        <!-- Foto dan Sambutan Direktur -->
        <div
            class="flex flex-col md:flex-row items-center md:items-start md:space-x-8 bg-white p-6 rounded-xl shadow-lg mb-10 border-t-4 border-green-700">

            <div class="w-full md:w-1/3 mb-6 md:mb-0 border-2 border-green-600 rounded-xl overflow-hidden">
                <img src="{{ $profil->direktur != null ? asset('storage/images/' . $profil->direktur) : asset('images/preview.png') }}"
                    alt="Direktur" class="rounded-xl shadow-md w-full h-[300px] object-cover">
            </div>

            <div class="w-full md:w-2/3 text-justify">
                <h2 class="text-xl font-semibold text-green-700 mb-2">{{ $profil->nama_direktur }}</h2>
                <p class="text-gray-700 leading-relaxed">
                    {{ $profil->tentang != null ? $profil->tentang : 'Sambutan Direktur belum tersedia.' }}
                </p>
            </div>
        </div>

        <!-- Visi Misi Motto -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Visi -->
            <div class="bg-green-100 p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold text-green-700 mb-2">Visi</h3>
                <p class="text-gray-700 leading-relaxed">
                    {{ $profil->visi != null ? $profil->visi : 'Visi belum tersedia.' }}
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-green-50 p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold text-green-700 mb-2">Misi</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    @if ($profil->misi != null)
                        @php
                            $misiArray = explode(';', $profil->misi);
                        @endphp
                        @foreach ($misiArray as $misi)
                            @if (trim($misi) !== '')
                                <li>{{ trim($misi) }}</li>
                            @endif
                        @endforeach
                    @else
                        <li>Misi belum tersedia.</li>
                    @endif
                </ul>
            </div>

            <!-- Motto -->
            <div class="bg-green-100 p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold text-green-700 mb-2">Motto</h3>
                <p class="text-gray-700 italic">
                    "{{ $profil->motto != null ? $profil->motto : 'Motto belum tersedia.' }}"
                </p>
            </div>
        </div>
    </div>
@endsection
