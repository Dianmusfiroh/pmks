
@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('pmks'))

@section('form-create')
<form action="{{ route($modul.'.update',$pmks->id)}}" method="POST">
    @csrf
    @method('PUT')
    @endsection
    @section('card-body')
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <input type="text" value="{{$pmks->jenis_pmks}}" name="jenis_pmks" id="jenis_pmks" class="form-control mt-2" placeholder="Masukan Jenis PMKS">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Nama Lengkap</div>
        <div class="col-md-9">
            <input type="text" name="nama" value="{{$pmks->nama}}" id="nama" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Nomor KK</div>
        <div class="col-md-9">
            <input type="number" name="no_kk" id="name" value="{{$pmks->no_kk}}" class="form-control mt-2" placeholder="Masukan Nomor Kartu Keluarga">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">NIK</div>
        <div class="col-md-9">
            <input type="number" name="nik" id="nik" value="{{$pmks->nik}}" class="form-control mt-2" placeholder="Masukan Nomor NIK">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Tanggal Lahir</div>
        <div class="col-md-9">
            <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{$pmks->tgl_lahir}}"  class="form-control mt-2" placeholder="Masukan Nomor Hp">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Alamat</div>
        <div class="col-md-9">
            <input type="text" name="alamat" id="alamat" value="{{$pmks->alamat}}" class="form-control mt-2" placeholder="Masukan Alamat">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kelurahan</div>
        <div class="col-md-9">
            <input type="text" name="kelurahan" id="kelurahan" value="{{$pmks->kelurahan}}" class="form-control mt-2" placeholder="Masukan Kelurahan">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kecamatan</div>
        <div class="col-md-9">
            <input type="text" name="kecamatan" id="kecamatan" value="{{$pmks->kecamatan}}" class="form-control mt-2" placeholder="Masukan Kecamatan">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis Kelamin</div>
        <div class="col-md-9">
            <select name="jenis_kelamin" class="form-control" value="{{$pmks->jenis_kelamin}}" id="jenis_kelamin">
                <option value="{{$pmks->jenis_kelamin}}">{{$pmks->jenis_kelamin}}</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
    </div>
    @endsection
