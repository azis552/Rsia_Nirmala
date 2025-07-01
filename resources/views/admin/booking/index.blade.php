


@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Data Booking</h1>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <!-- Button Tambah -->
                        
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="display  nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Antrian</th>
                                    <th>Tanggal Booking</th>
                                    <th>Nama</th>
                                    <th>Poliklinik</th>
                                    <th>Dokter</th>
                                    <th>Jadwal</th>
                                    <th>Jenis Pasien</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $booking->no_antrian }}</td>
                                        <td>{{ $booking->tanggal_booking }}</td>
                                        <td>{{ $booking->nama }}</td>
                                        <td>{{ $booking->poliklinik->name }}</td>
                                        <td>{{ $booking->dokter->name }}</td>
                                        <td>{{ $booking->jadwal->hari }} , {{ $booking->jadwal->jam_mulai }} - {{ $booking->jadwal->jam_selesai }}</td>
                                        <td>{{ $booking->jenis_pasien }}</td>
                                        <td> 
                                            <form action="{{ Route('booking.destroy', $booking->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                    class="btn btn-danger text-white"><i class="fa-solid fa-trash"></i></button>
                                            </form>

                                            
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Tambahkan data lainnya di sini -->
                            </tbody>
                        </table>

                    </div>
                </div>

            </div><!--//container-fluid-->
        </div><!--//app-content-->


    </div><!--//app-wrapper-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });
        });

    </script>
@endsection
