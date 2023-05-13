<form action="{{ route($modul.'.update',$adlpakaian->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <div class="label col-md-3">Nama </div>
        <div class="col-md-9">
            <input type="text" name="name" id="name" value="{{$adlpakaian->name}}" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>
    <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
        Simpan</button>
</form>