@extends('layout.admin')
@section('title') Product List @endsection
@section('content')
    <!-- Page Heading -->
    <div class="my-3"></div>

        <span class="icon text-white-50">
            <i class="fas fa-arrow-right"></i>
        </span>

            @if(auth()->check() && auth()->user()->hasRole('admin'))
<a href="{{ route('admin.product.create') }}" class="btn btn-secondary btn-icon-split"><span class="text">Add Product</span>
    </a>
    @endif
<!-- Page Heading -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Stock</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
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
                                <a href="{{ route('admin.product.show', $product->id) }}"
                                   class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('admin.product.edit', $product->id) }}"
                                   class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.product.destroy', $product->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this product?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">No products found.</td>
                        </tr>
                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


@endsection
