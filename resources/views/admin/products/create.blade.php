@extends('layout.admin')

@section('title') Add Product @endsection
@section("head")
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
@endsection
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Producty</h1>

</div>

<!-- Alert Errors -->
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Please fix the following errors:</strong>
        <ul class="mb-0 mt-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<!-- Form Card -->
<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-fw fa-list"></i> New Product
        </h6>
        <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left fa-sm"></i> Back to Products
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
              @include('admin.products.form')
         <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times fa-sm mr-1"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-save fa-sm mr-1"></i> Save Product
                </button>
            </div>
</form>
    </div>
</div>

@endsection
