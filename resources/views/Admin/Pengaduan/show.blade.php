@extends('layouts.admin')

@section('title','Pengaduan')
    
@section('header' , 'Data Pengaduan')

@section('header')
    <a href="{{ route('pengaduan.index')}}" class="text-primary">Data Pengdauan</a>
    <a href="#" class="text-decoration-none"></a>
@endsection

@section('content')

    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="card">
          <div class="card-header">
            <div class="text-center">Pengdauan Masyarakat</div>
          </div>
          <table class="table">
            <tr>
              <th class="text-center">NIK</th>
              <th>:</th>
              <td>{{ $pengaduan->nik }}</td>
            </tr>
            <tr>
              <th class="text-center">Tanggal Pengaduan</th>
              <th>:</th>
              <td>{{ $pengaduan->tgl_pengaduan }}</td>
            </tr>
            <tr>
              <th class="text-center">Foto</th>
              <th>:</th>
              <td><img src="{{ Storage::url($pengaduan->foto) }}" alt="foto" class="embed-responsive">Foro Pengaduan</td>
            </tr>
            <tr>
              <th class="text-center">Isi Laporan</th>
              <th>:</th>
              <td>{{ $pengaduan->isi_laporan }}</td>
            </tr>
            <tr>
              <th class="text-center">Status</th>
              <th>:</th>
              <td>
                @if ($pengaduan->status == '0')
                  <a href="#" class="badge badge-danger">Pending</a>
                @elseif ($pengaduan->status == 'proses')
                  <a href="#" class="badge badge-warning">Proses</a>
                @else
                  <a href="" class="badge badge-succes">Selesai</a>
                @endif
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
@endsection