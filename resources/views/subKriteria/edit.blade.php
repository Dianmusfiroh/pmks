<div class="modal-header">
    <h4 class="modal-title">{{ $data->nama_kriteria }}</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <div class="modal-body" >
<form action="{{ route($modul.'.update', $dataSub->id)}}" method="POST">

    @csrf
    @method('PUT')

    <div class="form-group row">
        <div class="label col-md-3">Nama Kriteria </div>
        <div class="col-md-9">
            <input type="text"  value="{{ $data->nama_kriteria }}" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
            <input type="text" hidden name="id_data_kriteria" id="id_data_kriteria"  value="{{ $data->id }}" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Nama Sub Kriteria </div>
        <div class="col-md-9">
            <input type="text" name="nama_sub" id="nama_sub" value="{{ $dataSub->nama_sub }}" class="form-control mt-2" placeholder="Masukan Sub Data Kriteria">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Bobot </div>
        <div class="col-md-9">
            <input type="text" name="nilai" id="nilai" value="{{ $dataSub->nilai }}" class="form-control mt-2" placeholder="Masukan Bobot Sub Data Kriteria">
        </div>
    </div>
  
    <!-- Modal footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>Simpan</button>
    
    </div>
</form>
