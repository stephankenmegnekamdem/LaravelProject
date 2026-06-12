@extends('layout.admin')

@section('title') Show Category @endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Show Category</h1>

</div>

<div class="row">

    <!-- Left Column: Details -->
    <div class="col-lg-8">
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-fw fa-list"></i> Category Details
                </h6>
                <div>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning mr-1">
                        <i class="fas fa-edit fa-sm"></i> Edit
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left fa-sm"></i> Back
                    </a>
                </div>
            </div>

            <div class="card-body">

                <!-- ID -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">ID</div>
                    <div class="col-8 text-gray-800">{{ $category->id }}</div>
                </div>

                <!-- Parent Category -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Parent Category</div>
                    <div class="col-8 text-gray-800">
                        {{ $category->full_path ?? '— None (Main Category) —' }}
                    </div>
                </div>

                <!-- Title -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Title</div>
                    <div class="col-8 text-gray-800">{{ $category->title }}</div>
                </div>

                <!-- Keywords -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Keywords</div>
                    <div class="col-8 text-gray-800">
                        {{ $category->keywords ?? '—' }}
                    </div>
                </div>

                <!-- Description -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Description</div>
                    <div class="col-8 text-gray-800">
                        {{ $category->description ?? '—' }}
                    </div>
                </div>

                <!-- Status -->
                <div class="row py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Status</div>
                    <div class="col-8">
                        @if($category->status == 1)
                            <span class="badge badge-success px-3 py-2">Active</span>
                        @else
                            <span class="badge badge-danger px-3 py-2">Inactive</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <!-- Sub Categories -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-fw fa-sitemap mr-1"></i> Sub Categories
                </h6>
            </div>
            <div class="card-body">
                @if($category->children->count() > 0)
                    <ul class="list-group list-group-flush">
                        @foreach($category->children as $child)
                            <li class="list-group-item text-gray-800">
                                <i class="fas fa-angle-right text-primary mr-2"></i>
                                {{ $child->title }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">
                        <i class="fas fa-info-circle mr-1"></i> No sub categories found.
                    </p>
                @endif
            </div>
        </div>
    </div>

    <!-- Right Column: Image -->
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-fw fa-image mr-1"></i> Category Image
                </h6>
            </div>
            <div class="card-body text-center">
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}"
                         alt="{{ $category->title }}"
                         class="img-thumbnail"
                         style="max-width: 100%;">
                @else
                    <p class="text-muted mb-0">
                        <i class="fas fa-image fa-3x mb-2 d-block text-gray-300"></i>
                        No image uploaded.
                    </p>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection
