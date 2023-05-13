

<form action="{{ route($modul.'.update',$data->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-6">
            <div class="label col-md-6">Kode Kriteria</div>
            <div class="col-md-9">
                <input type="text" value="{{ $data->kode_kriteria }}" name="kode_kriteria" id="kode_kriteria" class="form-control mt-2  mb-2" placeholder="Masukan Kode Kriteria">
            </div>
            <div class="label col-md-6">Bobot Kriteria</div>
            <div class="col-md-9">
                <input type="text" value="{{ $data->value }}" name="value" id="value" class="form-control mt-2 mb-2" placeholder="Masukan Bobot Kriteria">
            </div>
        </div>
        <div class="col-6">
            <div class="label col-md-6">Nama Kriteria</div>
            <div class="col-md-9">
                <input type="text" value="{{ $data->nama_kriteria }}" name="nama_kriteria" id="nama_kriteria" class="form-control mt-2 mb-2" placeholder="Masukan Nama Kriteria">
            </div>
            <div class="label col-md-6">Jenis Kriteria</div>
            <div class="col-md-9">
                <select name="jenis" id="jenis" class="form-control  mt-2 mb-2">
                    <option value="{{ $data->jenis }}">{{ $data->jenis }}</option>
                    <option value="cost">Cost</option>
                    <option value="benefit">Benefit</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
                Simpan</button>
          </div>
    

