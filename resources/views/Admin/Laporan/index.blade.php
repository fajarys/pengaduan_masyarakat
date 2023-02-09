@extends('layouts.admin')

@section('title', 'Laporan')
    
@section('header', 'Laporan Pengaduan')
    
@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto mb-4">
            <div class="card">
                <div class="card-header">
                    Cari Berdasarkan Tanggal
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.getLaporan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="dari" class="form-control" placeholder="Tanggal Awal" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <div class="form-group">
                            <input type="text" name="ke" class="form-control" placeholder="Tanggal Akhir" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%">Cari Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                Data Berdasarkan Tanggal
                <div class="float-right">
                    @if ($pengaduan ?? '')
                        <a href="{{ route('laporan.cetakLaporan', ['dari' => $dari, 'ke' => $ke]) }}" class="btn btn-secondary">EXPORT PDF</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                @if ($pengaduan ?? '')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Isi Laporan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $key => $val)
                                <tr>
                                    <td>{{ $key += 1 }}</td>
                                    <td>{{ $val->tgl_pengaduan }}</td>
                                    <td>{{ $val->isi_laporan }}</td>
                                    <td>
                                        @if ($val->status == '0')
                                            <a href="" class="badge badge-danger">Pending</a>
                                        @elseif($val->status == 'proses')
                                            <a href="" class="badge badge-warning text-white">Proses</a>
                                        @else
                                            <a href="" class="badge badge-success">Selesai</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        Tidak ada data
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection