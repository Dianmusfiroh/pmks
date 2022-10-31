
@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('pmks'))

@section('form-create')
<form action="{{ route($modul.'.update',$kecamatan->id)}}" method="POST">
    @csrf
    @method('PUT')
    @endsection
    @section('card-body')
    <div class="form-group row">
        <div class="label col-md-3">Nama Kecamatan</div>
        <div class="col-md-9">
            <input type="text" name="nama_kecamatan" id="nama_kecamatan" value="{{$kecamatan->nama_kecamatan}}" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Nama Kepala Kecamatan</div>
        <div class="col-md-9">
            <input type="text" name="nama_camat" id="nama_camat" value="{{$kecamatan->nama_camat}}" class="form-control mt-2" placeholder="Masukan Jenis PMKS">
        </div>
    </div>

    <div class="form-group row">
        <div class="label col-md-3">NIP</div>
        <div class="col-md-9">
            <input type="number" name="nip" id="nip"value="{{$kecamatan->nip}}"  class="form-control mt-2" placeholder="Masukan Jenis Bantuan">
        </div>
    </div>

    @endsection
