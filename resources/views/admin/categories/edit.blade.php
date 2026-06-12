@extends('layout.admin')

@section('title') Edit Category @endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>

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
            <i class="fas fa-fw fa-th-large mr-1"></i> Edit Category
        </h6>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left fa-sm"></i> Back to Categories
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category->id) }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                <!-- Left Column -->
                <div class="col-lg-8">
                    @include('admin.categories.form', [
                        'category'   => $category,
                        'categories' => $categories
                    ])
                </div>

                <!-- Right Column -->
                <div class="col-lg-4">

                    <!-- Current Image -->
                    @if($category->image)
                        <div class="form-group">
                            <label class="font-weight-bold text-dark border-left-primary pl-2">Current Image</label>
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $category->image) }}"
                                     alt="{{ $category->title }}"
                                     class="img-thumbnail"
                                     style="max-height: 180px;">
                            </div>
                        </div>
                    @endif

                    <!-- Replace Image -->
                    <div class="form-group">
                        <label class="font-weight-bold text-dark border-left-primary pl-2">
                            {{ $category->image ? 'Replace Image' : 'Category Image' }}
                        </label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="image" name="image" accept="image/*"/>
                            <label class="input-group-text" for="image">Upload</label>
                        </div>
                        <small class="form-text text-muted">Accepted: JPG, PNG, WEBP.</small>
                        @error('image')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status" class="font-weight-bold text-dark border-left-primary pl-2">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="1" {{ old('status', $category->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $category->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        <small class="form-text text-muted">Inactive categories won't appear on the site.</small>
                    </div>

                </div>
                <!-- End Right Column -->

            </div>
            <!-- End Row -->

            <hr>

            <!-- Actions -->
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times fa-sm mr-1"></i> Cancel
                </a>
                <button type="submit" class="btn btn-warning px-4">
                    <i class="fas fa-save fa-sm mr-1"></i> Update Category
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
