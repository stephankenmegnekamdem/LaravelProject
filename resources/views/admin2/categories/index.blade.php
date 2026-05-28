@extends('layout.admin2')
@section('title') Category List @endsection
@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <a href="{{ route('admin2.categories.create') }}" class="btn btn-success mb-2">
                        <i class="fas fa-plus me-1"></i> Add Category
                    </a>
                </div>
                <div class="col-sm-3">
                    <h3 class="mb-0">Categories</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category List</li>
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
                        <th>Parent</th>
                        <th>Title</th>
                        <th>Keywords</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
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
                                <a href="{{ route('admin2.categories.show', $category->id) }}"
                                   class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('admin2.categories.edit', $category->id) }}"
                                   class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin2.categories.destroy', $category->id) }}"
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

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $categories->links() }}
            </div>

        </div>
    </div>
</main>

@endsection
