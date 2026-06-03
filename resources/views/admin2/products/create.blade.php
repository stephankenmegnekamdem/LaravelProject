@extends('layout.admin2')
@section('title') Add Product @endsection

@section("head")
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
@endsection

@section('content')



<!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Add Product</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Menu</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Submenu</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">

<form action="{{ route('admin2.product.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
              @include('admin2.products.form')
         <button type="submit" class="btn btn-primary ">Save Product</button>
<a href="{{ route('admin2.product.index') }}" class="btn btn-secondary">Back</a>
</form>



          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
@endsection
