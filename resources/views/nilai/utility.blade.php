
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data Hasil Utility' ?? '')) }}</h1>
@stop

@section('card-body')

<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama Lengkap</th>
            <th>Nilai Utility Hasil</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@endsection
@section('plugins.Datatables', true)
@section('js')
<script>
    {{--  $("#myTable").DataTable({
        "autoWidth": false,
        "responsive": true,
        "paging": true,
        "ordering": false,
    });  --}}
    $("#myTable").DataTable({
        "ajax": {
            "type": "GET",
            "url": "{{ route('getUtility') }}",
            
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [{
                "data": "DT_RowIndex",
                "name": "DT_RowIndex"
            }, {
                "data": "nama"
            },{
                name: 'utility',
                data: 'utility',
                orderable: false,
                searchable: false,
            }, 
        ],
        
    });
    </script>
@endsection
