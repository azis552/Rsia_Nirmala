@extends('admin.template.master')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Profil Rumah Sakit</h1>
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
                    <div class="card-body">
                        <form action="{{ route('akun.update', Auth::user()->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Username</label>
                                <input type="text" class="form-control" name="nameEdit" value="{{ Auth::user()->name }}" id="nameEdit"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="emailEdit" value="{{ Auth::user()->email }}" id="emailEdit"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" >
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="roleEdit" class="form-select" id="roleEdit" required>
                                    <option value="faskes1" {{ Auth::user()->role == 'faskes1' ? 'selected' : '' }}>Faskes 1</option>
                                    <option value="admin"  {{ Auth::user()->role == 'admin' ? 'selected' : '' }} >Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="faskes" class="form-label">Faskes</label>
                                <input type="text" class="form-control" name="faskesEdit" id="faskesEdit">
                            </div>
                        
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('akun') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
                </div><!--//container-fluid-->
            </div><!--//app-content-->
        </div><!--//app-wrapper-->
    @endsection

