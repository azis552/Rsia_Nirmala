@extends('template.master')
@section('content')
    <div class="bg-[#8BF0AB] min-h-screen p-6">
        <div class="max-w-7xl mx-auto grid  gap-6">

            <!-- Konten Utama -->
            <div class="md:col-span-2 bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Publik</h2>
                <hr>
                <!-- Grid Berita -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($beritas as $berita)
                        <!-- Card -->
                        <div class="bg-white rounded-xl shadow-md p-4">
                            <img src="{{ asset('images/berita/' . $berita->gambar) }}" alt="berita"
                                class="rounded-xl w-full h-48 object-cover mb-3" />
                            <p class="text-sm text-gray-500">{{ date('d F Y', strtotime($berita->created_at)) }}</p>
                            <h3 class="font-semibold text-md mt-1 text-gray-800">{{ $berita->judul }}</h3>
                            <p class="text-sm mt-2 text-gray-600">{{ Str::limit($berita->deskripsi, 80) }}
                                <a href="{{ route('berita.show', $berita->slug) }}"
                                    class="font-semibold text-green-700">Baca
                                    Selengkapnya</a>
                            </p>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-8">
                    {{ $beritas->links() }}
                </div>
            </div>

            
        </div>
    </div>
@endsection