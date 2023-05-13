
@extends('layouts.app')
@section('content_header')
<div class="row">
    <div class="col-sm-8">
        <h1>{{ Str::title(Str::replaceArray('-',[' '],'Laporan Data Penerima' ?? '')) }}</h1>
    </div>
    <div class="col-sm-4 row">
        <div class="col-sm-8">
            <select name="" id="bulan" class="form-control">
                <option value="all">Pilih Bulan</option>
                @foreach ($bulan as $item)
                <option value="{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('m')}}">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('F')}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4 d-flex justify-content-end">
            <button  class=" w-75 btn btn-md btn-primary" id="Cetak" onclick="cetak()">Print</button>
            {{--  <a href="{{ route('cetakPmks') }}" class=" w-75 btn btn-md btn-primary">Print</a>  --}}
        </div>
    </div>
</div>
@stop

@section('card-body')

<table class="table  table-striped table-hover display nowrap"  id="myTable" style="width: 100%" >
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>Ranking</th>
        </tr>
    </thead>
    <tbody>
        {{--  @foreach ($data as $key => $item )
        <tr>
            <td>{{$item->nama}}</td>
            <td>{{$item->nama_kecamatan}}</td>
            <td>{{$item->kelurahan}}</td>
            <td>{{++$key}}</td>
        
        </tr>
        @endforeach  --}}
    </tbody>
</table>
@endsection
@section('plugins.Datatables', true)
@section('js')
<script>
    $("#myTable").DataTable({
        "destroy": true,
        "autoWidth": true,
        "scrollY": true,
        "scrollX": true,

        "responsive": true,
        "ajax": {
            "type": "GET",
            "url": "{{ route('dataLaporanHasil') }}",
            "destroy": true,
            
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [ {
                "data": "nama"
            },
            {
                "data": "nama_kecamatan"
            },
            {
                "data": "kelurahan"
            },{
                "data": "rangking",
                "name": "rangking"
            },
        ],
        "order": [[ 3, "asc" ]]
        
    });
    $("#bulan").on('change', function() {
      var bulan = this.value;
      if (this.value == 'all') {
        $("#myTable").DataTable({
            "destroy": true,
            "autoWidth": true,
            "scrollY": true,
            "scrollX": true,
            "responsive": true,
            "ajax": {
                "type": "GET",
                "url": "{{ route('dataLaporanHasil') }}",
                "destroy": true,
                
                "dataSrc": function(json) {
                    return json.data;
                }
            },
            "columns": [ {
                    "data": "nama"
                },
                {
                    "data": "nama_kecamatan"
                },
                {
                    "data": "kelurahan"
                },{
                    "data": "rangking",
                    "name": "rangking"
                },
            ],
            "order": [[ 3, "asc" ]]
            
        });
      } else {
        $("#myTable").DataTable({
            "destroy": true,
            "autoWidth": true,
            "scrollY": true,
            "scrollX": true,
            "responsive": true,
            "ajax": {
              "type": "GET",
              "url": "{{ route('dataLaporanHasilFilter') }}",
              "data" :{"bulan": bulan},
              "dataSrc": function(json) {
                  return json.data;
              }
            },
        
            "columns": [ {
                "data": "nama"
                },
                {
                    "data": "nama_kecamatan"
                },
                {
                    "data": "kelurahan"
                },{
                    "data": "rangking",
                    "name": "rangking"
                },
            ],
        "order": [[ 3, "asc" ]]
            
        });
      }
     
    });
    function cetak() { 
    var bulan = $('#bulan :selected').val();
        if (bulan == 'all') {
            $.ajax({
                url: "{{ route('cetakLaporan') }}",
                xhrFields: {
                responseType: 'blob'
              },
              success: function (data) {
                var a = document.createElement('a');
                var url = window.URL.createObjectURL(data);
                a.href = url;
                a.download = 'Data Hasil Penerima .pdf';
                document.body.append(a);
                a.click();
                a.remove();
                window.URL.revokeObjectURL(url);
              }
              }); 
        } else {
            $.ajax({
                url: "{{ route('cetakLaporanFilter') }}",
                data: {"bulan": bulan},
                xhrFields: {
                responseType: 'blob'
              },
              success: function (data) {
                var a = document.createElement('a');
                var url = window.URL.createObjectURL(data);
                a.href = url;
                a.download = 'Data Hasil Penerima BUlan .pdf';
                document.body.append(a);
                a.click();
                a.remove();
                window.URL.revokeObjectURL(url);
              }
              }); 
        }
    };

</script>
{{--  @include('layouts.script.delete')  --}}
@endsection

