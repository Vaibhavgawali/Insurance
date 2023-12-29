<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    function dashboard()
    {
        return view('dashboard.admin.dashboard');
    }
    function insurer_dashboard()
    {
        return view('dashboard.admin.insurer-login');
    }
}

