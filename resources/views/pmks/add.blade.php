
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
    {{--  <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-9">
            <select name="jenis_pmks" id="jenis_pmks" class="form-control">
                <option value="Anak Balita Terlantar">Anak Balita Terlantar(ABT)</option>
                <option value="Anak Terlantar">Anak Terlantar(AT)</option>
                <option value="Anak Berhadapan Dengan Hukum">Anak Berhadapan Dengan Hukum(ABH)</option>
                <option value="Anak Jalanan">Anak Jalanan(AJ)</option>
                <option value="Anak Dengan Disabilitas">Anak Dengan Disabilitas</option>
                <option value="Anak Yang Menjadi Korban Tindak Kekerasan">Anak Yang Menjadi Korban Tindak Kekerasan(AKTK)</option>
                <option value="Anak Yang Memerlukan Perlindungan Khusus">Anak Yang Memerlukan Perlindungan Khusus</option>
                <option value="Lanjut Usia Terlantar">Lanjut Usia Terlantar</option>
                <option value="Penyandang Cacat Disabilitas">Penyandang Cacat Disabilitas(PCD)</option>
                <option value="Tuna Susila">Tuna Susila</option>
                <option value="Gelandangan">Gelandangan</option>
                <option value="Pengemis">Pengemis</option>
                <option value="Pemulung">Pemulung</option>
                <option value="Kelompok Minoritas">Kelompok Minoritas</option>
                <option value="Bekas Warga Binaan Pemasyarakatan">Bekas Warga Binaan Pemasyarakatan(EKS NAPI)</option>
                <option value="Orang Dengan HIV/AIDS">Orang Dengan HIV/AIDS</option>
                <option value="Korban Penyahgunaan Napza">Korban Penyahgunaan Napza</option>
                <option value="Korban Trffking">Korban Trffking</option>
                <option value="Korban Tindak Kekerasan">Korban Tindak Kekerasan(KTK)</option>
                <option value="Pekerja Migran Bermasalah Sosial">Pekerja Migran Bermasalah Sosial</option>
                <option value="Korban Bencana Alam">Korban Bencana Alam(KBA)</option>
                <option value="Korban Bencana Sosial">Korban Bencana Sosial(KBS)</option>
                <option value="Perempuan Rawan Sosial Ekonomi">Perempuan Rawan Sosial Ekonomi(PRSE)</option>
                <option value="Fakir Miskin">Fakir Miskin</option>
                <option value="Keluarga Bemasalah Sosial Psikologis">Keluarga Bemasalah Sosial Psikologis</option>
                <option value="Komunitas Adat Terpencil">Komunitas Adat Terpencil</option>
            </select>
        </div>
    </div>  --}}
    <div class="form-group row">
        <div class="label col-md-3">Nama Lengkap</div>
        <div class="col-md-9">
            <input type="text" name="nama" id="nama" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Nomor KK</div>
        <div class="col-md-9">
            <input type="number" name="no_kk" id="name" class="form-control mt-2" placeholder="Masukan Nomor Kartu Keluarga">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">NIK</div>
        <div class="col-md-9">
            <input type="number" name="nik" id="nik" class="form-control mt-2" placeholder="Masukan Nomor NIK">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Tanggal Lahir</div>
        <div class="col-md-9">
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control mt-2" placeholder="Masukan Nomor Hp">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Alamat</div>
        <div class="col-md-9">
            <input type="text" name="alamat" id="alamat" class="form-control mt-2" placeholder="Masukan Alamat">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kelurahan</div>
        <div class="col-md-9">
            <input type="text" name="kelurahan" id="kelurahan" class="form-control mt-2" placeholder="Masukan Kelurahan">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kecamatan</div>
        <div class="col-md-9">
            <input type="text" name="kecamatan" id="kecamatan" class="form-control mt-2" placeholder="Masukan Kecamatan">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kota/Kabupaten</div>
        <div class="col-md-9">
            <input type="text" name="kota" id="kota" class="form-control mt-2" placeholder="Masukan Kota">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Provinsi</div>
        <div class="col-md-9">
            <input type="text" name="provinsi" id="provinsi" class="form-control mt-2" placeholder="Masukan provinsi">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis Kelamin</div>
        <div class="col-md-9">
            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                <option >Pilih Jenis Kelamin</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">ID DTKS</div>
        <div class="col-md-9">
            <input type="text" name="id_dtks" id="id_dtks" class="form-control mt-2" placeholder="Masukan ID DTKS">
        </div>
    </div>

    @endsection
