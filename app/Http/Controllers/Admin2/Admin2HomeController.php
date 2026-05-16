<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;

class Admin2HomeController extends Controller
{
    public function index()
{
$title = 'Admin Home Page';
$message = 'Welcome to Admin PAnnel';
return view('admin2.index', compact('title', 'message'));
}
}
