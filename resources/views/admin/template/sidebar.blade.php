<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="{{ route('dashboard') }}"><img class="logo-icon me-2"
                    src="{{ asset('') }}assets/images/app-logo.svg" alt="logo"><span
                    class="logo-text">PORTAL</span></a>

        </div><!--//app-branding-->

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Overview</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->
                @if (Auth::user()->role != 'pegawai')
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('rujukan.index') ? 'active' : '' }} "
                            href="{{ route('rujukan.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-hospital-user fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Rujukan</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                @endif

                @if (Auth::user()->role == 'pegawai')
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('pegawai') ? 'active' : '' }} " href="{{ route('pegawai') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-regular fa-address-book fa-xl "></i>
                            </span>
                            <span class="nav-link-text">Pegawai</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                @endif

                @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('booking.index') ? 'active' : '' }} "
                            href="{{ route('booking.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-book-open-reader fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Booking</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->

                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('akun') ? 'active' : '' }} " href="{{ route('akun') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-regular fa-address-book fa-xl "></i>
                            </span>
                            <span class="nav-link-text">Akun</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->

                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('poliklinik.index') ? 'active' : '' }}"
                            href="{{ route('poliklinik.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-house-chimney-medical fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Poliklinik</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('dokter.index') ? 'active' : '' }}"
                            href="{{ route('dokter.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-user-doctor fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Dokter</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('jadwal.index') ? 'active' : '' }}"
                            href="{{ route('jadwal.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-calendar-days fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Jadwal Dokter</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('slider.index') ? 'active' : '' }} "
                            href="{{ route('slider.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-images fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Slider</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->

                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('unggulan.index') ? 'active' : '' }}"
                            href="{{ route('unggulan.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-note-sticky fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Unggulan</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('berita.index') ? 'active' : '' }} "
                            href="{{ route('berita.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-newspaper fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Berita & Artikel</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('profil.index') ? 'active' : '' }}"
                            href="{{ route('profil.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-building fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Profil</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('pelayanan.index') ? 'active' : '' }}"
                            href="{{ route('pelayanan.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-bell-concierge fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Pelayanan</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('promotion.index') ? 'active' : '' }} "
                            href="{{ route('promotion.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-sliders fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Promo Spesial</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('kamar.index') ? 'active' : '' }}"
                            href="{{ route('kamar.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-bed fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Kamar</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('fasilitasUnggulan.index') ? 'active' : '' }}"
                            href="{{ route('fasilitasUnggulan.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-toolbox fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Fasilitas Unggulan</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('partner.index') ? 'active' : '' }} "
                            href="{{ route('partner.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-handshake-angle fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Partner</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ Route::is('kritikSaran.index') ? 'active' : '' }} "
                            href="{{ route('kritikSaran.index') }}">
                            <span class="nav-icon ml-2">
                                <i class="fa-solid fa-comments fa-xl"></i>
                            </span>
                            <span class="nav-link-text">Kritik dan Saran</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                @endif
            </ul><!--//app-menu-->
        </nav><!--//app-nav-->

    </div><!--//sidepanel-inner-->
</div><!--//app-sidepanel-->
</header><!--//app-header-->
