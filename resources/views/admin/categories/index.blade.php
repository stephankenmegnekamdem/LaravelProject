@extends('layout.admin')
@section('title') Category List @endsection
@section('content')
    <!-- Page Heading -->
    <div class="my-3"></div>

        <span class="icon text-white-50">
            <i class="fas fa-arrow-right"></i>
        </span>
         @if(auth()->check() && auth()->user()->hasRole('admin'))
 <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary btn-icon-split"><span class="text">Add Category</span>
    </a>
    @endif
<!-- Page Heading -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Parent</th>
                                            <th>Title</th>
                                            <th>Keywords</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Parent</th>
                                            <th>Title</th>
                                            <th>Keywords</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
 @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>

                            {{-- ✅ Fixed: show parent title or "Main Category" --}}
                            <td>
                                @if($category->parent_id && $category->parent_id != 0 && $category->parent)
                                    {{ $category->parent->title }}
                                @else
                                    <span class="text-muted">Main Category</span>
                                @endif
                            </td>

                            <td>{{ $category->title }}</td>
                            <td>{{ $category->keywords ?? '-' }}</td>
                            <td>{{ $category->description ?? '-' }}</td>

                            <td>
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}"
                                         width="60" height="60"
                                         style="object-fit:cover; border-radius:4px;">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>

                            {{-- ✅ Fixed: Passive was showing bg-success --}}
                            <td>
                                @if($category->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Passive</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.categories.show', $category->id) }}"
                                   class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                   class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this category?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">No categories found.</td>
                        </tr>
                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


@endsection
