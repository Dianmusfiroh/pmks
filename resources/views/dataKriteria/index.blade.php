
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data Kriteria' ?? '')) }}</h1>
@stop

@section('card-header-extra')
<div class="float-right">
    <a href="{{ route($modul.'.create') }}"  data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
        Tambah Data</a>
</div> 



 
@endsection
@section('card-body')

<table class="table table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Kode Kriteria</th>
            <th>Nama Kriteria</th>
            <th>Bobot Kriteria </th>
            <th>Jenis Kriteria </th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $item)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->kode_kriteria}}</td>
            <td>{{$item->nama_kriteria}}</td>
            <td>{{$item->value}}</td>
            <td>{{$item->jenis}}</td>
            <td>
                <a href="{{ route($modul.'.edit', $item->id) }}" id="btnEdit" title="{{ $item->name }}" class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Edit</a>

                  <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id}})"
                    data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="material-icons md-delete"></i>
                    Delete</a>
            </td>
        </tr>

    </tbody>
    @endforeach

</table>
<!-- The Modal  ADD-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kriteria</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route($modul.'.store')}}" method="POST">
            @csrf
        <div class="row">
        <div class="col-6">
            <div class="label col-md-6">Kode Kriteria</div>
            <div class="col-md-9">
                <input type="text" name="kode_kriteria" id="kode_kriteria" class="form-control mt-2  mb-2" placeholder="Masukan Kode Kriteria">
            </div>
            <div class="label col-md-6">Bobot Kriteria</div>
            <div class="col-md-9">
                <input type="text" name="value" id="value" class="form-control mt-2 mb-2" placeholder="Masukan Bobot Kriteria">
            </div>
        </div>
        <div class="col-6">
            <div class="label col-md-6">Nama Kriteria</div>
            <div class="col-md-9">
                <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control mt-2 mb-2" placeholder="Masukan Nama Kriteria">
            </div>
            <div class="label col-md-6">Jenis Kriteria</div>
            <div class="col-md-9">
                <select name="jenis" id="jenis" class="form-control  mt-2 mb-2">
                    <option value="">Pilih Jenis Kriteria</option>
                    <option value="cost">Cost</option>
                    <option value="benefit">Benefit</option>
                </select>
            </div>
        </div>
      </div>
    </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
            Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div  id="editModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Kriteria</h5>
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
        "responsive": true,
        "paging": true,
        "ordering": false,
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
</script>
@include('layouts.script.delete')
@endsection
