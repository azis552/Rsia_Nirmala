@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Berkas</h1>
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
                        <a type="button" class="btn btn-warning" href="{{ route('berkasPegawai.create') }}">
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="display  nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Berkas</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($berkas as $item)
                                    <tr>
                                        <td>{{ $item->nama_berkas }}</td>
                                        <td>{{ $item->berkas }}</td>
                                        <td>
                                            <a href="{{ asset('storage/berkas/' . $item->berkas) }}" target="_blank">
                                                <button class="btn btn-primary btn-sm">Lihat Berkas</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('berkasPegawai.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus berkas ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
