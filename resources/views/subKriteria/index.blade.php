
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data Sub Kriteria' ?? '')) }}</h1>
@stop

@section('card-header-extra')
<div class="float-right">
    <a href="{{ route($modul.'.create') }}"  data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
        Tambah Data</a>
</div> 



 
@endsection


@section('content')
@foreach ($data as $item)
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ Str::title(Str::replaceArray('-',[' '],$item->nama_kriteria?? '')) }} ({{ $item->kode_kriteria }})</h3>
        <div class="float-right">
            {{--  <a href="{{ route($modul.'.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
                Tambah Data</a>  --}}
            <a href="{{ route($modul . '.show', $item->id) }} "
                id="btnDetail" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i> Tambah Data
            </a>
        </div>
      
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-sm text-center"  >
            <thead>
                <tr>
                    <th style="width: 10%;">No</th>
                    <th>Nama</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
               <tr>
                @php
                    $dataSub = DB::select("SELECT * FROM `t_sub_data_kriteria` WHERE id_data_kriteria = $item->id");
                @endphp
                    
                    @foreach ($dataSub as $no => $value)
                    <td>{{ ++$no }}</td>
                    <td>{{ $value->nama_sub }}</td>
                    <td>{{ $value->nilai }}</td>
                    <td>
                        <a href="{{ route($modul.'.edit', $value->id) }}" id="btnEdit" title="{{ $item->name }}" class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Edit</a>
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$value->id}})"
                            data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="material-icons md-delete"></i>
                            Delete</a>
                    </td>
                        
                    
                        
                        
               </tr>
        
            </tbody>
            @endforeach
        
        </table>

    </div>
</div>
@endforeach

<!-- The Modal  ADD-->
<div id="DeleteModal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="deleteForm" method="post">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <p class="text-center">Are you sure want to delete this data ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="" class="btn btn-outline-light" data-dismiss="modal"
                        onclick="formSubmit()">Yes, Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
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
<div class="modal fade bd-example-modal-lg" id="modalDetail" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="bodyDetail">
    
            
        
    
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="detail_edit">
    
            
        
    
        </div>
    </div>
</div>

@endsection
@include('layouts.script.delete')

@section('plugins.Datatables', true)
@section('js')
<script>
    $("#myTable").DataTable({
        "autoWidth": false,
        "responsive": true,
        "paging": true,
        "ordering": false,
    });
    $('body').on('click', '#btnDetail', function(event) {
        event.preventDefault();
        var me = $(this),
            url = me.attr('href');
        $.ajax({
            url: url,
            dataType: 'html',
            success: function(response) {
                $('#bodyDetail').html(response);
            }
        });
        $('#modalDetail').modal('show');
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
@endsection
