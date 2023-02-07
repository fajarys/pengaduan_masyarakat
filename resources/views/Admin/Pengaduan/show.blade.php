@extends('layouts.admin')

@section('title','Lihat Pengaduan')
    
@section('header')
<a href="{{ route('pengaduan.index')}}" class="text-primary">Data Pengdauan</a>
<a href="#" class="text-decoration-none">/</a>
<a href="#" class="text-decoration-none">Lihat Pengaduan</a>
@endsection

@section('content')

    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="card">
          <div class="card-header">
            <div class="text-center font-weight-bold">Pengdauan Masyarakat</div>
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
                  <a href="" class="badge badge-success">Selesai</a>
                @endif
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-8 mx-auto">
          <div class="card">
            <div class="card-header">
            <div class="text-center font-weight-bold">Tanggapan Masyarakat</div>
            </div>
            <div class="card-body">
              <form action="{{ route('tanggapan.createOrUpdate') }}" method="POST">
                 @csrf
                 <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                <div class="form-group">
                <label for="status">Status</label>
                <div class="input-group mb-3">
                  <select name="status" id="status" class="custom-select">
                    @if ($pengaduan->status == '0')
                        <option selected value="">Pending</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                    @elseif ($pengaduan->status == 'proses')
                        <option value="">Pending</option>
                        <option selected value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                    @else
                        <option value="">Pending</option>
                        <option value="proses">Proses</option>
                        <option selected value="selesai">Selesai</option>
                    @endif
                  </select>
                </div>
                <div class="form-group">
                  <label for="tanggapan">Tanggapan</label>
                  <textarea name="tanggapan" id="tanggapan" rows="5" class="form-control" placeholder="Belum ada tanggapan">{{ $tanggapan->tanggapan ?? '' }}</textarea>                  
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Kirim</button>
                </div>
              </form>
              @if (Session::has('status'))
                  <div class="alert alert-success mt-2">{{ Session::get('status') }}</div>
              @endif
            </div>
          </div>
      </div>
    </div>
@endsection