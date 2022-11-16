
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
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="id_pmks" id="pesertaPMKS" class="form-control" >
		<option>Nama Peserta</option>
            </select>
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
        <input type="text" name="ket_jenis_pmks" placeholder="Keterangan Jenis PMKS" id="ket_jenis_pmks" class="col-md-5 
form-control">

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
            <select name="id_ket_status_rumah" class="form-control" id="id_ket_status_rumah">
                <option >Pilih Ket Status Rumah</option>
               @foreach ($ketStsRumah as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Status Keberadaan Keluarga</div>
        <div class="col-md-9">
            <select name="id_status_keberadaan_keluarga" class="form-control" id="id_status_keberadaan_keluarga">
                <option >Pilih Status Keberadaan Keluarga</option>
               @foreach ($stsKeberadaanKeluarga as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <label for="">ADL</label>
    <div class="form-group row">
        <div class="label col-md-3">Makan</div>
        <div class="col-md-9">
            <select name="id_adl_makan" class="form-control" id="id_adl_makan">
                <option >Pilih Status Makan</option>
               @foreach ($adlMakan as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Mandi</div>
        <div class="col-md-9">
            <select name="id_adl_mandi" class="form-control" id="id_adl_mandi">
                <option >Pilih Status Mandi</option>
               @foreach ($adlMandi as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Status Perawatan Diri</div>
        <div class="col-md-9">
            <select name="id_adl_perawatan" class="form-control" id="id_adl_perawatan">
                <option >Pilih Status Perawatan Diri</option>
               @foreach ($adlPerawatanDiri as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Status Pakaian</div>
        <div class="col-md-9">
            <select name="id_adl_pakaian" class="form-control" id="id_adl_pakaian">
                <option >Pilih Status Pakaian</option>
               @foreach ($adlPakaian as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Buang Air Besar/Kecil</div>
        <div class="col-md-9">
            <select name="id_adl_bab" class="form-control" id="id_adl_bab">
                <option >Pilih Status Buang Air Besar/Kecil</option>
               @foreach ($adlBab as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Tranfer</div>
        <div class="col-md-9">
            <select name="id_adl_transfer" class="form-control" id="id_adl_transfer">
                <option >Pilih Status Tranfer</option>
               @foreach ($adlTransfer as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kepemilikan Bantuan</div>
        <div class="col-md-9">
            <select name="id_kppk" class="form-control" id="id_kppk">
                <option >Pilih Kepemilikan Bantuan</option>
               @foreach ($kppk as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Usulan Bantuan</div>
        <div class="col-md-9">
            <select name="id_uppk" class="form-control" id="id_uppk">
                <option >Pilih Usulan Bantuan</option>
               @foreach ($uppk as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Keterangan Usulan Bantuan</div>
        <div class="col-md-9">
            <input type="text" class="form-control" name="ket_uppk" id="ket_uppk">
        </div>
    </div>
  

    @include('sweetalert::alert')
    @endsection
    @section('plugins.Select2', true)
    @section('js')
        <script>
            $( "#pesertaPMKS" ).select2({
                ajax: {
                    url: "{{url('search')}}",
                    dataType: 'json',
                    delay: 250,
                    data: function (term, page) {
                        return {
                            search: term.term, // search term
                            searchFields:'id:like'
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        </script>
    @endsection
    
