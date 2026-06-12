{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts: Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap 4 (required by SB Admin 2 styles) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .bg-gradient-primary {
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
            min-height: 100vh;
        }

        .card {
            border-radius: 1rem;
        }

        .bg-login-image {
            background: url('https://source.unsplash.com/K4mSJ7kc0As/600x800') center center no-repeat;
            background-size: cover;
            border-radius: 1rem 0 0 1rem;
        }

        .btn-user {
            border-radius: 10rem;
            padding: 0.75rem 1rem;
            font-size: 0.85rem;
        }

        .form-control-user {
            border-radius: 10rem;
            padding: 1.25rem 1rem;
            font-size: 0.85rem;
        }

        .btn-google {
            background-color: #ea4335;
            color: #fff;
        }

        .btn-google:hover {
            background-color: #c23321;
            color: #fff;
        }

        .btn-facebook {
            background-color: #3b5998;
            color: #fff;
        }

        .btn-facebook:hover {
            background-color: #2d4373;
            color: #fff;
        }

        .text-gray-900 {
            color: #3a3b45 !important;
        }

        .o-hidden {
            overflow: hidden !important;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif

                                    <form action="{{ route('login.post') }}" method="POST" class="user">
                                        @csrf

                                        <div class="form-group">
                                            <input
                                                type="email"
                                                name="email"
                                                class="form-control form-control-user"
                                                placeholder="Enter Email Address..."
                                                value="{{ old('email') }}"
                                                required
                                                autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input
                                                type="password"
                                                name="password"
                                                class="form-control form-control-user"
                                                placeholder="Password"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input
                                                    type="checkbox"
                                                    name="remember"
                                                    class="custom-control-input"
                                                    id="customCheck">
                                                <label class="custom-control-label" for="customCheck">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
