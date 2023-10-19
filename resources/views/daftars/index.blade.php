@extends('layouts.backend.master')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
</div>
<div class="pull-right">
<a class="btn btn-success" href="{{ route('daftars.create') }}">Daftar</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nik</th>
        <th>Nama</th>
        <th>Tempat</th>
        <th>Tanggal</th>
        <th>Jenis Kelamin</th>
        <th>Golongan Darah</th>
        <th>Alamat</th>
        <th>Status Perkawinan</th>
        <th>Pekerjaan</th>
        <th>Kewarganegaraan</th>
<th width="280px">Action</th>
</tr>
@foreach ($daftars as $daftar)
<tr>
    <td>{{ ++$i }}</td>
    <td> {{$daftar->nik}}</td>
    <td> {{$daftar->nama}}</td>
    <td> {{$daftar->tmpt_lhr}}</td>
    <td> {{$daftar->ttgl_lhir}}</td>
    <td> {{$daftar->jenkel}}</td>
    <td> {{$daftar->goldarah}}</td>
    <td> {{$daftar->alamat}}</td>
    <td> {{$daftar->agama}}</td>
    <td> {{$daftar->status}}</td>
    <td> {{$daftar->pekerjaan}}</td>
    <td> {{$daftar->kewarga}}</td>
<td>
<form action="{{ route('daftars.destroy',$daftar->id) }}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $daftars->links() !!}
@endsection
