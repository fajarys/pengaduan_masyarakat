@extends('layouts.admin')


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">   
@endsection

@section('title','Petuguas')
    
@section('header' , 'Data Petugas')

@section('content')
    <a href="{{ route('petugas.create') }}" class="btn btn-primary mb-2">Tambah Petugas</a>
    <table id="petugasTabel" class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Petugas</th>
          <th>Username</th>
          <th>Telp</th>
          <th>Level</th>
          <th>Detail</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($petugas as $key => $val)
          <tr>
            <td>{{ $key += 1 }}</td>
            <td>{{ $val->nama_petugas }}</td>
            <td>{{ $val->username }}</td>
            <td>{{ $val->telp }}</td>
            <td>{{ $val->level }}</td>
            <td><a href="{{ route('petugas.edit', $val->id_petugas) }}" style="text-decoration: underline">Lihat</a></td>
          </tr>
          @endforeach
      </tbody>
    </table>
@endsection

@section('js')
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
  <script>
    $(document).ready(function () {
      $('#petugasTabel').DataTable();
    });
  </script>
@endsection 