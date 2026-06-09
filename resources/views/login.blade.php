<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
<div class="row justify-content-center align-items-center" style="min-height:
100vh;">
<div class="col-md-4">
<div class="card shadow">
<div class="card-header text-center">
<h4> Login</h4>
</div>
<div class="card-body">
@if($errors->any())
<div class="alert alert-danger">
{{ $errors->first() }}
</div>
@endif
<form action="{{ route('login.post') }}" method="POST">
@csrf
<div class="mb-3">
<label>Email Address</label>
<input type="email"
name="email"
class="form-control"
value="{{ old('email') }}"
required
autofocus>
</div>
<div class="mb-3">
<label>Password</label>
<input type="password"
name="password"
class="form-control"
required>
</div>
Lesson Note | LaravelProject
Laravel Multi-Role Admin Login System
<div class="mb-3 form-check">
<input type="checkbox"
name="remember"
class="form-check-input"
id="remember">
<label class="form-check-label" for="remember">
Remember me
</label>
</div>
<button type="submit" class="btn btn-primary w-100">
Login
</button>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
