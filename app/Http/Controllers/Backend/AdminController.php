<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.adminDashboard');
    }

    public function AdminLogin()
    {
        return view('admin.auth.login');
    }

}