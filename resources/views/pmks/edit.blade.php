

<form action="{{ route($modul.'.update',$pmks[0]->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <div class="label col-md-3">Nama Lengkap</div>
        <div class="col-md-9">
            <input type="text" name="nama" value="{{$pmks[0]->nama}}" id="nama" class="form-control mt-2" placeholder="Masukan Nama Lengkap">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Nomor KK</div>
        <div class="col-md-9">
            <input type="number" name="no_kk" id="name" value="{{$pmks[0]->no_kk}}" class="form-control mt-2" placeholder="Masukan Nomor Kartu Keluarga">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">NIK</div>
        <div class="col-md-9">
            <input type="number" name="nik" id="nik" value="{{$pmks[0]->nik}}" class="form-control mt-2" placeholder="Masukan Nomor NIK">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Tanggal Lahir</div>
        <div class="col-md-9">
            <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{$pmks[0]->tgl_lahir}}"  class="form-control mt-2" placeholder="Masukan Nomor Hp">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Alamat</div>
        <div class="col-md-9">
            <input type="text" name="alamat" id="alamat" value="{{$pmks[0]->alamat}}" class="form-control mt-2" placeholder="Masukan Alamat">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kecamatan</div>
        <div class="col-md-9">
            <select name="id_kecamatan" class="form-control" id="id_kecamatan">
                <option value="{{$pmks[0]->id_kecamatan}}" >{{$pmks[0]->nama_kecamatan}}</option>
               @foreach ($kecamatan as $item)
               <option value="{{$item->id}}">{{$item->nama_kecamatan}}</option>
                @endforeach
            </select>        
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kelurahan</div>
        <div class="col-md-9">
            <select name="id_kelurahan" class="form-control" id="kelurahan">
                {{--  <option >Pilih Kelurahan</option>  --}}
               {{--  @foreach ($kelurahan as $item)
               <option value="{{$item->id}}">{{$item->kelurahan}}</option>
                @endforeach  --}}
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis Kelamin</div>
        <div class="col-md-9">
            <select name="jenis_kelamin" class="form-control" value="{{$pmks[0]->jenis_kelamin}}" id="jenis_kelamin">
                <option value="{{$pmks[0]->jenis_kelamin}}">{{$pmks[0]->jenis_kelamin}}</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">ID DTKS</div>
        <div class="col-md-9">
            <input type="text" name="id_dtks" id="id_dtks" value="{{$pmks[0]->id_dtks}}" class="form-control mt-2" placeholder="Masukan Kota/Kab">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-4">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option value="{{$pmks[0]->id_jenis_pmks}}" >{{$pmks[0]->jenis_pmks}}</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            
        </div>
        <input type="text" value="{{$pmks[0]->ket_jenis_pmks}}" name="ket_jenis_pmks" placeholder="Keterangan Jenis PMKS" id="ket_jenis_pmks" class="col-md-5 
