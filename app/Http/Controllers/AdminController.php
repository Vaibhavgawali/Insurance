<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    
    function dashboard()
    {
        $candidateCount = User::role('Candidate')->count();
        $insurerCount = User::role('Insurer')->count();
        $instituteCount = User::role('Institute')->count();
        $freshersCount = User::role('Candidate')->has('experience')->count();
        
        return view('dashboard.admin.dashboard',['candidateCount'=>$candidateCount,'insurerCount'=>$insurerCount,'instituteCount'=>$instituteCount,'freshersCount'=>$freshersCount]);
    }
   
}

