<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    function admin_dashboard()
    {
        return view('dashboard.admin.admin-dashboard');
    }
    function candidate_list()
    {
        return view('dashboard.admin.candidate-list');
    }
    function profile()
    {
        return view('dashboard.admin.admin-profile');
    }
}

