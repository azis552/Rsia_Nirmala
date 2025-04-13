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
