
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Calon Penerima Bantuan' ?? '')) }}</h1>
@stop

@section('card-header-extra')
 <div class="float-right">
    <a href="{{ route($modul.'.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
        Tambah Data</a>
</div>
@endsection
@section('card-body')

<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama</th>
            <th>No KK</th>
            <th>NIK</th>
            <th>Tanggal Lahir</th>
            <th>Jenis PMKS</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr></tr>
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
{{-- @include('layouts.script.delete') --}}
@endsection
