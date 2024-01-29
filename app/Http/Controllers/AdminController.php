<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    
    function dashboard()
    {
        $candidateCount = User::where('category', 'Candidate')->count();
        $insurerCount = User::where('category','Insurer')->count();
        $instituteCount = User::where('category','Institute')->count();
        $freshersCount = User::where('category','Candidate')->has('experience')->count();
        
        return view('dashboard.admin.dashboard',['candidateCount'=>$candidateCount,'insurerCount'=>$insurerCount,'instituteCount'=>$instituteCount,'freshersCount'=>$freshersCount]);
    }
   
}

