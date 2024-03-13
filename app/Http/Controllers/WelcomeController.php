<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    function index()
    {
        return view('frontend.index');
    }
    function about()
    {
        return view('frontend.about');
    }
    function industry()
    {
        return view('frontend.industry');
    }
    function module()
    {
        return view('frontend.module');
    }
    function contact()
    {
        return view('frontend.contact');
    }
    function privacy()
    {
        return view('frontend.privacy');
    } 
    function terms_candidate()
    {
        return view('frontend.terms-candidate');
    }
    function terms_insurer()
    {
        return view('frontend.terms-insurer');
    }
    function terms_institute()
    {
        return view('frontend.terms-institute');
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
