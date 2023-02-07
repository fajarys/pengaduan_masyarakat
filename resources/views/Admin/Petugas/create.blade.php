@extends('layouts.admin')

@section('title','Tambah Petugas')
    
@section('header')
<a href="{{ route('petugas.index')}}" class="text-primary">Data Petugas</a>
<a href="#" class="text-decoration-none">/</a>
<a href="#" class="text-decoration-none">Tambah Petugas</a>
@endsection

@section('content')
    <div class="row">
      <div class="col-lg-8 mx-auto">
          @if (Session::has('username'))
            <div class="alert alert-danger">
              {{ Session::get('username') }}
            </div>
          @endif
          @if ($errors->any())
          @foreach ($errors->all() as $error)
              <div class="alert alert-danger">{{ $error }}</div>
          @endforeach
      @endif
        <div class="card">
          <div class="card-header text-center font-weight-bold">
            Tambah Petugas
          </div>
          <div class="card-body">
            <form action="{{ route('petugas.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="nama_petugas">Nama</label>
                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="telp">Telp</label>
                <input type="number" name="telp" id="telp" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="level">Level</label>
                <div class="input-group mb-2">
                  <select name="level" id="level" class="custom-select">
                    <option value="petugas" selected>Pilih level (Default = Petugas)</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" style="width: 100%;">SIMPAN</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection