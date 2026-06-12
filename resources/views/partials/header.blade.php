   <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none border-bottom d-lg-block">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-4 text-center text-lg-start mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="#" class="text-muted me-2"> Help</a><small> / </small>
                    <a href="#" class="text-muted mx-2"> Support</a><small> / </small>
                    <a href="#" class="text-muted ms-2"> Contact</a>

                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
                <small class="text-dark">Call Us:</small>
                <a href="#" class="text-muted">(+012) 1234 567890</a>
            </div>

            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-muted me-2" data-bs-toggle="dropdown"><small>
                                USD</small></a>
                        <div class="dropdown-menu rounded">
                            <a href="#" class="dropdown-item"> Euro</a>
                            <a href="#" class="dropdown-item"> Dolar</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-muted mx-2" data-bs-toggle="dropdown"><small>
                                English</small></a>
                        <div class="dropdown-menu rounded">
                            <a href="#" class="dropdown-item"> English</a>
                            <a href="#" class="dropdown-item"> Turkish</a>
                            <a href="#" class="dropdown-item"> Spanol</a>
                            <a href="#" class="dropdown-item"> Italiano</a>
                        </div>
                    </div>
                   <div class="dropdown">
    <a href="#" class="dropdown-toggle text-muted ms-2" data-bs-toggle="dropdown">
        <small>
            <i class="fa fa-home me-2"></i>
            @auth
                {{ Auth::user()->name }}
            @else
                My Dashboard
            @endauth
        </small>
    </a>
    <div class="dropdown-menu rounded">

        @auth
            <!-- User Info -->
            <span class="dropdown-item-text font-weight-bold text-dark">
                <i class="fas fa-user fa-sm mr-2"></i> {{ Auth::user()->name }}
            </span>
            <span class="dropdown-item-text text-muted small">
                {{ Auth::user()->email }}
            </span>
            <div class="dropdown-divider"></div>
        @endauth

        <!-- Home -->
        <a href="{{ route('home') }}" class="dropdown-item">
            <i class="fas fa-home fa-sm mr-2"></i> Home
        </a>

        <!-- Admin Links (only for admins) -->
        @auth
            @if(Auth::user()->hasRole('admin'))
                <div class="dropdown-divider"></div>
                <span class="dropdown-item-text text-muted small text-uppercase">
                    Admin Panels
                </span>
                <a href="{{ route('admin.index') }}" class="dropdown-item">
                    <i class="fas fa-columns fa-sm mr-2 text-primary"></i> SB Admin 2
                </a>
                <a href="{{ route('admin2.index') }}" class="dropdown-item">
                    <i class="fas fa-tachometer-alt fa-sm mr-2 text-success"></i> AdminLTE
                </a>
                <div class="dropdown-divider"></div>
            @endif
        @endauth

        <!-- Links -->
        <a href="#" class="dropdown-item">
            <i class="fas fa-heart fa-sm mr-2"></i> Wishlist
        </a>
        <a href="#" class="dropdown-item">
            <i class="fas fa-shopping-cart fa-sm mr-2"></i> My Cart
        </a>
        <a href="#" class="dropdown-item">
            <i class="fas fa-bell fa-sm mr-2"></i> Notifications
        </a>
        <a href="#" class="dropdown-item">
            <i class="fas fa-cog fa-sm mr-2"></i> Account Settings
        </a>
        <a href="#" class="dropdown-item">
            <i class="fas fa-user-circle fa-sm mr-2"></i> My Account
        </a>

        <div class="dropdown-divider"></div>

        @guest
            <a href="{{ route('login') }}" class="dropdown-item">
                <i class="fas fa-sign-in-alt fa-sm mr-2"></i> Login
            </a>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt fa-sm mr-2"></i> Logout
                </button>
            </form>
        @endauth

    </div>
</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-5 py-4 d-none d-lg-block">
        <div class="row gx-0 align-items-center text-center">
            <div class="col-md-4 col-lg-3 text-center text-lg-start">
                <div class="d-inline-flex align-items-center">
                    <a href="" class="navbar-brand p-0">
                        <h1 class="display-5 text-primary m-0"><i
                                class="fas fa-shopping-bag text-secondary me-2"></i>Electro</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 text-center">
                <div class="position-relative ps-4">
                    <div class="d-flex border rounded-pill">
                        <input class="form-control border-0 rounded-pill w-100 py-3" type="text"
                            data-bs-target="#dropdownToggle123" placeholder="Search Looking For?">
                        <select class="form-select text-dark border-0 border-start rounded-0 p-3" style="width: 200px;">
                            <option value="All Category">All Category</option>
                            <option value="Pest Control-2">Category 1</option>
                            <option value="Pest Control-3">Category 2</option>
                            <option value="Pest Control-4">Category 3</option>
                            <option value="Pest Control-5">Category 4</option>
                        </select>
                        <button type="button" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;"><i
                                class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 text-center text-lg-end">
                <div class="d-inline-flex align-items-center">
                    <a href="#" class="text-muted d-flex align-items-center justify-content-center me-3"><span
                            class="rounded-circle btn-md-square border"><i class="fas fa-random"></i></i></a>
                    <a href="#" class="text-muted d-flex align-items-center justify-content-center me-3"><span
                            class="rounded-circle btn-md-square border"><i class="fas fa-heart"></i></a>
                    <a href="#" class="text-muted d-flex align-items-center justify-content-center"><span
                            class="rounded-circle btn-md-square border"><i class="fas fa-shopping-cart"></i></span>
                        <span class="text-dark ms-2">$0.00</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
