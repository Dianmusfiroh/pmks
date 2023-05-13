
<form action="{{ route($modul.'.store')}}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="label col-md-3">Kode Kecamatan</div>
        <div class="col-md-9">
            <input type="text" name="id" id="id" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Nama Kecamatan</div>
        <div class="col-md-9">
            <input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>
  
   
    <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
        Simpan</button>
</form>
