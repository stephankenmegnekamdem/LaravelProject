<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary" style="min-height: 100vh;">

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-lg-8">

            <!-- Greeting -->
            <div class="text-center mb-5">
                <h1 class="text-white font-weight-bold">
                    Welcome, {{ Auth::user()->name }}
                </h1>
                <p class="text-white-50">Choose which panel you want to access</p>
            </div>

            <div class="row">

                <!-- SB Admin 2 -->
                <div class="col-md-6 mb-4">
                    <a href="{{ route('admin.index') }}" class="text-decoration-none">
                        <div class="card shadow border-0 h-100 text-center py-5 px-4
                                    transition-all"
                             style="border-radius: 1rem; cursor: pointer;">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-columns fa-4x text-primary"></i>
                                </div>
                                <h4 class="font-weight-bold text-gray-800">SB Admin 2</h4>
                                <p class="text-muted mb-0">
                                    Clean Bootstrap 4 admin panel with sidebar navigation.
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <span class="btn btn-primary btn-sm px-4">
                                    <i class="fas fa-arrow-right fa-sm mr-1"></i> Enter
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- AdminLTE -->
                <div class="col-md-6 mb-4">
                    <a href="{{ route('admin2.index') }}" class="text-decoration-none">
                        <div class="card shadow border-0 h-100 text-center py-5 px-4"
                             style="border-radius: 1rem; cursor: pointer;">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-tachometer-alt fa-4x text-success"></i>
                                </div>
                                <h4 class="font-weight-bold text-gray-800">AdminLTE</h4>
                                <p class="text-muted mb-0">
                                    Feature-rich admin panel with advanced components.
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <span class="btn btn-success btn-sm px-4">
                                    <i class="fas fa-arrow-right fa-sm mr-1"></i> Enter
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <!-- Logout link -->
            <div class="text-center mt-3">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
