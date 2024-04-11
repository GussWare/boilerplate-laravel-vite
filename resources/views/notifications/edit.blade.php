@extends('layouts.vertical', ['page_title' => 'Form Validation', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Notifications</a></li>
                        <li class="breadcrumb-item active">Crear Notificación</li>
                    </ol>
                </div>
                <h4 class="page-title">Crear Notificación</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Custom styles</h4>
                    <p class="text-muted fs-14">Custom feedback styles apply custom colors, borders,
                        focus styles, and background
                        icons to better communicate feedback. Background icons for
                        <code>&lt;select&gt;</code>s are only available with
                        <code>.form-select</code>, and not <code>.form-control</code>.
                    </p>

                    <div id="alert-messages"></div>

                    <form id="form-create" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{$notification->id}}">
                        <div class="mb-3">
                            <label class="form-label" for="title">Titulo</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Titulo del mensaje" value="{{$notification->title}}" required readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="category_id">Categoría</label>
                            <select class="form-select" id="category_id" name="category_id" readonly>
                                <option value="">Seleccione una categoría</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $notification->category_id ? 'selected' : '' }}> {{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="message">Mensaje</label>
                            <textarea class="form-control" id="message" name="message" rows="5" readonly>{{$notification->message}}</textarea>
                        </div>

                        <a class="btn btn-secondary" href="{{route("notifications.index")}}">Cancelar</a>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->


        <div class="card">
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
                            <th>Titulo Mensaje</th>
                            <th>Estatus Mensaje</th>
                            <th>Canal</th>
                            <th>Usuario</th>
                            <th>Created At</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div>
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection


@section('script')
@vite([
'resources/js/notifications/create.notifications.js',
'resources/js/notifications/log.notifications.js',
])
@endsection