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
                    <th>No</th>
                    <th>Nik</th>
                    <th>Nama</th>
                    <th>Tempat</th>
                    <th>Tanggal</th>
                    <th>Jenis Kelamin</th>
                    <th>Golongan Darah</th>
                    <th>Alamat</th>
                    <th>Rt</th>
                    <th>RW</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Agama</th>
                    <th>Status Perkawinan</th>
                    <th>Pekerjaan</th>
                    <th>Kewarganegaraan</th>
                    <th>Foto</th>
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
                    <td>{{ ++$i }}</td>
                    <td> {{$pendaftaran->nik}}</td>
                    <td> {{$pendaftaran->nama}}</td>
                    <td> {{$pendaftaran->tempat}}</td>
                    <td> {{$pendaftaran->tanggal}}</td>
                    <td> {{$pendaftaran->jenkel}}</td>
                    <td> {{$pendaftaran->goldarah}}</td>
                    <td> {{$pendaftaran->alamat}}</td>
                    <td> {{$pendaftaran->rt}}</td>
                    <td> {{$pendaftaran->rw}}</td>
                    <td> {{$pendaftaran->kel}}</td>
                    <td> {{$pendaftaran->kec}}</td>
                    <td> {{$pendaftaran->agama}}</td>
                    <td> {{$pendaftaran->kawin}}</td>
                    <td> {{$pendaftaran->pekerjaan}}</td>
                    <td> {{$pendaftaran->kewarga}}</td>
                    <td> {{$pendaftaran->image}}</td>
                   <tr>

                   </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