form-control">

    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis Disabilitas</div>
        <div class="col-md-9">
            <select name="id_jenis_disabilitas" class="form-control" id="id_jenis_disabilitas">
                <option value="{{$pmks[0]->id_jenis_disabilitas}}">{{$pmks[0]->jenis_disabilitas}}</option>
               @foreach ($jenisDisabilitas as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Spesifik Kecacatan</div>
        <div class="col-md-9">
            <select name="id_spesific_cacat" class="form-control" id="id_spesific_cacat">
                <option value="{{$pmks[0]->id_spesific_cacat}}" >{{$pmks[0]->spesific_cacat}}</option>
               @foreach ($spesificKecacatan as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <label for=""></label>
    <div class="form-group row">
        <div class="label col-md-3">Status Rumah</div>
        <div class="col-md-9">
            <select name="id_status_rumah" class="form-control" id="id_status_rumah">
                <option value="{{$pmks[0]->id_status_rumah}}">{{$pmks[0]->status_rumah}}</option>
               @foreach ($stsRumah as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Ket Status Rumah</div>
        <div class="col-md-9">
            <select name="id_ket_status_rumah" class="form-control" id="id_ket_status_rumah">
                <option value="{{$pmks[0]->id_ket_status_rumah}}">{{$pmks[0]->ket_status_rumah}}</option>
               @foreach ($ketStsRumah as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Status Keberadaan Keluarga</div>
        <div class="col-md-9">
            <select name="id_status_keberadaan_keluarga" class="form-control" id="id_status_keberadaan_keluarga">
                <option value="{{$pmks[0]->id_status_keberadaan_keluarga}}">{{$pmks[0]->status_keberadaan_keluarga}}</option>
               @foreach ($stsKeberadaanKeluarga as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <label for="">ADL</label>
    <div class="form-group row">
        <div class="label col-md-3">Makan</div>
        <div class="col-md-9">
            <select name="id_adl_makan" class="form-control" id="id_adl_makan">
                <option value="{{$pmks[0]->id_adl_makan}}">{{$pmks[0]->adl_makan}}</option>
               @foreach ($adlMakan as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Mandi</div>
        <div class="col-md-9">
            <select name="id_adl_mandi" class="form-control" id="id_adl_mandi">
                <option value="{{$pmks[0]->id_adl_mandi}}">{{$pmks[0]->adl_mandi}}</option>
               @foreach ($adlMandi as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Status Perawatan Diri</div>
        <div class="col-md-9">
            <select name="id_adl_perawatan" class="form-control" id="id_adl_perawatan">
                <option value="{{$pmks[0]->id_adl_perawatan}}">{{$pmks[0]->adl_perawatan}}</option>
               @foreach ($adlPerawatanDiri as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Status Pakaian</div>
        <div class="col-md-9">
            <select name="id_adl_pakaian" class="form-control" id="id_adl_pakaian">
                <option value="{{$pmks[0]->id_adl_pakaian}}">{{$pmks[0]->adl_pakaian}}</option>
               @foreach ($adlPakaian as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Buang Air Besar/Kecil</div>
        <div class="col-md-9">
            <select name="id_adl_bab" class="form-control" id="id_adl_bab">
                <option value="{{$pmks[0]->id_adl_bab}}">{{$pmks[0]->adl_bab}}</option>
               @foreach ($adlBab as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Tranfer</div>
        <div class="col-md-9">
            <select name="id_adl_transfer" class="form-control" id="id_adl_transfer">
                <option value="{{$pmks[0]->id_adl_transfer}}">{{$pmks[0]->adl_transfer}}</option>
               @foreach ($adlTransfer as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Kepemilikan Bantuan</div>
        <div class="col-md-9">
            <select name="id_kppk" class="form-control" id="id_kppk">
                <option value="{{$pmks[0]->id_kppk}}">{{$pmks[0]->kppk}}</option>
               @foreach ($kppk as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Usulan Bantuan</div>
        <div class="col-md-9">
            <select name="id_uppk" class="form-control" id="id_uppk">
                <option value="{{$pmks[0]->id_uppk}}">{{$pmks[0]->uppk}}</option>
               @foreach ($uppk as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Keterangan Usulan Bantuan</div>
        <div class="col-md-9">
            <input type="text" value="{{$pmks[0]->ket_uppk}}" class="form-control" placeholder="Masukkan Keterangan Usulan Bantuan" name="ket_uppk" id="ket_uppk">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
            Simpan</button>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

      <script>
            $('#id_kecamatan').on('change', function() {
              $.ajax({
                  url: "{{ route('dataKec') }}",
                  data: {'id_kecamatan': $(this).val() },
                  success: function (data) {
                      $('#kelurahan').html(data); 
                  }
              });
            });
            var cmbVal = $('#id_kecamatan :selected').val();
            $.ajax({
                url: "{{ route('dataKec') }}",
                data: {'id_kecamatan': cmbVal },
                success: function (data) {
                    $('#kelurahan').html(data); 
                }
            });
            console.log(cmbVal);
          $(document).ready(function(){
              var a =  $("#kec").val("Glenn Quagmire");


              $("#myInput").on("input", function(){
                  // Print entered value in a div box
                  $("#result").text($(this).val());
                  var kelurahan =$(this).val();

                  
                  {{--  console.log($(this).val());  --}}
              });
          });
        </script>