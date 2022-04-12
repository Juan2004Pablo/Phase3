@extends('plantilla.admin')

@section('title','Create category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Categories</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

<div id="apicategory">

        <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf

        <!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Administration of categories</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input v-model="name"

                               @blur="getCategory"
                               @focus="div_appear= false"

                               class="form-control valCaracteresRepetidos"  type="text" name="name" id="name" maxlength="20">

                        
                        <br v-if="div_appear">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5" minlength="15"></textarea>

                    </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">

        <a class="btn btn-danger" href="{{ route('cancel','admin.category.index') }}">Cancel</a>
        <input
            type="submit" value="Save" class="btn btn-primary">

    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
        </form>
    </div>
@endsection
