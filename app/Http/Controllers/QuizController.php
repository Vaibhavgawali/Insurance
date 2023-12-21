<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::all();
        $headers = ['id', 'title', 'description', 'level'];

        $actions = [
            [
                // 'icon' => 'mdi mdi-square-edit-outline',
                'label' => 'Edit',
                'action' => 'edit',
                'url' => function ($item) {
                    return route('quizes.edit', $item['id']);
                },
                'class' => 'primary',
            ],
            [
                // 'icon' => 'mdi mdi-bullseye',
                'label' => 'View',
                'action' => 'view',
                'url' => function ($item) {
                    return route('quizes.show', $item['id']);
                },
                'class' => 'info',
            ],
            [
                // 'icon' => 'mdi mdi-delete',
                'label' => 'Delete',
                'action' => 'delete',
                'url' => function ($item) {
                    return route('quizes.destroy', $item['id']);
                },
                'class' => 'danger',
            ],
        ];
        return view('dashboard.quizes.index', ['data'=>$quizzes,'headers'=>$headers,'actions'=>$actions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = [
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'placeholder' => 'Quiz title'],
            ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'placeholder' => 'Quiz description'],
            ['name' => 'level', 'label' => 'Level', 'type' => 'text', 'placeholder' => 'Level'],
        ];
        return view('dashboard.quizes.create', ['fields' => $fields]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'level' => 'required',
        ]);
        $request['user_id'] = Auth::user()->id;
        $quiz = Quiz::create($request->all()); //if all data sent

        return redirect()->route('quizes.show', $quiz->id)
            ->with('success', 'Quiz created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        return view('dashboard.quizes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fields = [
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'placeholder' => 'Quiz title'],
            ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'placeholder' => 'Quiz description'],
            ['name' => 'level', 'label' => 'Level', 'type' => 'text', 'placeholder' => 'Level'],
        ];
        $quiz = Quiz::find($id);
        // dd($quiz);
        return view('dashboard.quizes.edit', compact('quiz', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'level' => 'required',
        ]);

        $quiz = Quiz::find($id);
        // dd($quiz);
        $quiz->update($request->all());
        return redirect()->route('quizes.show', $id)
            ->with('success', 'Quiz updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
        $quiz->delete();
        return redirect()->route('quizes.index')
            ->with('success', 'Quiz deleted successfully');
    }
}
