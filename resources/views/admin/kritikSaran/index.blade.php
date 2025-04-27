


@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Data kritik dan Saran</h1>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <textarea name="pesan" class="form-control"  style="height: 200px" id="pesan" cols="30" rows="10" >

          </textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
                <div class="card">
                    <div class="card-header">
                        <!-- Button Tambah -->
                        
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="display  nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($kritiks as $kritik)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kritik->name }}</td>
                                        <td>{{ $kritik->email }}</td>
                                        <td>{{ $kritik->no_hp }}</td>
                                        <td>{{ Str::limit($kritik->message, 20) }}</td>
                                        <td>
                                          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" id="btnKritik" data-pesan="{{ $kritik->message }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-comment"></i>
  </button>
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

            $('#btnKritik').on('click', function() {
                var pesan = $(this).data('pesan');
                $('#pesan').val(pesan);
            });
        });



    </script>
@endsection
