
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
            <th>Nilai Utility</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($data as $key => $item )
            <td>{{++$key}}</td>
            <td>{{$item->alias}}</td>
            <td>{{$item->nama_kriteria}}</td>
            <td>{{$item->value}}</td>
            <td>{{100*(100-$item->value)/(100-0)}}</td>

        </tr>
        @endforeach

    </tbody>
</table>

@endsection
@section('plugins.Datatables', true)
@section('js')
<script>
    $("#myTable").DataTable({
        "autoWidth": false,
        "responsive": true,
        "paging": true,
        "ordering": false,
    });
</script>
@endsection
