@extends('template.master')
@section('content')
    <div class="bg-[#8BF0AB] min-h-screen p-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Konten Utama -->
            <div class="md:col-span-2 bg-white rounded-2xl shadow-lg p-6 space-y-6">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-green-600 text-white">
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Nama Ruang</th>
                                <th class="px-4 py-2 border">Nama Kelas</th>
                                <th class="px-4 py-2 border">Tersedia</th>
                                <th class="px-4 py-2 border">Pria</th>
                                <th class="px-4 py-2 border">Wanita</th>
                                <th class="px-4 py-2 border">Update Terakhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($list as $i => $item)
                                <tr class="text-center border">
                                    <td class="px-4 py-2 border">{{ $i + 1 }}</td>
                                    <td class="px-4 py-2 border">{{ $item['namaruang'] }}</td>
                                    <td class="px-4 py-2 border">{{ $item['namakelas'] }}</td>
                                    <td class="px-4 py-2 border">{{ $item['tersedia'] }}</td>
                                    <td class="px-4 py-2 border">{{ $item['tersediapria'] }}</td>
                                    <td class="px-4 py-2 border">{{ $item['tersediawanita'] }}</td>
                                    @php
                                        $cleanTime = preg_replace('/:\d{3}$/', '', $item['lastupdate']);
                                    @endphp

                                    <td class="px-4 py-2 border">
                                        {{ \Carbon\Carbon::parse($cleanTime)->format('d-m-Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">Tidak ada data tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('landingpage') }}"
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
