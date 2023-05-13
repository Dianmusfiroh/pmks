
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Kepemilikan Bantuan' ?? '')) }}</h1>
@stop

@section('card-header-extra')
 <div class="float-right">
    <a href="{{ route($modul.'.create') }}" id="btnDetail" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
        Tambah Data</a>
</div>
@endsection
@section('card-body')

<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama</th>
            {{--  <th>Nilai</th>  --}}
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kppk as $key => $item)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->name}}</td>
            {{--  <td>{{$item->value}}</td>  --}}
            <td>
                <a href="{{ route($modul.'.edit', $item->id) }}" title="{{ $item->name }}"  id="btnEdit" class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Edit</a>
                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id}})"
                    data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="material-icons md-delete"></i>
                    Delete</a>
            </td>
        </tr>

    </tbody>
    @endforeach

</table>
<div  id="exampleModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kepemilikan Bantuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="detail_user">
        </div>
        </div>
  </div>
</div>
<div  id="editModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Kepemilikan Bantuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="detail_edit">
        </div>
        </div>
  </div>
</div>
@endsection
@section('plugins.Datatables', true)
@section('js')
<script>
    $("#myTable").DataTable({
        "autoWidth": false,
        "responsive": true
    });
    $('body').on('click', '#btnEdit', function (event) {
        event.preventDefault();
        var me = $(this),
            title = me.attr('title');
            alamat = me.attr('alamat');
            url = me.attr('href');
            console.log(url);
        $('#modal-title').text(title);
        $('#alamat').text(alamat);

        $.ajax({
            url: url,
            dataType: 'html',
            success: function (response) {
                $('#detail_edit').html(response);
            }
        });
        $('#editModal').modal('show');
    });
    $('body').on('click', '#btnDetail', function (event) {
        event.preventDefault();
        var me = $(this),
            title = me.attr('title');
            alamat = me.attr('alamat');
            url = me.attr('href');
        $('#modal-title').text(title);
        $('#alamat').text(alamat);

        $.ajax({
            url: url,
            dataType: 'html',
            success: function (response) {
                $('#detail_user').html(response);
            }
        });
        $('#exampleModal').modal('show');
    });
</script>
@include('layouts.script.delete')
@endsection
