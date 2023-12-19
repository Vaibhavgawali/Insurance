<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    function index()
    {
        return view('frontend.index');
    }
    function candidate_register()
    {
        return view('frontend.candidate-register');
    }
    function insurer_register()
    {
        return view('frontend.insurer-register');
    }
    function institute_register()
    {
        return view('frontend.institute-register');
    }
    function login()
    {
        return view('frontend.login');
    }
}
