  @extends('layout.admin2')
@section('title') Show Category @endsection
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
                <h3 class="mb-0">Show Category</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Show Category</li>
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
                  <strong>ID:</strong>  {{$category->id}}
              </div>

              <div class="mb-3">
                  <strong>Parent Category:</strong>
                      {{$category->full_path}}

                  <!-- @php
                   $titles=[];
                    $current = $category;
                    while($current){
                      array_unshift($titles, $current -> title);
                      if(!$current -> parent_id || $current -> parent_id == 0){
                       break;
                     }

                  $current = $current -> parent;
                    }
                    @endphp

                  {{ implode(' ->', $titles) }}
                  -->

              </div>

               <div class ="mb-3">
                   <strong>Title:</strong> {{$category->title}}
               </div>

                 <div class ="mb-3">
                     <strong>Keywords:</strong> {{$category->keywords}}
                 </div>

              <div class ="mb-3">
                  <strong>Description:</strong> {{$category->description}}
              </div>

                  <div class ="mb-3">
                      <strong>Status:</strong>
                      @if  ($category->status == 1)
                                <span class="badge bg-success">Active</span>
                      @else
                              <span class="badge bg-danger">Passive</span>
                      @endif
                  </div>

              <div class ="mb-3">
                  <strong>Image</strong><br>
                  @if($category->image)
                      <img src="{{ asset('storage/' . $category->image) }}" width="150" class="img-thumbnail">
                  @else
                  No image
                      @endif
              </div>

              <div class ="mb-3">
                                      <strong>Sub Categories</strong> <br>
                                      @if($category->children->count() > 0)
                                          <ul>
                                              @foreach($category->children as $child)
                                                  <li>{{ $child->title }}</li>
                                              @endforeach
                                          </ul>

                                      @else
                                      No sub categories
                                          @endif
              </div>

              <a href="{{ route('admin2.categories.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('admin2.categories.edit', $category->id) }}" class="btn btn-secondary">Edit</a>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
@endsection
