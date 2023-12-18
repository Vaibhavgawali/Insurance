<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    function index()
    {
        return view('frontend.index');
    }
    function register()
    {
        return view('frontend.register');
    }
    function login()
    {
        return view('frontend.login');
    }
}
