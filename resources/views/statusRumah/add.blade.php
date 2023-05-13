<form action="{{ route($modul.'.store')}}" method="POST">
    @csrf

    <div class="form-group row">
        <div class="label col-md-3">Nama Jenis</div>
        <div class="col-md-9">
            <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukan Status Rumah">
        </div>
    </div>
    <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
        Simpan</button>
</form>
{{--  
    <div class="form-group row">
        <div class="label col-md-3">Nilai</div>
        <div class="col-md-9">
            <input type="text" name="value" id="value" class="form-control mt-2" placeholder="Masukan Nilai Jenis Bantuan">
        </div>
    </div>  --}}

