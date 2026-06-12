<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index()
    {
        $title = 'Admin Home Page';
$message = 'Welcome to Admin PAnnel';
return view('admin.index', compact('title', 'message'));
    }
}
