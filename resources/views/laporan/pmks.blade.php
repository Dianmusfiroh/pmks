
@extends('layouts.app')
@section('content_header')
<div class="row">
    <div class="col-sm-8">
        <h1>{{ Str::title(Str::replaceArray('-',[' '],'Laporan PMKS' ?? '')) }}</h1>
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
{{--  <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/5439.jpg'))) }}">  --}}
{{--  <img src="{{ asset('img/5439.jpg') }}" />  --}}
{{--  <table class="table table-bordered tabe-striped table-sm text-center" id="myTable">  --}}
<table class="table  table-striped table-hover display nowrap"  id="myTable" style="width: 100%" >
        <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama Lengkap</th>
            <th>Jenis PMKS</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
        </tr>
    </thead>
    <tbody>
        {{--  @foreach ($data as $key => $item )
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jenisPMKS}}</td>
            <td>{{$item->nama_kecamatan}}</td>
            <td>{{$item->kelurahan}}</td>
        
        </tr>
        @endforeach  --}}

    </tbody>
</table>
@endsection
@section('plugins.Datatables', true)
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer=""></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
@section('js')
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
          opens: 'left'
        }, function(start, end, label) {
          console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
      
    
    });
    $("#myTable").DataTable({
        "destroy": true,
        "autoWidth": true,
        "scrollY": true,
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "type": "GET",
            "url": "{{ route('LaporandataPmks') }}",
            "destroy": true,
            
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [{
                "data": "DT_RowIndex",
                "name": "DT_RowIndex"
            }, {
                "data": "nama"
            },
            {
                "data": "jenisPMKS"
            },
            {
                "data": "nama_kecamatan"
            },
            {
                "data": "kelurahan"
            }
        ],
        
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
                "url": "{{ route('LaporandataPmks') }}",
                "destroy": true,
                
                "dataSrc": function(json) {
                    return json.data;
                }
            },
            "columns": [{
                    "data": "DT_RowIndex",
                    "name": "DT_RowIndex"
                }, {
                    "data": "nama"
                },
                {
                    "data": "jenisPMKS"
                },
                {
                    "data": "nama_kecamatan"
                },
                {
                    "data": "kelurahan"
                }
            ],
            
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
              "url": "{{ route('LaporandataPmksFilter') }}",
              "data" :{"bulan": bulan},
              "dataSrc": function(json) {
                  return json.data;
              }
            },
        
            "columns": [{
                    "data": "DT_RowIndex",
                    "name": "DT_RowIndex"
                }, {
                    "data": "nama"
                },
                {
                    "data": "jenisPMKS"
                },
                {
                    "data": "nama_kecamatan"
                },
                {
                    "data": "kelurahan"
                }
            ],
            
        });
      }
     
    });
    function cetak() { 
    var bulan = $('#bulan :selected').val();
        if (bulan == 'all') {
            $.ajax({
                url: "{{ route('cetakPmks') }}",
                xhrFields: {
                responseType: 'blob'
              },
              success: function (data) {
                var a = document.createElement('a');
                var url = window.URL.createObjectURL(data);
                a.href = url;
                a.download = 'Data PMKS .pdf';
                document.body.append(a);
                a.click();
                a.remove();
                window.URL.revokeObjectURL(url);
              }
              }); 
        } else {
            $.ajax({
                url: "{{ route('cetakFilterPmks') }}",
                data: {"bulan": bulan},
                xhrFields: {
                responseType: 'blob'
              },
              success: function (data) {
                var a = document.createElement('a');
                var url = window.URL.createObjectURL(data);
                a.href = url;
                a.download = 'Data PMKS .pdf';
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

