

<form action="{{ route($modul.'.store')}}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="label col-md-3">Kecamatan</div>
        <div class="col-md-9">
            <select name="id_kecamatan" class="form-control" id="id_kecamatan">
                <option >Pilih Kecamatan</option>
               @foreach ($kecamatan as $item )
               <option value="{{ $item->id }}" >{{ $item->nama_kecamatan }}</option>
               @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kode Kelurahan</div>
        <div class="col-md-9">
            <input type="text" name="id" id="id" class="form-control mt-2" placeholder="Masukan Kode Kelurahan">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kelurahan</div>
        <div class="col-md-9">
            <input type="text" name="kelurahan" id="kelurahan" class="form-control mt-2" placeholder="Masukan Nama Kelurahan">
        </div>
    </div>
    <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
        Simpan</button>
</form>