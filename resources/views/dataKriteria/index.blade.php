
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data Kriteria' ?? '')) }}</h1>
@stop

@section('card-header-extra')
{{--  @if ($scoreCount <1 )  --}}
<div class="float-right">
    <a href="{{ route($modul.'.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
        Tambah Data</a>
</div> 
{{--  @endif  --}}
{{--  @if ($score == !empty($score))


@elseif ($score == empty($score))
<div class="float-right">
    <a href="{{ route($modul.'.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
        Tambah Data</a>
</div>
@endif  --}}

 
@endsection
@section('card-body')

<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Alias</th>
            <th>Nama Kriteria</th>
            <th>Nilai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $item)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->alias}}</td>
            <td>{{$item->nama_kriteria}}</td>
            <td>{{$item->value}}</td>
            <td>
                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id}})"
                    data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="material-icons md-delete"></i>
                    Delete</a>
            </td>
        </tr>

    </tbody>
    @endforeach

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
@include('layouts.script.delete')
@endsection
