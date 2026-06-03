  @extends('layout.admin2')
@section('title') Show Product @endsection
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
                <h3 class="mb-0">Show Product</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Product</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Show Product</li>
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

              <div class="mb-3">
                  <strong>ID:</strong>  {{$product->id}}
              </div>

              <div class="mb-3">
                  <strong>Parent Category:</strong>
                  @if($product->category)
                      {{$product->category->full_path}}


                  @else
                      No Category
                  @endif




              </div>

               <div class ="mb-3">
                   <strong>Title:</strong> {{$product->title}}
               </div>

               <div class ="mb-3">
                   <strong>User:</strong> {{$product->user_id}}
               </div>

                 <div class ="mb-3">
                     <strong>Keywords:</strong> {{$product->keywords}}
                 </div>



              <div class ="mb-3">
                  <strong>Description:</strong> {{$product->description}}
              </div>

               <div class ="mb-3">
                     <strong>Details:</strong> {!! $product->detail!!}
                 </div>
              <div class ="mb-3">
                     <strong>Price:</strong> {{$product->price}}
                 </div>

               <div class ="mb-3">
                     <strong>Discount:</strong> {{$product->discount}}
                 </div>

               <div class ="mb-3">
                     <strong>Stock:</strong> {{$product->stock}}
                 </div>

               <div class ="mb-3">
                     <strong>MinStock:</strong> {{$product->minstock}}
                 </div>

                  <div class ="mb-3">
                      <strong>Status:</strong>
                      @if  ($product->status == 1)
                                <span class="badge bg-success">Active</span>
                      @else
                              <span class="badge bg-danger">Passive</span>
                      @endif
                  </div>

              <div class ="mb-3">
                  <strong>Image</strong><br>
                  @if($product->image)
                      <img src="{{ asset('storage/' . $product->image) }}" width="150" class="img-thumbnail">
                  @else
                  No image
                      @endif
              </div>




              <a href="{{ route('admin2.product.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('admin2.product.edit', $product->id) }}" class="btn btn-secondary">Edit</a>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
@endsection

