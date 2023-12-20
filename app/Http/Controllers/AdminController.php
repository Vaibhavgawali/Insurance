<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    function admin_profile()
    {
        return view('dashboard.admin-profile');
    }
    function candidate_list_table()
    {
        return view('dashboard.candidate-list');
    }
}

