<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Bagian atas -->
    <div class="bg-green-700 text-white text-sm py-2 px-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <span>Hubungi Kami</span>
            <span>|</span>
            <span><i class="fas fa-envelope"></i> rsianirmalakdr</span>
            <span>|</span>
            <span><i class="fa-solid fa-phone-volume"></i> 085-317-080-08</span>
        </div>
        <div class="bg-gray-200 text-green-700 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1">
            <i class="fa-solid fa-phone-volume"></i> Emergency Call <span class="text-black">085-317-080-08</span>
        </div>
    </div>

    <!-- Navbar utama -->
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center gap-4">
            <img src="https://via.placeholder.com/50" alt="Logo RSIA" class="h-12">
            <img src="https://via.placeholder.com/50" alt="Akreditasi" class="h-12">
        </div>

        <!-- Menu Navigasi -->
        <ul class="flex space-x-6 font-bold text-lg">
            <li><a href="#" class="hover:text-green-700"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="#" class="hover:text-green-700"><i class="fas fa-user"></i> Profil</a></li>
            <li><a href="#" class="hover:text-green-700"><i class="fas fa-concierge-bell"></i> Pelayanan</a></li>
            <li><a href="#" class="hover:text-green-700"><i class="fas fa-info-circle"></i> Informasi Publik</a></li>
            <li><a href="#" class="hover:text-green-700"><i class="fas fa-tags"></i> Promo Spesial</a></li>
        </ul>

        <!-- Tombol Booking -->
        <button class="bg-green-700 text-white px-4 py-2 rounded-md font-semibold hover:bg-green-800 flex items-center gap-2">
            <i class="fas fa-calendar-check"></i> Booking Online
        </button>
    </nav>

  </body>
</html>