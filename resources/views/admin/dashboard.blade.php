@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Overview</h1>

                <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                    <div class="inner">
                        <div class="app-card-body p-3 p-lg-4">
                            <h3 class="mb-3">Welcome, {{ Auth::user()->name }}</h3>
                            <div class="row gx-5 gy-3">
                                <div class="col-12 col-lg-9">

                                    <div>Selamat Datang </div>
                                </div><!--//col-->
                                
                            </div><!--//row-->
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!--//app-card-body-->

                    </div><!--//inner-->
                </div><!--//app-card-->
                @if (Auth::user()->role === 'admin')
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                            <div class="inner">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h3 class="mb-3">Data Booking</h3>
                                    <div class="row gx-5 gy-3">
                                        <div class="col-12 col-lg-9">
                                            <div>Jumlah Booking</div>
                                            <h2 class="mb-0">{{ $bookingCount }}</h2>
                                        </div><!--//col-->
                                        <div class="col-12 col-lg-3">
                                            <div class="text-center">
                                                <a href="{{ route('booking.index') }}" class="btn btn-primary">Lihat</a>
                                            </div>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div><!--//app-card-body-->
                            </div><!--//inner-->
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-12 col-lg-4">
                        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                            <div class="inner">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h3 class="mb-3">Data Dokter</h3>
                                    <div class="row gx-5 gy-3">
                                        <div class="col-12 col-lg-9">
                                            <div>Jumlah Dokter</div>
                                            <h2 class="mb-0">{{ $dokterCount }}</h2>
                                        </div><!--//col-->
                                        <div class="col-12 col-lg-3">
                                            <div class="text-center">
                                                <a href="{{ route('dokter.index') }}" class="btn btn-primary">Lihat</a>
                                            </div>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div><!--//app-card-body-->
                            </div><!--//inner-->
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-12 col-lg-4">
                        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                            <div class="inner">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h3 class="mb-3">Data Poliklinik</h3>
                                    <div class="row gx-5 gy-3">
                                        <div class="col-12 col-lg-9">
                                            <div>Jumlah Poliklinik</div>
                                            <h2 class="mb-0">{{ $poliklinikCount }}</h2>
                                        </div><!--//col-->
                                        <div class="col-12 col-lg-3">
                                            <div class="text-center">
                                                <a href="{{ route('poliklinik.index') }}" class="btn btn-primary">Lihat</a>
                                            </div>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div><!--//app-card-body-->
                            </div><!--//inner-->
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-12 col-lg-4">
                        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                            <div class="inner">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h3 class="mb-3">Data Rujukan</h3>
                                    <div class="row gx-5 gy-3">
                                        <div class="col-12 col-lg-9">
                                            <div>Jumlah Pelayanan</div>
                                            <h2 class="mb-0">{{ $rujukanCount }}</h2>
                                        </div><!--//col-->
                                        <div class="col-12 col-lg-3">
                                            <div class="text-center">
                                                <a href="{{ route('rujukan.index') }}" class="btn btn-primary">Lihat</a>
                                            </div>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div><!--//app-card-body-->
                            </div><!--//inner-->
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-12 col-lg-4">
                        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                            <div class="inner">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h3 class="mb-3">Data User</h3>
                                    <div class="row gx-5 gy-3">
                                        <div class="col-12 col-lg-9">
                                            <div>Jumlah User</div>
                                            <h2 class="mb-0">{{ $userCount }}</h2>
                                        </div><!--//col-->
                                        <div class="col-12 col-lg-3">
                                            <div class="text-center">
                                                <a href="{{ route('akun') }}" class="btn btn-primary">Lihat</a>
                                            </div>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div><!--//app-card-body-->
                            </div><!--//inner-->
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-12 col-lg-4">
                        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                            <div class="inner">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h3 class="mb-3">Data Berita</h3>
                                    <div class="row gx-5 gy-3">
                                        <div class="col-12 col-lg-9">
                                            <div>Jumlah Berita</div>
                                            <h2 class="mb-0">{{ $beritaCount }}</h2>
                                        </div><!--//col-->
                                        <div class="col-12 col-lg-3">
                                            <div class="text-center">
                                                <a href="{{ route('berita.index') }}" class="btn btn-primary">Lihat</a>
                                            </div>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div><!--//app-card-body-->
                            </div><!--//inner-->
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div><!--//row-->
                @else
                <div class="row">
                    <div class="col-12">
                        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                            <div class="inner">
                                <div class="app-card-body p-3 p-lg-4">
                                    <h3 class="mb-3">Data Rujukan</h3>
                                    <div class="row gx-5 gy-3">
                                        <div class="col-12 col-lg-9">
                                            <div>Jumlah Rujukan</div>
                                            <h2 class="mb-0">{{ $rujukanCount }}</h2>
                                        </div><!--//col-->
                                        <div class="col-12 col-lg-3">
                                            <div class="text-center">
                                                <a href="{{ route('rujukan.index') }}" class="btn btn-primary">Lihat</a>
                                            </div>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div><!--//app-card-body-->
                            </div><!--//inner-->
                        </div><!--//app-card-->
                    </div><!--//col-->
                @endif
               
                </div>
            </div><!--//container-fluid-->
        </div><!--//app-content-->


    </div><!--//app-wrapper-->
@endsection
