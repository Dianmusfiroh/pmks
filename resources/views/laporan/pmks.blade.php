
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Laporan PMKS' ?? '')) }}</h1>
@stop

@section('card-body')

<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama Kecamatan</th>
            <th>Nama Kepala Kecamatan</th>
            <th>NIP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kecamatan as $key => $item )
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->nama_kecamatan}}</td>
            <td>{{$item->nama_camat}}</td>
            <td>{{$item->nip}}</td>
            <td>
                <a href="{{ route($modul.'.edit', $item->id) }}" title="{{ $item->nama }}" class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Edit</a>
                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id}})"
                    data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="material-icons md-delete"></i>
                    Delete</a>
            </td>
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
                    "responsive": true
                });
</script>
@include('layouts.script.delete')
@endsection

