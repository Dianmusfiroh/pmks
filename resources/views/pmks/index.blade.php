
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Data PMKS' ?? '')) }}</h1>
@stop

@canany(['isAdmin','isDinsos','isKelurahan'])
    
@section('card-header-extra')

 <div class="float-right">
    <div class="row">
        {{--  <div class="mx-1">
           <button class="btn btn-primary changeSelected" onclick="search()">Search</button>
        </div>
        <div class="mx-1">
            <select name="kelurahan" class="form-control" id="kelurahan">
                <option >Pilih Kelurahan</option>
                @foreach ($kelurahanpmks as $item)
                <option value="{{ $item->kelurahan }}" >{{ $item->kelurahan }}</option>
                @endforeach
            </select>
            
        </div>
        <div class="mx-1">
            <select name="jenisPmks"  class="form-control" id="jenisPmks">
                <option >Pilih Jenis PMKS</option>
                @foreach ($optJenisPmks as $item)
                <option value="{{ $item->id_jenis_pmks }}" >{{ $item->name }}</option>
                @endforeach
            </select>
        </div>  --}}
        <div class="mx-1">
        
        <a href="{{ route($modul.'.create') }}"    id="btnDetail"  class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
            Tambah Data</a>
        </div>
    </div>
</div>

@endsection
@endcan

@section('card-body')
@canany(['isAdmin','isDinsos','isKonfirmasi'])

<div class="table-responsive">
<table class="table table-striped table-striped table-fixed text-center"   id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th >Nama</th>
            <th >NIK</th>
            <th >Id DTKS</th>
            <th >Jenis PMKS</th>
            <th >Jenis Kelamin</th>
            <th >Kelurahan</th>
            <th >Kecamatan</th>
            <th >Status</th>
            <th style="width: 50%" >Aksi</th>
        </tr>
    </thead>
    <tbody>
    
    </tbody>
</table>
</div>
        @endcan
@can('isKelurahan')
<div class="table-responsive">
    <table class="table  table-bordered table-striped table-sm text-center" id="myTable2">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Id DTKS</th>
                <th>Jenis PMKS</th>
                <th>Jenis Kelamin</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Status</th>
                <th style="width: 50%">Aksi</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
    </div>
@endcan
<!-- Modal -->
<div  id="exampleModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data PMKS</h5>
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
@endsection
@section('plugins.Datatables', true)
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
 
