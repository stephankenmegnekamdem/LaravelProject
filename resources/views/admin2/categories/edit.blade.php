@extends('layout.admin2')
@section('title') Edit Category @endsection
@section('content')

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Category</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin2.categories.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin2.categories.update', $category->id) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin2.categories.form', [
                    'category'   => $category,
                    'categories' => $categories
                ])

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin2.categories.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>

        </div>
    </div>
</main>

@endsection
