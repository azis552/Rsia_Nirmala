@extends('template.master')
@section('content')
    <div class="bg-[#8BF0AB] min-h-screen p-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Konten Utama -->
            <div class="md:col-span-2 bg-white rounded-2xl shadow-lg p-6 space-y-6">
                <div class="w-full aspect-video overflow-hidden rounded-xl">
                    <img src="{{ asset('images/berita/' . $berita->gambar) }}" alt="Gambar Artikel"
                        class="w-full h-full object-cover" />
                </div>
                <div class="space-y-2">
                    <span class="inline-block px-3 py-1 bg-green-600 text-white rounded-full text-sm font-medium">Kategori:
                        {{ $berita->kategori }}</span>
                    <h1 class="text-3xl font-bold text-green-700">{{ $berita->judul }}</h1>
                    <hr>
                    <p class="text-gray-700 text-sm">{{ $berita->created_at->format('d F Y') }}</p>
                    <p class="text-gray-800 text-base leading-relaxed">
                        {!! $berita->deskripsi !!}
                    </p>
                </div>

                <section class="flex justify-center py-10 px-4 bg-gray-100">
                    <div class="max-w-md w-full bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4">
                            <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Ikuti Kami di Instagram</h2>

                            <div class="flex justify-center">
                                <blockquote class="instagram-media"
                                    data-instgrm-permalink="{{ $berita->linkInstagram }}" data-instgrm-version="14"
                                    style="background:#FFF; border:0; margin:0; max-width:540px; padding:0; width:100%;">
                                </blockquote>
                            </div>

                        </div>
                    </div>

                    <!-- Instagram Embed Script -->
                    <script async src="//www.instagram.com/embed.js"></script>
                </section>
                <div class="flex justify-end">
                    <a href="#"
                        class="px-5 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-full shadow">
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Sidebar Berita Lainnya -->
            <aside class="bg-white rounded-2xl shadow-lg p-4 space-y-4">
                <h2 class="text-xl font-semibold text-green-700 border-b pb-2">Berita Lainnya</h2>
                @foreach ($beritalain as $item)
                    <!-- Item berita -->
                    <div class="flex items-start gap-3 border-b pb-3">
                        <img src="{{ asset('images/berita/' . $item->gambar) }}" alt="Thumb"
                            class="w-16 h-16 rounded object-cover">
                        <div class="flex-1">
                            <h3 class="text-sm font-bold text-gray-800 line-clamp-2">{{ $item->judul }}</h3>
                            <p class="text-xs text-gray-500">{{ $item->created_at->format('d F Y') }}</p>
                            <a href="{{ route('berita.show', $item->slug) }}"
                                class="text-green-600 text-xs hover:underline">Baca</a>
                        </div>
                    </div>
                @endforeach
            </aside>

        </div>
    </div>
@endsection
