
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data PMKS' ?? '')) }}</h1>
@stop

@section('card-header-extra')
 <div class="float-right">
    <a onclick="generate()" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
        Generate Data</a>
</div>
@endsection
@section('card-body')
<div class="table-responsive">
<table class="table  table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama</th>
            <th>No KK</th>
            <th>NIK</th>
            <th>Jenis PMKS</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penerima as $key => $item )
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->no_kk}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->jenis_pmks}}</td>
            <td>{{$item->status}}</td>
           
        </tr>
        @endforeach

    </tbody>
</table>
</div>
@endsection
@section('plugins.Datatables', true)
@section('js')
{{--  <script>
    $("#myTable").DataTable({
                    "autoWidth": false,
                    "responsive": true
                });
                function generate(){
                    $.ajax({
            
                        url: "{{ route('generate') }}",
                       success: function(data){
            
                       }
                       
                    });
                }
</script>  --}}
<script>
    function generate() {
    var table = $('#myTable').DataTable({
        "destroy": true,
        "ajax": {
            "url": "{{ route('generate') }}",
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [

            {
                "data": "DT_RowIndex",
                "name": "DT_RowIndex"
            },
            {
                "data": "nama"
            },
            {
                "data": "no_kk"
            },
            {
                "data": "nik"
            },
            {
                "data": "jenis_pmks"
            },
            {
                "data": "status"
            },
            
        ],
      
    });
};
</script>
@include('layouts.script.delete')
@endsection
