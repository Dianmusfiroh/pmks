
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
        <div class="label col-md-3">Nama Lengkap</div>
        <div class="col-md-9">
            <input type="text" name="nama" id="name" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-4">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            
        </div>
        <input type="text" name="ket_jenis_pmks" class="col-md-5 form-control">

    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis Disabilitas</div>
        <div class="col-md-9">
            <select name="id_jenis_disabilitas" class="form-control" id="id_jenis_disabilitas">
                <option >Pilih Jenis Disabilitas</option>
               @foreach ($jenisDisabilitas as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Spesifik Kecacatan</div>
        <div class="col-md-9">
            <select name="id_spesific_cacat" class="form-control" id="id_spesific_cacat">
                <option >Pilih Spesifik Kecacatan</option>
               @foreach ($spesificKecacatan as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <label for=""></label>
    <div class="form-group row">
        <div class="label col-md-3">Status Rumah</div>
        <div class="col-md-9">
            <select name="id_status_rumah" class="form-control" id="id_status_rumah">
                <option >Pilih Status Rumah</option>
               @foreach ($stsRumah as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Ket Status Rumah</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Ket Status Rumah</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    @endsection
