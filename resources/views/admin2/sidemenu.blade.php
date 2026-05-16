  <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{asset('assets') }}/admin2/index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{asset('assets') }}/admin2/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE Panel</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item menu-open">
                <a href="{{route('admin2.home')}}" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer2"></i>
                  <p>
                   Homepage

                  </p>
                </a>

              </li>
              <li class="nav-item">
                <a href="{{ route('admin2.categories.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-grid"></i>
                  <p>Categories</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam"></i>
                  <p>Products</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-star"></i>
                  <p>Reviews</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Orders
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>New orders</p>
                    </a>
                  </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Accepted orders</p>
                    </a>
                  </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>OnShipping orders</p>
                    </a>
                  </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Completed orders</p>
                    </a>
                  </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Cancelled orders</p>
                    </a>
                  </li>

                </ul>
              </li>



              <li class="nav-header">OTHERS</li>

 <li class="nav-item">
                <a href="{{asset('assets') }}/admin2/docs/faq.html" class="nav-link">
                  <i class="nav-icon bi bi-chat-dots"></i>
                  <p>Contact Message</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{asset('assets') }}/admin2/docs/faq.html" class="nav-link">
                  <i class="nav-icon bi bi-question-circle-fill"></i>
                  <p>FAQ</p>
                </a>
              </li>


              <li class="nav-header">PREFERENCES</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-circle text-danger"></i>
                  <p class="text">Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-circle text-warning"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-circle text-info"></i>
                  <p>Informational</p>
                </a>
              </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
