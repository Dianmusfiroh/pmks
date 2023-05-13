
    <form action="{{ route($modul.'.store')}}" method="POST">
        @csrf

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
 
    <div id="kec"></div>

    <div class="form-group row">
        <div class="label col-md-3">Kecamatan</div>
        <div class="col-md-9">
            <select name="id_kecamatan" class="form-control" id="id_kecamatan">
                <option >Pilih Kecamatan</option>
               @foreach ($kecamatan as $item)
               <option value="{{$item->id}}">{{$item->nama_kecamatan}}</option>
                @endforeach
            </select>        </div>
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
    <div class="form-group row">
        <div class="label col-md-3">Jenis PMKS</div>
        <div class="col-md-4">
            <select name="id_jenis_pmks" class="form-control" id="id_jenis_pmks">
                <option >Pilih Jenis PMKS</option>
               @foreach ($jenisPmks as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            
        </div>
        <input type="text" name="ket_jenis_pmks" placeholder="Keterangan Jenis PMKS" id="ket_jenis_pmks" class="col-md-5 
form-control">

    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jenis Disabilitas</div>
        <div class="col-md-9">
            <select name="id_jenis_disabilitas" class="form-control" id="id_jenis_disabilitas">
                <option >Pilih Jenis Disabilitas</option>
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
                <option >Pilih Spesifik Kecacatan</option>
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
                <option >Pilih Status Rumah</option>
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
                <option >Pilih Ket Status Rumah</option>
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
                <option >Pilih Status Keberadaan Keluarga</option>
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
                <option >Pilih Status Makan</option>
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
                <option >Pilih Status Mandi</option>
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
                <option >Pilih Status Perawatan Diri</option>
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
                <option >Pilih Status Pakaian</option>
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
                <option >Pilih Status Buang Air Besar/Kecil</option>
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
                <option >Pilih Status Tranfer</option>
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
                <option >Pilih Kepemilikan Bantuan</option>
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
                <option >Pilih Usulan Bantuan</option>
               @foreach ($uppk as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Keterangan Usulan Bantuan</div>
        <div class="col-md-9">
            <input type="text" required class="form-control" placeholder="Masukkan Keterangan Usulan Bantuan" name="ket_uppk" id="ket_uppk">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
            Simpan</button>
      </div>
    </form>
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
            $(document).ready(function(){
                var a =  $("#kec").val("Glenn Quagmire");


                $("#myInput").on("input", function(){
                    // Print entered value in a div box
                    $("#result").text($(this).val());
                    var kelurahan =$(this).val();

                    
                    {{--  console.log($(this).val());  --}}
                });
            });
            var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-bs-whatever')
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-body input')
    
        modalTitle.textContent = 'Ubah fee ' + recipient + '% Ke '
        modalBodyInput.value = recipient
    })
        </script>
    

