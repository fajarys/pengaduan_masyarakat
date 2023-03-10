@extends('layouts.admin')

@section('title','Dashboard')
    
@section('header' , 'Selamat Datang')

@section('content')
    <div class="row">
      <div class="col-md-3">
        <div class="card bg-info text-white">
          <div class="card-header text-center">Petugas</div>
          <div class="card-body">
            <div class="text-center">
              {{ $petugas }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-dark text-white">
          <div class="card-header text-center">Masyarakat</div>
          <div class="card-body">
            <div class="text-center">
              {{ $masyarakat }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-warning text-white">
          <div class="card-header text-center ">Proses</div>
          <div class="card-body">
            <div class="text-center">
              {{ $proses }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-success text-white">
          <div class="card-header text-center ">Selesai</div>
          <div class="card-body">
            <div class="text-center">
              {{ $selesai }}
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
