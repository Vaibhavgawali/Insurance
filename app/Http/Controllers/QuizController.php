<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Validator;

class QuizController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');

        //  Spatie middleware here
        $this->middleware(['role_or_permission:Superadmin']);
    }
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

        // dd($headers);
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
        $input = array_map('trim', $request->all());
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'level' => 'required',
        ]);
        $request['created_by'] = Auth::user()->user_id;

        $quiz = Quiz::create($request->all()); //if all data sent

        return redirect()->route('quizes.index')
        ->with('success', 'Quiz created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);
        $questions=$quiz->questions;
        $questions=$questions->map(function ($item){
            $options = $item->answers->take(4);
            
            $correctOption = null;
            switch (true) {
                case $options->get(0)->is_correct ?? NULL:
                    $correctOption = "1".") ".$options->get(0)->answer_text ?? null;
                    break;
                case $options->get(1)->is_correct ?? NULL:
                    $correctOption = "2".") ".$options->get(1)->answer_text ?? null;
                    break;
                case $options->get(2)->is_correct ?? NULL:
                    $correctOption = "3".") ".$options->get(2)->answer_text ?? null;
                    break;
                case $options->get(3)->is_correct ?? NULL:
                    $correctOption = "4".") ".$options->get(3)->answer_text ?? null;
                    break;
            };

            return [
                'id'=> $item->id,
                'question_text'=>$item->question_text,
                // 'quiz_id'=>$item->quiz_id,
                // 'level'=>$item->level,
                'option_1'=>$options->get(0)->answer_text ?? null,
                'option_2'=>$options->get(1)->answer_text ?? null,
                'option_3'=>$options->get(2)->answer_text ?? null,
                'option_4'=>$options->get(3)->answer_text ?? null,
                'is_correct'=>$correctOption
            ];
        });
      
        // dd($questions);

        $headers = ['id', 'question_text','option_1','option_2','option_3','option_4','is_correct'];//, 'quiz_id', 'level'

        $actions = [
            [
                // 'icon' => 'mdi mdi-square-edit-outline',
                'label' => 'Edit',
                'action' => 'edit',
                'url' => function ($item) {
                    return route('questions.edit', $item['id']);
                },
                'class' => 'primary',
            ],
            [
                // 'icon' => 'mdi mdi-bullseye',
                'label' => 'View',
                'action' => 'view',
                'url' => function ($item) {
                    return route('questions.show', $item['id']);
                },
                'class' => 'info',
            ],
            [
                // 'icon' => 'mdi mdi-delete',
                'label' => 'Delete',
                'action' => 'delete',
                'url' => function ($item) {
                    return route('questions.destroy', $item['id']);
                },
                'class' => 'danger',
            ],
        ];

        return view('dashboard.quizes.show', ['questions'=>$questions,'headers'=>$headers,'actions'=>$actions,'quiz_id'=>$id]);
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
        $input = array_map('trim', $request->all());
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'level' => 'required',
        ]);

        $quiz = Quiz::find($id);
        
        $quiz->update($request->all());

        return redirect()->route('quizes.index')
            ->with('success', 'Quiz updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id);
        $quiz->delete();
        return redirect()->route('quizes.index')
            ->with('success', 'Quiz deleted successfully');
    }
}
