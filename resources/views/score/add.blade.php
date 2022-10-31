
@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('pmks'))

@section('form-create')
<form action="{{ route($modul.'.store')}}" method="POST">
    @csrf
    @endsection
    @section('card-body')
   

    <div class="form-group row">
        <div class="label col-md-3">Nilai</div>
        <div class="col-md-9">
            <input type="text" name="score" id="score" class="form-control mt-2" placeholder="Masukan Batasan Score">
        </div>
    </div>

    @endsection
