
@extends('layouts.app')
@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],'Perhitungan' ?? '')) }}</h1>
@stop
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ Str::title(Str::replaceArray('-',[' '],'Matrix Keputusan' ?? '')) }} (X)</h3>
        <div class="float-right">
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-sm text-center" id="myTable">
            <thead>
                <tr>
                    <th >No</th>
                    <th>Alternatif</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>C6</th>
                    <th>C7</th>
                    <th>C8</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" class="dt-head-center">Min</th>
                    <th id="amin2" class="min dt-head-center"></th>
                    <th id="amin3" class="min dt-head-center"></th>
                    <th id="amin4" class="min dt-head-center"></th>
                    <th id="amin5" class="min dt-head-center"></th>
                    <th id="amin6" class="min dt-head-center"></th>
                    <th id="amin7" class="min dt-head-center"></th>
                    <th id="amin8" class="min dt-head-center"></th>
                    <th id="amin9" class="min dt-head-center"></th>
                </tr>
                <tr>
                    <th colspan="2" class="dt-head-center">Max</th>
                    <th id="amax2" class="max dt-head-center"></th>
                    <th id="amax3" class="max dt-head-center"></th>
                    <th id="amax4" class="max dt-head-center"></th>
                    <th id="amax5" class="max dt-head-center"></th>
                    <th id="amax6" class="max dt-head-center"></th>
                    <th id="amax7" class="max dt-head-center"></th>
                    <th id="amax8" class="max dt-head-center"></th>
                    <th id="amax9" class="max dt-head-center"></th>
                  </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ Str::title(Str::replaceArray('-',[' '],'Bobot Kriteria' ?? '')) }} (W)</h3>
        <div class="float-right">
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-sm text-center" id="myTable2" >
            <thead>
                <tr>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>C6</th>
                    <th>C7</th>
                    <th>C8</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
       
        </table>
    </div>
</div>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ Str::title(Str::replaceArray('-',[' '],'Normalisasi Bobot Kriteria' ?? '')) }} </h3>
        <div class="float-right">
            {{--  <a href="{{ route($modul.'.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
                Tambah Data</a>  --}}
            
        </div>
      
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-sm text-center" id="myTable3" >
            <thead>
                <tr>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>C6</th>
                    <th>C7</th>
                    <th>C8</th>
                </tr>
            </thead>
            <tbody>
        
            </tbody>
        </table>
    </div>
</div>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ Str::title(Str::replaceArray('-',[' '],'Nilai Utitlity (U)' ?? '')) }} </h3>
        <div class="float-right">
            {{--  <a href="{{ route($modul.'.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i>
                Tambah Data</a>  --}}
            
        </div>
      
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-sm text-center" id="myTable4"  >
            <thead>
                <tr>
                    <th style="width: 10%;">No</th>
                    <th>Alternatif</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>C6</th>
                    <th>C7</th>
                    <th>C8</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" class="dt-head-center">Min</th>
                    <th id="umin2" class="min dt-head-center"></th>
                    <th id="umin3" class="min dt-head-center"></th>
                    <th id="umin4" class="min dt-head-center"></th>
                    <th id="umin5" class="min dt-head-center"></th>
                    <th id="umin6" class="min dt-head-center"></th>
                    <th id="umin7" class="min dt-head-center"></th>
                    <th id="umin8" class="min dt-head-center"></th>
                    <th id="umin9" class="min dt-head-center"></th>
                </tr>
                <tr>
                    <th colspan="2" class="dt-head-center">Max</th>
                    <th id="umax2" class="max dt-head-center"></th>
                    <th id="umax3" class="max dt-head-center"></th>
                    <th id="umax4" class="max dt-head-center"></th>
                    <th id="umax5" class="max dt-head-center"></th>
                    <th id="umax6" class="max dt-head-center"></th>
                    <th id="umax7" class="max dt-head-center"></th>
                    <th id="umax8" class="max dt-head-center"></th>
                    <th id="umax9" class="max dt-head-center"></th>
                  </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ Str::title(Str::replaceArray('-',[' '],'Perhitungan Nilai' ?? '')) }} </h3>
        <div class="float-right">
        </div>
          </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-sm text-center" id="myTable5" >
            <thead>
                <tr>
                    <th style="width: 10%;">No</th>
                    <th>Alternatif</th>
                    <th>Hasil</th>
                    
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2"  class="dt-head-center">Min</th>
                    <th id="hmin2" class="min dt-head-center"></th>
                </tr>
                <tr>
                    <th colspan="2" class="dt-head-center">Max</th>
                    <th id="hmax2" class="max dt-head-center"></th>
                  </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
