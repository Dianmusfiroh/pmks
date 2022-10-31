
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data PMKS' ?? '')) }}</h1>
@stop

@section('card-header-extra')
 <div class="float-right">
    <a href="{{ route($modul.'.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
        Tambah Data</a>
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
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pmks as $key => $item )
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->no_kk}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->tgl_lahir}}</td>
            <td>{{$item->jenis_kelamin}}</td>
            <td>{{$item->alamat}}</td>
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
</div>
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
