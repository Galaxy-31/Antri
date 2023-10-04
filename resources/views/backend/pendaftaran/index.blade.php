@extends('layouts.backend.master')

@section('title')
    Kelola Loket
@endsection

@section("content")


<!-- index -->
@if(session('status'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif

    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <div class="input-group-append">
                <a href="{{route('v1.pendaftaran.index')}}" class="btn btn-primary">Tambah pendaftaran</a>
            </div>
        </div> -->
        <div class="card-body">
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
                </tr>
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
                        <a href="{{route('pendaftaran.show', ['id' => $p->nik])}}" class="btn btn-info">Detail</a>
                        <a href="{{route('pendaftaran.edit', ['id' => $p->nik])}}" class="btn btn-success">Ubah</a>
                        <form  class="d-inline" action="{{route('pendaftaran.destroy', ['id' => $p->nik])}}"
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

<!-- index -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <form enctype="multipart/form-data"  action="{{route('v1.pendaftaran.store')}}"  method="POST">
        @csrf
       <div class='form-row'>

            <div class="form-group col-12">
                <label>Nik : </label>
                <input type="number" name="nik" class="form-control {{$errors->first('nik') ? "is-invalid" : ""}}" value="{{old('nik')}}" required/>
                <div class="invalid-feedback">
                    {{$errors->first('nik')}}
                </div>
            </div>

            <div class="form-group col-12">
                <label>Nama : </label>
                <input type="text" name="nama" value="{{old('nama')}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Tempat Lahir : </label>
                <input type="text" name="tempat" value="{{old('tempat')}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Tgl Lahir : </label>
                <input type="date" name="tanggal" value="{{old('tanggal')}}" class="form-control {{$errors->first('tanggal') ? "is-invalid" : ""}}" required/>
                <div class="invalid-feedback">
                    {{$errors->first('tanggal')}}
                </div>
            </div>

            <div class="form-group col-6">
                <label>Jenis Kelamin : </label>
                <select class="form-control" name="jenkel" required>
                    <option value="">Silahkan Pilih</option>
                    <option value="Laki-Laki" {{old('jenkel') == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                    <option value="Perempuan" {{old('jenkel') == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label>Golongan Darah : </label>
                <select class="form-control" name="goldarah" required>
                    <option value="">Silahkan Pilih</option>
                    <option value="A" {{old('goldarah') == 'A' ? 'selected' : ''}}>A</option>
                    <option value="B" {{old('goldarah') == 'B' ? 'selected' : ''}}>B</option>
                    <option value="O" {{old('goldarah') == 'O' ? 'selected' : ''}}>O</option>
                    <option value="AB" {{old('goldarah') == 'AB' ? 'selected' : ''}}>AB</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Alamat : </label>
                <textarea name="alamat" class="form-control">{{old('alamat')}}</textarea>
            </div>

            <div class="form-group col-2">
                <label>RT : </label>
                <input type="numer" name="rt" value="{{old('rt')}}" class="form-control" required/>
            </div>

            <div class="form-group col-2">
                <label>RW : </label>
                <input type="numer" name="rw" value="{{old('rw')}}" class="form-control" required/>
            </div>

            <div class="form-group col-4">
                <label>Kel/Desa : </label>
                <input type="text" name="kel" value="{{old('rt')}}" class="form-control" required/>
            </div>

            <div class="form-group col-4">
                <label>Kecamatan : </label>
                <input type="text" name="kec" value="{{old('kec')}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Agama : </label>
                <select class="form-control" name="agama" required>
                    <option value="">Silahkan Pilih Agama</option>
                    <option value="Katholik" {{old('agama') == 'Katholik' ? 'selected' : ''}}>Katholik</option>
                    <option value="Kristen" {{old('agama') == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                    <option value="Islam" {{old('agama') == 'Islam' ? 'selected' : ''}}>Islam</option>
                    <option value="Hindu" {{old('agama') == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                    <option value="Budha" {{old('agama') == 'Budha' ? 'selected' : ''}}>Budha</option>
                    <option value="Konghucu" {{old('agama') == 'Konghucu' ? 'selected' : ''}}>Konghucu</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label>Status Perkawinan : </label>
                <select class="form-control" name="kawin"  required>
                    <option value="Kawin" {{old('kawin') == 'Kawin' ? 'selected' : ''}}>Kawin</option>
                    <option value="Belum Kawin" {{old('kawin') == 'Belum Kawin' ? 'selected' : ''}}>Belum Kawin</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label>Pekerjaan : </label>
                <input type="text" name="pekerjaan" value="{{old('pekerjaan')}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Kewarganegaraan : </label>
                <select class="form-control" name="kewarga" required>
                    <option value="WNI" {{old('kewarga') == 'WNI' ? 'selected' : ''}}>WNI</option>
                    <option value="WNA" {{old('kewarga') == 'WNA' ? 'selected' : ''}}>WNA</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Foto : </label><br>
                <input type="file" name="image" value="{{old('image')}}" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}"/>
                <div class="invalid-feedback">
                    {{$errors->first('image')}}
                </div>
            </div>
        </div>
        <br>
        <hr>
        <input type="submit" class="btn btn-primary" value="Tambah">
      </form>
    </div>
  </div>
@endsection
