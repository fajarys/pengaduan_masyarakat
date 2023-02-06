@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">   
@endsection

@section('title','Pengaduan')
    
@section('header' , 'Data Pengaduan')

@section('content')
    <table id="tabelPengaduan" class="table">
      <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Tanggal</th>
          <th>Isi Laporan</th>
          <th>Status</th>
          <th>Detail</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach ($pengaduan as $key => $val)
              <td>{{ $key += 1 }}</td>
              <td>{{ $val->tgl_pengaduan->format('d-M-Y') }}</td>
              <td>{{ $val->isi_laporan }}</td>
              <td>
                @if ($val->status == '0')
                    <a href="#" class="badge badge-danger">Pending</a>
                @elseif ($val->status == 'proses')
                  <a href="#" class="badge badge-warning">Proses</a>
                @else
                  <a href="" class="badge badge-succes">Selesai</a>
                @endif
              </td>
              <td><a href="{{ route('pengaduan.show' , $val->id_pengaduan ) }}" style="text-decoration: underline;">Lihat</a></td>
          @endforeach
        </tr>
      </tbody>
    </table>
@endsection

@section('js')
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
  <script>
    $(document).ready(function () {
      $('#tabelPengaduan').DataTable();
    });
  </script>
@endsection 