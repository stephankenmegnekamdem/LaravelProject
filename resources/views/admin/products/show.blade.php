@extends('layout.admin')

@section('title') Show Product @endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Show Product</h1>

</div>

<div class="row">

    <!-- Left Column: Details -->
    <div class="col-lg-8">
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-fw fa-box mr-1"></i> Product Details
                </h6>
                <div>
                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-warning mr-1">
                        <i class="fas fa-edit fa-sm"></i> Edit
                    </a>
                    <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left fa-sm"></i> Back
                    </a>
                </div>
            </div>

            <div class="card-body">

                <!-- ID -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">ID</div>
                    <div class="col-8 text-gray-800">{{ $product->id }}</div>
                </div>

                <!-- Category -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Category</div>
                    <div class="col-8 text-gray-800">
                        {{ $product->category->full_path ?? 'No Category' }}
                    </div>
                </div>

                <!-- Title -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Title</div>
                    <div class="col-8 text-gray-800">{{ $product->title }}</div>
                </div>

                <!-- User -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">User</div>
                    <div class="col-8 text-gray-800">{{ $product->user_id ?? '—' }}</div>
                </div>

                <!-- Keywords -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Keywords</div>
                    <div class="col-8 text-gray-800">{{ $product->keywords ?? '—' }}</div>
                </div>

                <!-- Description -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Description</div>
                    <div class="col-8 text-gray-800">{{ $product->description ?? '—' }}</div>
                </div>

                <!-- Details -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Details</div>
                    <div class="col-8 text-gray-800">{!! $product->detail ?? '—' !!}</div>
                </div>

                <!-- Price -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Price</div>
                    <div class="col-8 text-gray-800">{{ $product->price ?? '—' }}</div>
                </div>

                <!-- Discount -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Discount</div>
                    <div class="col-8 text-gray-800">{{ $product->discount ?? '—' }}</div>
                </div>

                <!-- Stock -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Stock</div>
                    <div class="col-8 text-gray-800">{{ $product->stock ?? '—' }}</div>
                </div>

                <!-- Min Stock -->
                <div class="row border-bottom py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Min Stock</div>
                    <div class="col-8 text-gray-800">{{ $product->minstock ?? '—' }}</div>
                </div>

                <!-- Status -->
                <div class="row py-3 align-items-center">
                    <div class="col-4 font-weight-bold text-dark border-left-primary pl-3">Status</div>
                    <div class="col-8">
                        @if($product->status == 1)
                            <span class="badge badge-success px-3 py-2">Active</span>
                        @else
                            <span class="badge badge-danger px-3 py-2">Inactive</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Left Column -->

    <!-- Right Column: Image -->
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-fw fa-image mr-1"></i> Product Image
                </h6>
            </div>
            <div class="card-body text-center">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->title }}"
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
    <!-- End Right Column -->

</div>
<!-- End Row -->

@endsection
