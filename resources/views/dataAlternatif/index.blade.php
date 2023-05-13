
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data Alternatif' ?? '')) }}</h1>
@stop

@section('card-header-extra')
    <div class="float-right">
        <a href="{{ route($modul.'.create') }}" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
            Tambah Data</a>
    </div> 
    {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Open modal
      </button>  --}}
    
@endsection
@section('card-body')
<div class="table-responsive">
<table class="table  table-bordered table-striped table-sm text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Id DTKS</th>
            <th>Nama</th>
           
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->id_dtks }}</td>
            <td>{{ $item->nama }}</td>
            <td>
                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->idAlternatif}})"
                    data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i>
                    </a>
            </td>
        </tr>
        @endforeach
       

    </tbody>
</table>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route($modul.'.store')}}" method="POST">
            @csrf
            <div class="form-group row">
                <div class="label col-md-3">Nama PMKS</div>
                <div class="col-md-9">
                    <select name="id_pmks" id="pesertaPMKS" class="form-control" >
                <option>Nama PMKS</option>
                    </select>
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Data PMKS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="detail_edit">
        </div>
        </div>
  </div>
</div>
<div  id="modalShow" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Data PMKS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="detail_show">
        </div>
        </div>
  </div>
</div>
@include('sweetalert::alert')
@endsection
@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('js')
<script>
    $("#myTable").DataTable({
        "autoWidth": false,
        "responsive": true
    });
    $('body').on('click', '#btnShow', function (event) {
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
                $('#detail_show').html(response);
            }
        });
        $('#modalShow').modal('show');
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
    $( "#pesertaPMKS" ).select2({
        ajax: {
            url: "{{url('search')}}",
            dataType: 'json',
            delay: 250,
            data: function (term, page) {
                return {
                    search: term.term, // search term
                    searchFields:'id:like'
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

</script>
@include('layouts.script.delete')
@endsection
