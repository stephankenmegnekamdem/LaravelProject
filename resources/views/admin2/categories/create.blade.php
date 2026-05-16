@extends('layout.admin2')
@section('title') Add Category @endsection
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
                <h3 class="mb-0">Add Category</h3>
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

          <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title">New Category</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('admin2.categories.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                        <label  class="form-label">Status</label>
                                    <select id="parent_id" name="parent_id" class="form-control">
                                        <option value="0">Main category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id}}">{{ $category -> title }}
                                            </option>
                                        @endforeach
                                        <option></option>
                                    </select>

                                </div>

                      <div class="mb-3">
                        <label  class="form-label">Title</label>
                        <input
                          type="text"
                          class="form-control"
                          id="title"
                          name="title"

                        />
                      </div>
                           <div class="mb-3">
                        <label  class="form-label">keywords</label>
                        <input
                          type="text"
                          class="form-control"
                          id="keywords"
                          name="keywords"

                        />
                           </div>
                                <div class="mb-3">
                        <label  class="form-label">Description</label>
                        <input
                          type="text"
                          class="form-control"
                          id="description"
                          name="description"

                        />
                                </div>


                      <div class="input-group mb-3">
                        <input type="file" class="form-control" id="image"  name="image"/>
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                      </div>


                                <div class="mb-3">
                        <label  class="form-label">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="0">False</option>
                                        <option value="1">True</option>
                                    </select>

                                </div>

                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
                <!--end::Quick Example-->

          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
@endsection
