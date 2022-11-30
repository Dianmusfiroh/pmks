
@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('pmks'))

@section('form-create')
<form action="{{ route('status',$pmks->id)}}" method="POST">
    @csrf
    @method('PUT')
    @endsection
    @section('card-body')
    {{--  <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <input type="text" value="{{$pmks->jenis_pmks}}" name="jenis_pmks" id="jenis_pmks" class="form-control mt-2" placeholder="Masukan Jenis PMKS">
        </div>
    </div>  --}}
    <div class="form-group row">
        <div class="label col-md-3">Nama Lengkap</div>
        <div class="col-md-9">
            <input type="text" readonly name="nama" value="{{$pmks->nama}}" id="nama" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Nomor KK</div>
        <div class="col-md-9">
            <input type="number" readonly name="no_kk" id="name" value="{{$pmks->no_kk}}" class="form-control mt-2" placeholder="Masukan Nomor Kartu Keluarga">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">NIK</div>
        <div class="col-md-9">
            <input type="number" readonly name="nik" id="nik" value="{{$pmks->nik}}" class="form-control mt-2" placeholder="Masukan Nomor NIK">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Tanggal Lahir</div>
        <div class="col-md-9">
            <input type="date" readonly name="tgl_lahir" id="tgl_lahir" value="{{$pmks->tgl_lahir}}"  class="form-control mt-2" placeholder="Masukan Nomor Hp">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Alamat</div>
        <div class="col-md-9">
            <input type="text" readonly name="alamat" id="alamat" value="{{$pmks->alamat}}" class="form-control mt-2" placeholder="Masukan Alamat">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kelurahan</div>
        <div class="col-md-9">
            <input type="text" readonly name="kelurahan" id="kelurahan" value="{{$pmks->kelurahan}}" class="form-control mt-2" placeholder="Masukan Kelurahan">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kecamatan</div>
        <div class="col-md-9">
            <input type="text" readonly name="kecamatan" id="kecamatan" value="{{$pmks->kecamatan}}" class="form-control mt-2" placeholder="Masukan Kecamatan">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kota/Kabupaten</div>
        <div class="col-md-9">
            <input type="text" readonly name="kota" id="kota" value="{{$pmks->kota}}" class="form-control mt-2" placeholder="Masukan Kota/Kab">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Provinsi</div>
        <div class="col-md-9">
            <input type="text" readonly name="provinsi" id="provinsi" value="{{$pmks->provinsi}}" class="form-control mt-2" placeholder="Masukan Kota/Kab">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis Kelamin</div>
        <div class="col-md-9">
            <input type="text" readonly name="id_dtks" id="id_dtks" value="{{$pmks->jenis_kelamin}}" class="form-control mt-2" placeholder="Masukan Kota/Kab">

       
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">ID DTKS</div>
        <div class="col-md-9">
            <input type="text" readonly name="id_dtks" id="id_dtks" value="{{$pmks->id_dtks}}" class="form-control mt-2" placeholder="Masukan Kota/Kab">
        </div>
    </div>
    @if ($pmks->status  == 'konfirmasi')
    <div class="form-group row">
        <div class="label col-md-3">Status</div>
        <div class="col-md-9">
            <select name="status" class="form-control" id="status">
                <option >Pilih Persetujuan</option>
                <option value="sukses">Setuju</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div>
    </div>
    @endif

    @endsection
