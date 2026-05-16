  @extends('layout.admin2')
@section('title') Title of Page @endsection
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
                <h3 class="mb-0">Edit Category</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Menu</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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




              <form action="{{ route('admin2.categories.update', $category -> id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
              @method('PUT')

              @include('admin2.categories.form', ['category' => $category, 'categories' => $categories])

              <button type="submit" class="btn btn-primary ">Update</button>
                  <a href="{{ route('admin2.categories.index') }}" class="btn btn-secondary">Back</a>
              </form>


          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
@endsection
