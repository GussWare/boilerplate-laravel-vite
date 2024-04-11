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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Categories</a></li>
                        <li class="breadcrumb-item active">Crear Categoría</li>
                    </ol>
                </div>
                <h4 class="page-title">Editar Categoría</h4>
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

                    <form id="form-edit" class="needs-validation" novalidate>
                        @csrf

                        <input type="hidden" name="id" value="{{ $category->id }}">
                        
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Nombre de la categoría" required>
                        </div>
                        <a class="btn btn-secondary" href="{{ route("categories.index") }}">Cancelar</a>
                        <button id="btn-guardar" class="btn btn-success" type="submit">Guardar</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection


@section('script')
@vite([
'resources/js/categories/edit.categories.js',
])
@endsection