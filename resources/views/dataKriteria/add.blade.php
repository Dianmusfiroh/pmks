
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
        <div class="label col-md-3">Nama Kriteria</div>
        <div class="col-md-9">
            <select name="nama_kriteria" class="form-control" id="nama_kriteria">
                <option >Pilih Nama Kriteria</option>
               <option value="Jenis PMKS">Jenis PMKS</option>
               <option value="Jenis Disabilitas">Jenis Disabilitas</option>
               <option value="Spesific Kecacatan"> Spesific Kecacatan </option>
               <option value="Status Keberadaan">Status Keberadaan Keluarga</option>
               <option value="Status Rumah">Status Rumah</option>
               <option value="Keterangan Status Rumah">Keterangan Status Rumah</option>
               <option value="adl Mandi">ADL Mandi</option>
               <option value="adl Makan">ADL Makan</option>
               <option value="adl Bab">ADL Buang Air Besar</option>
               <option value="adl Pakaian">ADL Pakaian</option>
               <option value="adl Perawatan">ADL Perawatan Diri</option>
               <option value="adl Transfer">ADL Transfer</option>
               <option value="Kepemilikan Bantuan">Kepemilikan Bantuan</option>
               <option value="Usulan Bantuan">Usulan Bantuan</option>
            </select>
        </div>
    </div>

    {{--  <div class="form-group row">
        <div class="label col-md-3">Nilai</div>
        <div class="col-md-9">
            <input type="number" name="value" id="value" class="form-control mt-2" placeholder="Masukan Batasan Score">
        </div>
    </div>  --}}
    <div class="form-group row">
        <div class="label col-md-3">Alias</div>
        <div class="col-md-9">
            <input type="text" name="alias" id="alias" class="form-control mt-2" placeholder="Masukan Batasan Alias">
        </div>
    </div>
    @endsection
