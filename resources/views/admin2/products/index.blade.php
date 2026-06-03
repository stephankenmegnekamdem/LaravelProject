@extends('layout.admin2')
@section('title') Product List @endsection
@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <a href="{{ route('admin2.product.create') }}" class="btn btn-success mb-2">
                        <i class="fas fa-plus me-1"></i> Add Product
                    </a>
                </div>
                <div class="col-sm-3">
                    <h3 class="mb-0">Products</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>

                            {{-- ✅ Fixed: show parent title or "Main Product" --}}
                            <td>
    @if($product->category)
        {{ $product->category->full_path }}

    @else
        <span class="text-muted">Main Product</span>
    @endif
</td>

                            <td>{{ $product->title }}</td>
                            <td>{{ $product->price ?? '-' }}</td>
                             <td>{{ $product->discount ?? '-' }}</td>
                            <td>{{ $product->stock ?? '-' }}</td>

                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                         width="60" height="60"
                                         style="object-fit:cover; border-radius:4px;">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>

                            {{-- ✅ Fixed: Passive was showing bg-success --}}
                            <td>
                                @if($product->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Passive</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin2.product.show', $product->id) }}"
                                   class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('admin2.product.edit', $product->id) }}"
                                   class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin2.product.destroy', $product->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this Product?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">No Products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>



        </div>
    </div>
</main>

@endsection
