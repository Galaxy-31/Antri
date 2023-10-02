@extends('layouts.backend.master')

@section('title')
    Data Konsumen {{$pendaftaran->name}}
@endsection
@forelse ($data as $item)
@section("content")


    <div class="card shadow mb-4">
        <div class="card-body">
        <div class="container">
  <div class="row justify-content-md-center">
    <div class="col col-lg-2">
      1 of 3
    </div>
    <div class="col-md-auto">
      Variable width content
    </div>
    <div class="col col-lg-2">
      3 of 3
    </div>
  </div>
  <div class="row">
    <div class="col">
      1 of 3
    </div>
    <div class="col-md-auto">
      Variable width content
    </div>
    <div class="col col-lg-2">
      3 of 3
    </div>
  </div>
</div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th width="25%"><b>Gambar</b></th>
                    <th width="25%"><b>NIK</b></th>
                    <th width="25%"><b>Nama</b></th>
                    <th width="25%"><b>Aksi</b></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($pendaftaran as $pendaftaran)
                   <tr>
                   <td>
                        @if($pendaftaran->foto)
                            <img
                            src="{{asset('storage/' . $pendaftaran->foto)}}"
                            width="48px"/>
                        @else
                            No image
                        @endif
                    </td>
                   <td>{{$pendaftaran->nik}}</td>
                   <td>{{$pendaftaran->nama}}</td>

                   </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
