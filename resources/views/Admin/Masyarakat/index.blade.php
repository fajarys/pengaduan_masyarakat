@extends('layouts.admin')

@section('title', 'Masyarakat')
    
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Masyarakat')
    
@section('content')
    <table id="masyarakatTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($masyarakat as $key => $val)
            <tr>
                <td>{{ $key += 1 }}</td>
                <td>{{ $val->nik }}</td>
                <td>{{ $val->nama }}</td>
                <td>{{ $val->username }}</td>
                <td>{{ $val->telp }}</td>
                <td><a href="{{ route('masyarakat.show', $val->nik) }}" style="text-decoration: underline">Lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#masyarakatTable').DataTable();
        } );
    </script>
@endsection