@section('js')
<script>
    $(document).ready(function () {
        $("#myTable").DataTable({
            "ajax": {
                "type": "GET",
                "url": "{{ route('dataPmks') }}",
               
            
            },
    
            "columns": [
                {data: null,"sortable": false, 
                render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
                }  
            }, {
                    "data": "nama"
                }, {
                    "data": "nik"
                }, {
                    "data": "id_dtks"
                }, {
                    "data": "jenis_pmks"
                }, 
            
                {
                    "data": "jenis_kelamin"
                },
                {
                    "data": "kelurahan"
                },
                {
                    "data": "kecamatan"
                },
                {
                    name: 'status2',
                    orderable: false,
                    searchable: false,
                },
                {
                    name: 'status3',
                    orderable: false,
                    searchable: false,
                
                },
            ],
            "columnDefs": [
            {
                targets: 9,
                className: 'dt-body-center th-lg',
                data: function( row, type, val, meta){
                var userName =   window.userID = '{{ Auth::user()->name }}';
                    if ( userName == 'dinsos'  ) {
                        if (row.status == 'ditolak' ) {
                            return ` <span class="btn btn-sm btn-danger"> Ditolak</span>`;
                            } else if (row.status == 'konfirmasi' ) {
                                return ` <span class="badge badge-pill badge-warning"> Menunggu Konfirmasi</span>`;
                            } else if (row.status == 'sukses' ) {
                                return `
                                <div class="btn-group">
                                    <a href="{{ url('pmks/') }}/${row.id}" id="btnShow"  class="btn btn-sm btn-info"><i class="fas fa-fw fa-eye"></i></a>
                                <a href="{{ url('pmks/${row.id}/edit') }}" id="btnEdit" title="" class="btn btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a>
                                <a href="javascript:;" data-toggle="modal" onclick="deleteData(${row.id})"
                                    data-target="#DeleteModal" class="btn btn-sm btn-danger "><i class="fas fa-fw fa-trash"></i>
                                    </a>
                                </div>`;
                        }
                    } else if (userName == 'kelurahan') {
                        if (row.status == 'ditolak' ) {
                            return ` <span class="badge badge-pill badge-danger"> Ditolak</span>`;
            
                            } else if (row.status == 'konfirmasi' ) {
                            return ` <span class="badge badge-pill badge-warning"> Menunggu Konfirmasi</span>`;
                            
                        } else if (row.status == 'sukses' ) {
                            return `<a href="{{ url('pmks/') }}/${row.id}" id="btnShow"  class="btn btn-sm btn-info"><i class="fas fa-fw fa-eye"></i></a>
                           
                            `;
                        }
                    } else{
                        if (row.status == 'ditolak' ) {
                            return ` <span class="btn btn-sm btn-danger"> Ditolak</span>`;
                            } else if (row.status == 'konfirmasi' ) {
                            return  `<a onclick="status(${row.id})"  class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Konfirmasi</a>`;
                           
                            } else if (row.status == 'sukses' ) {
                                return `
                                <div class="btn-group">
                                <a href="{{ url('pmks/') }}/${row.id}" id="btnShow"  class="btn btn-sm btn-info"><i class="fas fa-fw fa-eye"></i></a>
                                <a href="{{ url('pmks/${row.id}/edit') }}" id="btnEdit" title="" class="btn btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a>
                                <a href="javascript:;" data-toggle="modal" onclick="deleteData(${row.id})"
                                    data-target="#DeleteModal" class="btn btn-sm btn-danger "><i class="fas fa-fw fa-trash"></i>
                                    </a>
                                </div>
                                    `;
                        }
                    }
            
                }
            },
            {
                targets: 8,
                "visible": true,
                className: 'dt-body-center',
                data: function( row, type, val, meta){
                if (row.status == 'ditolak') {
                    return `<span class="badge badge-pill badge-danger"> Ditolak</span>`;
                } else if (row.status == 'konfirmasi') {
                    return  `<span class="badge badge-pill badge-warning"> Menuggu Konfirmasi</span>`;
                } else if (row.status == 'sukses') {
                    return `<span class="badge badge-pill badge-primary"> Telah Dikonfirmasi</span>`;
                }
                }
            }
            ],
            
        });
    });
    $(document).ready(function () {
        $("#myTable2").DataTable({
            "ajax": {
                "type": "GET",
                "url": "{{ route('dataPmksKonfirmasi') }}",
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,

            },
    
            "columns": [
                {data: null,"sortable": false, 
                render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
                }  
            }, {
                    "data": "nama"
                }, {
                    "data": "nik"
                }, {
                    "data": "id_dtks"
                }, {
                    "data": "jenis_pmks"
                }, 
            
                {
                    "data": "jenis_kelamin"
                },
                {
                    "data": "kelurahan"
                },
                {
                    "data": "kecamatan"
                },
                {
                    name: 'status2',
                    orderable: false,
                    searchable: false,
                },
                {
                    name: 'status3',
                    orderable: false,
                    searchable: false,
                
                },
            ],
            "columnDefs": [
            {
                targets: 9,
                "visible": true,
                className: 'dt-body-center',
                data: function( row, type, val, meta){
                var userName =   window.userID = '{{ Auth::user()->role }}';
                    if ( userName == 'dinsos'  ) {
                            if (row.status == 'ditolak' ) {
                                return ` <span class="btn btn-sm btn-danger"> Ditolak</span>`;
                            } else if (row.status == 'konfirmasi' ) {
                                return ` <span class="badge badge-pill badge-warning"> Menunggu Konfirmasi</span>`;
                            } else if (row.status == 'sukses' ) {
                                return `
                                <div class="btn-group">
                                    <a href="{{ url('pmks/') }}/${row.id}" id="btnShow"  class="btn btn-sm btn-info"><i class="fas fa-fw fa-eye"></i></a>
                                    <a href="{{ url('pmks/${row.id}/edit') }}" id="btnEdit" title="" class="btn btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData(${row.id})"
                                        data-target="#DeleteModal" class="btn btn-sm btn-danger "><i class="fas fa-fw fa-trash"></i>
                                    </a>
                                </div>`;
                        }
                    } else if (userName == 'kelurahan') {
                        if (row.status == 'ditolak' ) {
                            return ` <span class="badge badge-pill badge-danger"> Ditolak</span>`;
            
                            } else if (row.status == 'konfirmasi' ) {
                            return ` 
                            <div class="btn-group">
                                <a href="{{ url('pmks/') }}/${row.id}" id="btnShow"  class="btn btn-sm btn-info"><i class="fas fa-fw fa-eye"></i></a>
                                <a href="{{ url('pmks/${row.id}/edit') }}" id="btnEdit" title="" class="btn btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a>
                                <a href="javascript:;" data-toggle="modal" onclick="deleteData(${row.id})"
                                data-target="#DeleteModal" class="btn btn-sm btn-danger "><i class="fas fa-fw fa-trash"></i>
                                </a>
                            </div>`;
                            
                        } else if (row.status == 'sukses' ) {
                            return `<a href="{{ url('pmks/') }}/${row.id}" id="btnShow"  class="btn btn-sm btn-info"><i class="fas fa-fw fa-eye"></i></a>
                           
                            `;
                        }
                    } else{
                        if (row.status == 'ditolak' ) {
                            return ` <span class="btn btn-sm btn-danger"> Ditolak</span>`;
                            } else if (row.status == 'konfirmasi' ) {
                            return  `<a onclick="status(${row.id})"  class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Konfirmasi</a>`;
                            } else if (row.status == 'sukses' ) {
                                return `
                                <div class="btn-group">

                                    <a href="{{ url('pmks/') }}/${row.id}" id="btnShow"  class="btn btn-sm btn-info"><i class="fas fa-fw fa-eye"></i></a>
                                    <a href="{{ url('pmks/${row.id}/edit') }}" id="btnEdit" title="" class="btn btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData(${row.id})"
                                    data-target="#DeleteModal" class="btn btn-sm btn-danger "><i class="fas fa-fw fa-trash"></i>
                                    </a>
                                </div>
                                    `;
                        }
                    }
            
                }
            },
            {
                targets: 8,
                "visible": true,
                className: 'dt-body-center',
                data: function( row, type, val, meta){
                if (row.status == 'ditolak') {
                    return `<span class="badge badge-pill badge-danger"> Ditolak</span>`;
                } else if (row.status == 'konfirmasi') {
                    return  `<span class="badge badge-pill badge-warning"> Menuggu Konfirmasi</span>`;
                } else if (row.status == 'sukses') {
                    return `<span class="badge badge-pill badge-primary"> Telah Dikonfirmasi</span>`;
                }
                }
            }
            ],
            
        });
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
    function search() {
        var jenisPMKS = document.getElementById("jenisPmks");
        var kelurahan = document.getElementById("kelurahan");
        $('#show').show();
        if (table != null) {
            table.clear();
            table.destroy();
        }
        var table = $("#myTable").DataTable({
            "destroy": true,
            scrollX:        true,
                scrollCollapse: true,
                paging:         true,

            "ajax": {
                "type": "GET",
                "url": "{{ route('filter') }}",
                "data": {"kel":kelurahan.value,"jp" :jenisPMKS.value},
                
                "dataSrc": function(json) {
                    return json.data;
                }
            },
     
            "columns": [  
                {data: null,"sortable": false, 
                    render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                }, {
                    "data": "nama"
                }, {
                    "data": "nik"
                }, 
                {
                    "data": "nik"
                }, 
                {
                    "data": "nik"
                }, 
                {
                    "data": "jenis_kelamin"
                },
                {
                    "data": "kelurahan"
                },
                {
                    "data": "kecamatan"
                },    {
                    name: 'status2',
                    data: 'status2',
                    orderable: false,
                    searchable: false,
                },
                {
                    name: 'status3',
                    orderable: false,
                    searchable: false,
                   
                },
            ],
            "columnDefs": [
            {
                targets: 7,
                "visible": true,
                className: 'dt-body-center',
                data: function( row, type, val, meta){
                   if (row.status == 'ditolak') {
                    return ` <span class="btn btn-sm btn-danger"> Ditolak</span>`;
    
                } else if (row.status == 'konfirmasi') {
                    return  `<a href=" {{url('pmks/${row.id}/lihat')}}"  class="btn btn-sm btn-success"><i class="material-icons md-edit"></i> Konfirmasi</a>`;
                    
                   } else if (row.status == 'sukses') {
                    return `<a href="{{ url('pmks/') }}/${row.id}" id="btnShow"  class="btn btn-sm btn-info"><i class="fas fa-fw fa-eye"></i></a>
                    <a href="{{ url('pmks/${row.id}/edit') }}" id="btnEdit" title="" class="btn btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a>
                    <a href="javascript:;" data-toggle="modal" onclick="deleteData(${row.id})"
                        data-target="#DeleteModal" class="btn btn-sm btn-danger "><i class="fas fa-fw fa-trash"></i>
                        </a>   
                    `;
                   }
                }
            }
            ],
            
        });
     
    };
    $(document).ready(function () {
        $('.open-popup').magnificPopup({
            type: 'inline',
            fixContentPos: true,
            duration: 300,
            closeBtnInside: false,
            preloader: false,
            removalDelay: 160,
            mainClass: 'mfp-fade'
        });
    });
    function status(kd_bio) {
        console.log(kd_bio);
      let status ='1';
        swal({
            title: "Apakah Anda Yakin?",
            text: "Kamu Akan Memverifikasi Akun ini!",
            type: "warning",
            cancelButtonText: 'Kembali',
            showCancelButton: true,
            confirmButtonColor: "#3BB77E",
            confirmButtonText: "Ya, Verifikasi!",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (!isConfirm) return;
            $.ajax({
              url: "{{ route('memberStatus') }}",
              data: {'id_pmks': kd_bio },
              success: function (data) {
                swal("Sukses!", "Akun Sudah Diverifikasi", "success");
                location.reload();
              },error: function (xhr, ajaxOptions, thrownError) {
                swal("Gagal!", "Akun Gagal Diverifikasi", "error");
            }
            });
           
        });

    }
</script>

@include('layouts.script.delete')
@endsection
