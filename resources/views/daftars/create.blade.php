@extends('layouts.backend.master')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('daftars.index') }}"> Back</a>
</div>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('daftars.store') }}" method="POST">
@csrf
<div class='form-row'>
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
            <input type="text" name="tmpt_lhr" value="{{old('tmpt_lhr')}}" class="form-control" required/>
        </div>

        <div class="form-group col-6">
            <label>Tgl Lahir : </label>
            <input type="date" name="tgl_lhir" value="{{old('tgl_lhir')}}" class="form-control {{$errors->first('tgl_lhir') ? "is-invalid" : ""}}" required/>
            <div class="invalid-feedback">
                {{$errors->first('tgl_lhir')}}
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
            <select class="form-control" name="status "  required>
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
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
    </div>
</form>
@endsection
