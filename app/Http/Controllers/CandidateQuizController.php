<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Quiz;

class CandidateQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');

        //  Spatie middleware here
        // $this->middleware(['role_or_permission:Superadmin']);
    }

    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // dd("ok");
        
    //     $quizzes = Quiz::all();
    //     $headers = ['id', 'title', 'description', 'level'];

    //     $actions = [
    //         [
    //             // 'icon' => 'mdi mdi-bullseye',
    //             'label' => 'View',
    //             'action' => 'view',
    //             'url' => function ($item) {
    //                 return route('quizes.show', $item['id']);
    //             },
    //             'class' => 'info',
    //         ],
    //     ];

    //     // dd($headers);
    //     return view('dashboard.quizes.index', ['data'=>$quizzes,'headers'=>$headers,'actions'=>$actions]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
