
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data Hasil Akhir' ?? '')) }}</h1>
@stop

@section('card-body')

<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th>Alternatif</th>
            <th>Hasil</th>
            <th style="width: 10%;">Ranking</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

@endsection
@section('plugins.Datatables', true)
@section('js')
<script>
    
    $("#myTable").DataTable({
        "ajax": {
            "type": "GET",
            "url": "{{ route('dataHasil') }}",
            
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [
             {
                "data": "nama"
            },
           {
                data: 'total',
             
            }, {
                "data": "DT_RowIndex",
                "name": "DT_RowIndex"
            },
      
          
        ],
        order:[[1,'desc']],
       
        
    }); 
</script>
@endsection
