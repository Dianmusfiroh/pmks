
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data User Akses' ?? '')) }}</h1>
@stop

@canany(['isAdmin','isDinsos','isKelurahan'])
@section('card-header-extra')
 <div class="float-right">
    <div class="row">
        <div class="mx-1">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-fw fa-plus"></i>Tambah Data
            </button>
        </div>
    </div>
</div>
@endsection
@endcan
@section('card-body')
<div class="table-responsive">
    <table class="table  table-bordered table-striped table-sm text-center" id="myTable">
        <thead>
            <tr>
                <th style="width: 10%;">No</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $key => $value )
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->role }}</td>
                    <td>
                        {{--  <a href="{{ route($modul.'.edit', $item->id) }}" title="{{ $item->name }}" class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Edit</a>  --}}
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$value->id}})"
                            data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="material-icons md-delete"></i>
                            Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route($modul.'.store')}}" method="POST">
            @csrf

            <div class="form-group row">
                <div class="label col-md-3">Username</div>
                <div class="col-md-9">
                    <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukan Username">
                </div>
            </div>
            <div class="form-group row">
                <div class="label col-md-3">Email</div>
                <div class="col-md-9">
                    <input type="email" name="email" id="email" class="form-control mt-2" placeholder="Masukan Email">
                </div>
            </div>
            <div class="form-group row">
                <div class="label col-md-3">password</div>
                <div class="col-md-9">
                    <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Masukan Password">
                </div>
            </div>
            <div class="form-group row">
                <div class="label col-md-3">Role</div>
                <div class="col-md-9">
                    <select name="role" id="role" class="form-control">
                        <option selected>Pilih Role</option>
                        <option value="dinsos">Dinsos</option>
                        <option value="kelurahan">Kelurahan</option>
                        <option value="kepala">Kepala Subbagian rehabilitas sosial</option>
                        <option value="konfirmasi">Konfirmasi</option>
                    </select>
                </div>
            </div>
            <p id="tes"></p>
            <div class="form-group row" id="konfirmasi" style="display: none;">
                <div class="label col-md-3">Kelurahan</div>
                <div class="col-md-9">
                    <select name="id_kelurahan" id="id_kelurahan" class="form-control">
                        
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>

      </div>
    </div>
  </div>
@endsection
@section('plugins.Datatables', true)
@section('js')
<script>
    $("#role").on('change', function() {
        var kelurahan = @php echo $kelurahan @endphp ;
        console.log(kelurahan);
        if ($(this).val() == 'kelurahan') {
            $("#konfirmasi").show();
            $.each(kelurahan, function(index) {
                var tes = `<option value="${kelurahan[index].id}">${kelurahan[index].kelurahan}</option>` ;
                $("#id_kelurahan").append(tes);
            });

        }else {
            $("#konfirmasi").hide();
        }
    });
    $("#myTable").DataTable({
        "autoWidth": false,
        "responsive": true
    });
</script>
@endsection
@include('layouts.script.delete')
