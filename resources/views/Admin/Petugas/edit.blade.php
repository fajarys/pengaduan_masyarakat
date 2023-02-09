@extends('layouts.admin')

@section('title','Edit Petugas')
    
@section('header')
<a href="{{ route('petugas.index')}}" class="text-primary">Data Petugas</a>
<a href="#" class="text-decoration-none">/</a>
<a href="#" class="text-decoration-none">Edit Petugas</a>
@endsection

@section('content')
    <div class="row">
      <div class="col-lg-8 mx-auto">
        @if (Session::has('notif'))
            <div class="alert alert-danger text-center">
                {{ Session::get('notif') }}
            </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger text-center">
                {{ $error }}
            </div>
            @endforeach
        @endif
    </div>
      <div class="col-lg-8 mx-auto">
        <div class="card">
          <div class="card-header text-center font-weight-bold">
            Edit Petugas
          </div>
          <div class="card-body">
            <form action="{{ route('petugas.update' , $petugas->id_petugas) }}" method="POST">
              @csrf
              @method('patch')
              <div class="form-group">
                <label for="nama_petugas">Nama</label>
                <input type="text" value="{{ $petugas->nama_petugas }}" name="nama_petugas" id="nama_petugas" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" value="{{ $petugas->username }}" name="username" id="username" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="telp">Telp</label>
                <input type="number" value="{{ $petugas->telp }}" name="telp" id="telp" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="level">Level</label>
                <div class="input-group mb-2">
                  <select name="level" id="level" class="custom-select">
                    @if ($petugas->level == 'admin')    
                    <option selected value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                    @else
                    <option value="admin">Admin</option>
                    <option selected value="petugas">Petugas</option>
                    @endif
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-warning" style="width: 100%;">UBAH DATA</button>
            </form>
            <form action="{{ route('petugas.destroy', $petugas->id_petugas)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger mt-2" style="width: 100%;" onclick="return confirm('Yakin Hapus?')">HAPUS</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection