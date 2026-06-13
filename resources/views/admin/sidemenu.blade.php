<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"   href="{{asset('assets') }}/admin/#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link"   href="{{route('admin.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

<hr class="sidebar-divider">

             <!-- Heading -->
            <div class="sidebar-heading">
                Modules
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link"  href="{{route('admin.categories.index')}}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Categories</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="{{route('admin.product.index')}}">
                    <i class="fas fa-fw fa-boxes"></i>
                    <span>Products</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="#">
                    <i class="fas fa-fw fa-star-half-alt"></i>
                    <span>Reviews</span></a>
            </li>

            <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
        aria-expanded="true" aria-controls="collapseOrders">
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>Orders</span>
    </a>
    <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Orders Tracking</h6>
            <a class="collapse-item" href="{{ route('admin.orders.index', ['status' => 'New']) }}">New Orders</a>
            <a class="collapse-item" href="{{ route('admin.orders.index', ['status' => 'Accepted']) }}">Accepted Orders</a>
            <a class="collapse-item" href="{{ route('admin.orders.index', ['status' => 'Onshipping']) }}">OnShipping Orders</a>
            <a class="collapse-item" href="{{ route('admin.orders.index', ['status' => 'Completed']) }}">Completed Orders</a>
            <a class="collapse-item" href="{{ route('admin.orders.index', ['status' => 'Cancelled']) }}">Cancelled Orders</a>
        </div>
    </div>
</li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Components Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed"  href="{{asset('assets') }}/admin/#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item"  href="{{asset('assets') }}/admin/#">Buttons</a>
                        <a class="collapse-item"  href="{{asset('assets') }}/admin/#">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed"  href="{{asset('assets') }}/admin/#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item"  href="{{asset('assets') }}/admin/#">Colors</a>
                        <a class="collapse-item"  href="{{asset('assets') }}/admin/#">Borders</a>
                        <a class="collapse-item"  href="{{asset('assets') }}/admin/#">Animations</a>
                        <a class="collapse-item"  href="{{asset('assets') }}/admin/#">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link"  href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Others
            </div>

            <li class="nav-item">
                <a class="nav-link"  href="{{route('contacts.index')}}">
                    <i class="fas fa-fw fa-comment-dots"></i>
                    <span>Contact Message</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="#">
                    <i class="fas fa-fw fa-question-circle"></i>
                    <span>FAQ</span></a>
            </li>
            <li class="nav-item">
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-outline-danger btn-sm btn-block">
    <i class="fas fa-sign-out-alt fa-sm mr-1"></i> Logout
</button>
  </form>
</li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2"  src="{{asset('assets') }}/admin/img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm"   href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->
