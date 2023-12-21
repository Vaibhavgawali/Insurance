<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    function dashboard()
    {
        return view('dashboard.dashboard');
    }
    function candidate_list_table()
    {
        return view('dashboard.candidate-list');
    }
}

