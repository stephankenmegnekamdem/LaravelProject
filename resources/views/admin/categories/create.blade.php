@extends('layout.admin')

@section('title') Add Category @endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Category</h1>

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
            <i class="fas fa-fw fa-list"></i> New Category
        </h6>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left fa-sm"></i> Back to Categories
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <!-- Left Column -->
                <div class="col-lg-8">

                    <!-- Parent Category -->
                    <div class="form-group">
                        <label for="parent_id" class="font-weight-bold text-dark border-left-primary pl-2">Parent Category</label>
                        <select id="parent_id" name="parent_id" class="form-control">
                            <option value="0">— Main Category (no parent) —</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                    @if($category->parent_id && $category->parent_id != 0)
                                        {{ $category->full_path }} /
                                    @endif
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Select a parent to make this a subcategory.</small>
                    </div>

                    <!-- Title -->
                    <div class="form-group">
                        <label for="title" class="font-weight-bold text-dark border-left-primary pl-2">Title <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Enter category title"
                        />
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Keywords -->
                    <div class="form-group">
                        <label for="keywords" class="font-weight-bold text-dark border-left-primary pl-2">Keywords</label>
                        <input
                            type="text"
                            class="form-control @error('keywords') is-invalid @enderror"
                            id="keywords"
                            name="keywords"
                            value="{{ old('keywords') }}"
                            placeholder="e.g. electronics, gadgets, phones"
                        />
                        <small class="form-text text-muted">Separate keywords with commas.</small>
                        @error('keywords')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description" class="font-weight-bold text-dark border-left-primary pl-2">Description</label>
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            name="description"
                            rows="3"
                            placeholder="Brief description of this category"
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <!-- End Left Column -->

                <!-- Right Column -->
                <div class="col-lg-4">

                    <!-- Image Upload -->
                    <div class="form-group">
                        <label class="font-weight-bold text-dark border-left-primary pl-2">Category Image</label>
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
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
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
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-save fa-sm mr-1"></i> Save Category
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
