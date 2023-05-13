<div class="modal-header">
    <h4 class="modal-title">Tambah</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <div class="modal-body" >
<form action="{{ route($modul.'.store')}}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="label col-md-3">Nama Pmks </div>
        <div class="col-md-9">
            <select class="form-control" name="id_pmks" id="id_pmks">
                @foreach ($pmks as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select >
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kepemilikan Rumah </div>
        <div class="col-md-9">
            <select class="form-control" name="id_sub_kepemilikan_rumah" id="id_sub_kepemilikan_rumah">
                <option value="">Pilih Status Kepemilikan Rumah</option>
                @foreach ($kepemilikanRumah as $item)
                <option value="{{ $item->id }}">{{ $item->nama_sub }}</option>
                @endforeach
            </select >
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jumlah Tanggungan Keluarga </div>
        <div class="col-md-9">
            <select class="form-control" name="id_sub_tanggungan" id="	id_sub_tanggungan">
                <option value="">Pilih Jumlah Tanggungan Keluarga </option>
                @foreach ($tanggungan as $item)
                <option value="{{ $item->id }}">{{ $item->nama_sub }}</option>
                @endforeach
            </select >
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Pendapatan Perbulan </div>
        <div class="col-md-9">
            <select class="form-control" name="id_sub_pendapatan" id="id_sub_pendapatan">
                <option value="">Pilih Pendapatan Perbulan </option>
                @foreach ($pendapatan as $item)
                <option value="{{ $item->id }}">{{ $item->nama_sub }}</option>
                @endforeach
            </select >
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis Pekerjaan</div>
        <div class="col-md-9">
            <select class="form-control" name="id_sub_pekerjaan" id="id_sub_pekerjaan">
                <option value="">Pilih Jenis Pekerjaan</option>
                @foreach ($pekerjaan as $item)
                <option value="{{ $item->id }}">{{ $item->nama_sub }}</option>
                @endforeach
            </select >
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kondisi Rumah</div>
        <div class="col-md-9">
            <select class="form-control" name="id_sub_kondisi_rumah" id="id_sub_kondisi_rumah">
                <option value="">Pilih Kondisi Rumah</option>
                @foreach ($kondisiRumah as $item)
                <option value="{{ $item->id }}">{{ $item->nama_sub }}</option>
                @endforeach
            </select >
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Pendidikan Terakhir</div>
        <div class="col-md-9">
            <select class="form-control" name="id_sub_pendidikan" id="id_sub_pendidikan">
                <option value="">Pilih Pendidikan Terakhir</option>
                @foreach ($pendidikan as $item)
                <option value="{{ $item->id }}">{{ $item->nama_sub }}</option>
                @endforeach
            </select >
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Sumber Penerangan</div>
        <div class="col-md-9">
            <select class="form-control" name="id_sub_penerangan" id="id_sub_penerangan">
                <option value="">Pilih Sumber Penerangan</option>

                @foreach ($penerangan as $item)
                <option value="{{ $item->id }}">{{ $item->nama_sub }}</option>
                @endforeach
            </select >
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis Lantai </div>
        <div class="col-md-9">
            <select class="form-control" name="id_sun_dtks" id="id_sun_dtks">
                <option value="">Pilih Jenis Lantai</option>
                @foreach ($dtks as $item)
                <option value="{{ $item->id }}">{{ $item->nama_sub }}</option>
                @endforeach
            </select >
        </div>
    </div>
    
    <!-- Modal footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>Simpan</button>
    
    </div>
</form>
