
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data Kriteria' ?? '')) }}</h1>
@stop

@section('card-body')

<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Alias</th>
            <th>Nama Kriteria</th>
            <th>Nilai</th>
            {{--  <th>Nilai Utility</th>  --}}
            <th>Nilai Normalisasi</th>
            {{--  <th>Nilai Hasil</th>  --}}
        </tr>
    </thead>
    <tbody>
        {{--  <tr>
            @foreach ($data as $key => $item )
            <td>{{++$key}}</td>
            <td>{{$item->alias}}</td>
            <td>{{$item->nama_kriteria}}</td>
            <td>{{$item->value}}</td>
            <td>{{100*(100-$item->value)/(100-0)}}</td>

        </tr>
        @endforeach  --}}

    </tbody>
</table>

@endsection
@section('plugins.Datatables', true)
@section('js')
<script>
    $(document).ready(function () {
    
    $("#myTable").DataTable({
        "ajax": {
            "type": "GET",
            "url": "{{ route('getHasil') }}",
            
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [{
                "data": "DT_RowIndex",
                "name": "DT_RowIndex"
            }, {
                "data": "alias"
            }, {
                "data": "nama_kriteria"
            }, 
            {
                "data": "score"
            },{
                name: 'normalisasi',
                data: 'normalisasi',
                orderable: false,
                searchable: false,
            }, 
        ],
        
    });
}); 
</script>
@endsection
