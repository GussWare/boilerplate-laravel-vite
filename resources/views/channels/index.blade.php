@extends('layouts.vertical', ['page_title' => 'Starter Page', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
@vite([
'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css',
'node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css',
'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css',
'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css',
'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css',
])
@endsection



@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Attex</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Channels</a></li>
                        <li class="breadcrumb-item active">Listado</li>
                    </ol>
                </div>
                <h4 class="page-title">Listado de Channels</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                <a href="{{route("channels.create")}}" class="btn btn-success rounded-pill"><i class="ri-add-fill"></i> Nuevo</a>
            </div>

            <br />

            <div class="card">
                <div id="alert-messages"></div>

                <br />

                <div class="card-body">
                    <h4 class="header-title">Basic Data Table</h4>
                    <p class="text-muted fs-14">
                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
                        function:
                        <code>$().DataTable();</code>. KeyTable provides Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned to individual
                        cells, columns, rows or all cells.
                    </p>

                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div>
        </div>
    </div>

</div> <!-- container -->

@endsection


@section('script')
@vite([
'resources/js/channels/index.channel.js',
])
@endsection