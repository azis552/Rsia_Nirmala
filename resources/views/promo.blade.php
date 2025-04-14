@extends('template.master')
@section('content')
    <div class="bg-[#8BF0AB] min-h-screen p-6">
        <div class="max-w-7xl mx-auto grid  gap-6">

            <!-- Konten Utama -->
            <div class="md:col-span-2 bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Promotion</h2>
                <hr>
                <!-- Grid promotion -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
                            <button onclick="showModal('modalImage')" data-image="{{ asset('storage/promotion/' . $promotion->image) }}"
                                class="text-white bg-green-700 px-4 py-2 text-sm rounded-md opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 scale-95 group-hover:scale-100 transition duration-500 delay-300 z-10">
                                Selengkapnya
                            </button>

                            
                        </div>
                    </div>
                @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-8">
                    {{ $promotions->links() }}
                </div>
            </div>

            
        </div>
    </div>
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