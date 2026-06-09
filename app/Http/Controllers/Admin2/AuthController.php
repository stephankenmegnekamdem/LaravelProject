<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function loginForm()
{
return view('login');
}
public function login(Request $request)
{
$request->validate([
'email' => 'required|email',
'password' => 'required|string',
]);
$credentials = $request->only('email', 'password');
if (Auth::attempt($credentials, $request->filled('remember'))) {
$request->session()->regenerate();
return redirect()->intended(route('admin2.index')); // Redirect to before login route
}
return back()->withErrors([
'email' => 'Invalid email or password.',
])->onlyInput('email');
}
public function logout(Request $request)
{
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect()->route('home'); // If you want you send to login route('login');
}
}
