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
                    {{-- <th>Rt</th>
                    <th>RW</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Agama</th> --}}
                    <th>Status Perkawinan</th>
                    <th>Pekerjaan</th>
                    <th>Kewarganegaraan</th>
                    <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($pendaftarans as $pendaftaran)
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
                    <td> {{$dd->nik}}</td>
                    <td> {{$dd->nama}}</td>
                    <td> {{$dd->tempat}}</td>
                    <td> {{$dd->tanggal}}</td>
                    <td> {{$dd->jenkel}}</td>
                    <td> {{$dd->goldarah}}</td>
                    <td> {{$dd->alamat}}</td>
                    {{-- <td> {{$dd->rt}}</td>
                    <td> {{$dd->rw}}</td>
                    <td> {{$dd->kel}}</td>
                    <td> {{$dd->kec}}</td> --}}
                    <td> {{$dd->agama}}</td>
                    <td> {{$dd->kawin}}</td>
                    <td> {{$dd->pekerjaan}}</td>
                    <td> {{$dd->kewarga}}</td>
                    <td> {{$dd->image}}</td>
                    <tr>
                      <a href="{{route('pendaftarans.show', ['id' => $p->nik])}}" class="btn btn-info">Detail</a>
                      <a href="{{route('pendaftarans.edit', ['id' => $p->nik])}}" class="btn btn-success">Ubah</a>
                      <form  class="d-inline" action="{{route('pendaftarans.destroy', ['id' => $p->nik])}}"
                      method="POST"  onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus pendaftaran?')" >
                      @csrf
                      <input type="hidden"name="_method" value="DELETE"/>
                      <button type="submit" class="btn btn-danger" >Hapus</button>
                      </form>
                 </td>
                 </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
