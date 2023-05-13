<div class="modal-header">
    <h4 class="modal-title">Edit Data </h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <div class="modal-body" >
<form action="{{ route($modul.'.update',$data->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <div class="label col-md-3">Nama Pmks </div>
        <div class="col-md-9">
            <select class="form-control" name="id_pmks" id="id_pmks" readonly >
                <option selected value="{{ $data->pmks[0]->id }}">{{ $data->pmks[0]->nama }}</option>
            </select >
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kepemilikan Rumah </div>
        <div class="col-md-9">
            <select class="form-control" name="id_sub_kepemilikan_rumah" id="id_sub_kepemilikan_rumah">
                <option value="{{ $dataKepemilikanRumah[0]->id }}">{{ $dataKepemilikanRumah[0]->nama_sub }}</option>
                @foreach ($kepemilikanRumah as $item)
                <option value="{{ $item->id }}">{{ $item->nama_sub }}</option>
                @endforeach
            </select >
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jumlah Tanggungan Keluarga </div>
        <div class="col-md-9">
            <select class="form-control" name="id_sub_tanggungan" id="id_sub_tanggungan">
                <option value="{{ $datatanggungan[0]->id }}">{{ $datatanggungan[0]->nama_sub }} </option>
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
                <option value="{{ $datapendapatan[0]->id }}">{{ $datapendapatan[0]->nama_sub }} </option>
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
                <option value="{{ $datapekerjaan[0]->id }}">{{ $datapekerjaan[0]->nama_sub }} </option>
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
                <option value="{{ $datakondisiRumah[0]->id }}">{{ $datakondisiRumah[0]->nama_sub }} </option>
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
                <option value="{{ $datapendidikan[0]->id }}">{{ $datapendidikan[0]->nama_sub }} </option>
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
                <option value="{{ $datapenerangan[0]->id }}">{{ $datapenerangan[0]->nama_sub }} </option>

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
                <option value="{{ $datadtks[0]->id }}">{{ $datadtks[0]->nama_sub }} </option>
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
