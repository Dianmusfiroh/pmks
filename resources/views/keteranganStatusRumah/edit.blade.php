
@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('pmks'))

@section('form-create')
<form action="{{ route($modul.'.update',$KeteranganStatusRumah->id)}}" method="POST">
    @csrf
    @method('PUT')
    @endsection
    @section('card-body')
    <div class="form-group row">
        <div class="label col-md-3">Nama </div>
        <div class="col-md-9">
            <input type="text" name="name" id="name" value="{{$KeteranganStatusRumah->name}}" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>

    <div class="form-group row">
        <div class="label col-md-3"> Value</div>
        <div class="col-md-9">
            <input type="text" name="value" id="value"value="{{$KeteranganStatusRumah->value}}"  class="form-control mt-2" placeholder="Masukan Jenis Bantuan">
        </div>
    </div>

    @endsection
