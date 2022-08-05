
@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('pmks'))

@section('form-create')
<form action="{{ route($modul.'.update',$CalonPenerima->id)}}" method="POST">
    @csrf
    @method('PUT')
    @endsection
    @section('card-body')
    <div class="form-group row">
        <div class="label col-md-3">Nama Lengkap</div>
        <div class="col-md-9">
            <input type="text" name="nama" id="name" value="{{$CalonPenerima->nama}}" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <input type="text" name="jenis_pmks" id="jenis_pmks" value="{{$CalonPenerima->jenis_pmks}}" class="form-control mt-2" placeholder="Masukan Jenis PMKS">
        </div>
    </div>

    <div class="form-group row">
        <div class="label col-md-3">Jenis Bantuan</div>
        <div class="col-md-9">
            <input type="text" name="jenis_bantuan" id="jenis_bantuan"value="{{$CalonPenerima->jenis_bantuan}}"  class="form-control mt-2" placeholder="Masukan Jenis Bantuan">
        </div>
    </div>

    @endsection