@section('plugins.Datatables', true)
@section('js')
<script>
   
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
<script>
    $("#myTable").DataTable({
        "fixedHeader": {
            header: true,
            footer: true,
        },
        "ajax": {
            "type": "GET",
            "url": "{{ route('dataPerhitungan') }}",
            
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [{
                "data": "DT_RowIndex",
                "name": "DT_RowIndex"
            },
             {
                "data": "nama"
            },
           {
                name: 'C1',
                data: 'C1',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C2',
                data: 'C2',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C3',
                data: 'C3',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C4',
                data: 'C4',
                orderable: false,
                searchable: false,
            },   {
                name: 'C5',
                data: 'C5',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C6',
                data: 'C6',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C7',
                data: 'C7',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C8',
                data: 'C8',
                orderable: false,
                searchable: false,
            }, 
        ],
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api();
            nb_cols = api.columns().nodes().length;
            var j = 1;
            while (j < nb_cols) {
                var maxVal = api
                    .column(j, { page: 'current' })
                    .data()
                    .sort(function (a, b) { return a - b; })
                    .reverse()[0];

                var minVal = api
                    .column(j, { page: 'current' })
                    .data()
                    .sort(function (a, b) { return a - b; })[0];

                if (typeof maxVal !== "undefined") {      
                    $(api.column(j).cell(":contains(" + maxVal + ")").node()).addClass('cellmax');
                    $(api.column(j).cell(":contains(" + minVal + ")").node()).addClass('cellmin');

                    // Update footer
                    $('#amax' + j).html(maxVal);
                    $('#amin' + j).html(minVal);
                }

                j++;
            }
        }
        
    });
    $("#myTable2").DataTable({
        
        "ajax": {
            "type": "GET",
            "url": "{{ route('bobotKriteria') }}",
            
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [
            {
                name: 'C1',
                data: 'C1',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C2',
                data: 'C2',
                orderable: false,
                searchable: false,
            },   {
                name: 'C3',
                data: 'C3',
                orderable: false,
                searchable: false,
            },   {
                name: 'C4',
                data: 'C4',
                orderable: false,
                searchable: false,
            },   {
                name: 'C5',
                data: 'C5',
                orderable: false,
                searchable: false,
            },   {
                name: 'C6',
                data: 'C6',
                orderable: false,
                searchable: false,
            },   {
                name: 'C7',
                data: 'C7',
                orderable: false,
                searchable: false,
            },   {
                name: 'C8',
                data: 'C8',
                orderable: false,
                searchable: false,
            }, 
           
        ],
     
    });
    $("#myTable3").DataTable({
        "ajax": {
            "type": "GET",
            "url": "{{ route('normalisasiBobotKriteria') }}",
            
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [
            {
                name: 'C1',
                data: 'C1',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C2',
                data: 'C2',
                orderable: false,
                searchable: false,
            },   {
                name: 'C3',
                data: 'C3',
                orderable: false,
                searchable: false,
            },   {
                name: 'C4',
                data: 'C4',
                orderable: false,
                searchable: false,
            },   {
                name: 'C5',
                data: 'C5',
                orderable: false,
                searchable: false,
            },   {
                name: 'C6',
                data: 'C6',
                orderable: false,
                searchable: false,
            },   {
                name: 'C7',
                data: 'C7',
                orderable: false,
                searchable: false,
            },   {
                name: 'C8',
                data: 'C8',
                orderable: false,
                searchable: false,
            }, 
           
        ],
        
    });
    $("#myTable4").DataTable({
        "fixedHeader": {
            header: true,
            footer: true,
        },
        "ajax": {
            "type": "GET",
            "url": "{{ route('dataUtility') }}",
            
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [{
                "data": "DT_RowIndex",
                "name": "DT_RowIndex"
            },
             {
                "data": "nama"
            },
            {
                name: 'C1',
                data: 'C1',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C2',
                data: 'C2',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C3',
                data: 'C3',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C4',
                data: 'C4',
                orderable: false,
                searchable: false,
            }, 

            {
                name: 'C5',
                data: 'C5',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C6',
                data: 'C6',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C7',
                data: 'C7',
                orderable: false,
                searchable: false,
            }, 
            {
                name: 'C8',
                data: 'C8',
                orderable: false,
                searchable: false,
            },        
        ],
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api();
            nb_cols = api.columns().nodes().length;
            var j = 1;
            while (j < nb_cols) {
                var maxVal = api
                    .column(j, { page: 'current' })
                    .data()
                    .sort(function (a, b) { return a - b; })
                    .reverse()[0];

                var minVal = api
                    .column(j, { page: 'current' })
                    .data()
                    .sort(function (a, b) { return a - b; })[0];

                if (typeof maxVal !== "undefined") {      
                    $(api.column(j).cell(":contains(" + maxVal + ")").node()).addClass('cellmax');
                    $(api.column(j).cell(":contains(" + minVal + ")").node()).addClass('cellmin');

                    // Update footer
                    $('#umax' + j).html(maxVal);
                    $('#umin' + j).html(minVal);
                }

                j++;
            }
        }
    });
    $("#myTable5").DataTable({
        "fixedHeader": {
            header: true,
            footer: true,
        },
        "ajax": {
            "type": "GET",
            "url": "{{ route('dataHasil') }}",
            
            "dataSrc": function(json) {
                return json.data;
            }
        },
        "columns": [{
                "data": "DT_RowIndex",
                "name": "DT_RowIndex"
            },
             {
                "data": "nama"
            },
           {
                name: 'total',
                data: 'total',
                orderable: false,
                searchable: false,
            }, 
        ],
        "order": [[2, 'desc']],
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api();
            nb_cols = api.columns().nodes().length;
            var j = 1;
            while (j < nb_cols) {
                var maxVal = api
                    .column(j, { page: 'current' })
                    .data()
                    .sort(function (a, b) { return a - b; })
                    .reverse()[0];

                var minVal = api
                    .column(j, { page: 'current' })
                    .data()
                    .sort(function (a, b) { return a - b; })[0];

                if (typeof maxVal !== "undefined") {      
                    $(api.column(j).cell(":contains(" + maxVal + ")").node()).addClass('cellmax');
                    $(api.column(j).cell(":contains(" + minVal + ")").node()).addClass('cellmin');

                    // Update footer
                    $('#hmax' + j).html(maxVal);
                    $('#hmin' + j).html(minVal);
                }

                j++;
            }
        }
        
    });
</script>
{{--  @include('layouts.script.delete')  --}}
@endsection
