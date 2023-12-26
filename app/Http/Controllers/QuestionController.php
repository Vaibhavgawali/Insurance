<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $questions = Question::all();
        $headers = ['id', 'question_text', 'quiz_id', 'level'];

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
        return view('dashboard.questions.index', ['data'=>$questions,'headers'=>$headers,'actions'=>$actions]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quiz_id = request('quiz_id');

        $quizzes = Quiz::all();
        $quizzes = $quizzes->map(function($item){
            return [
                'name'=>$item->title,
                'id'=>$item->id
            ];
        });
        // print_r(json_decode($quizzes));die;
        
        $fields = [
            ['name' => 'question_text', 'label' => 'Question text', 'type' => 'text', 'placeholder' => 'Question text'],
            // ['name' => 'quiz_id', 'label' => 'Quiz', 'type' => 'select', 'placeholder' => 'Quiz','options'=>json_decode($quizzes),'multiple'=>false],
            // ['name' => 'level', 'label' => 'Level', 'type' => 'text', 'placeholder' => 'Level'],
            // ['name' => 'answer_text', 'label' => 'Option 1', 'type' => 'text', 'placeholder' => 'Answer text'],
            // ['name' => 'answer_text', 'label' => 'Option 2', 'type' => 'text', 'placeholder' => 'Answer text'],
            // ['name' => 'answer_text', 'label' => 'Option 3', 'type' => 'text', 'placeholder' => 'Answer text'],
            // ['name' => 'answer_text', 'label' => 'Option 4', 'type' => 'text', 'placeholder' => 'Answer text'],
            // [
            //     'name' => 'radio_option',
            //     'label' => 'Select correct option',
            //     'type' => 'radio',
            //     'options' => [
            //         ['id' => 1, 'name' => 'Option 1'],
            //         ['id' => 2, 'name' => 'Option 2'],
            //         ['id' => 3, 'name' => 'Option 3'],
            //         ['id' => 4, 'name' => 'Option 4'],
            //     ],
            // ]
        ];
        return view('dashboard.questions.create', ['fields'=>$fields,'quiz_id'=>$quiz_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // print_r($request->all());die;

        $request->validate([
            'question_text' => 'required|string',
            'answers' => 'required|array|min:4',
            'correct_answer' => 'required|integer',
            'answers.*' => 'required|string',
        ], [
            'answers.*.required' => 'Answer :attribute is required.',
        ]);

        $question = Question::create([
            'question_text' => $request->input('question_text'),
            'quiz_id'=>$request->input('quiz_id')
        ]);

        // print_r($question);

        // Create answers for the question
        foreach ($request->input('answers') as $index => $answerText) {
            $correct = $index + 1 == $request->input('correct_answer');
    
            $question->answers()->create([
                'answer_text' => $answerText,
                'is_correct' => $correct,
            ]);
        }
    
        return redirect()->route('questions.create')->with('success', 'Question created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::find($id);
        $answers=$question->answers;
        dd($answers);

        return view('dashboard.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $quizzes = Quiz::all();
        $question = Question::find($id);
        $quizzes = $quizzes->map(function($item){
            return [
                'name'=>$item->title,
                'id'=>$item->id,
                'quiz_id'=>$item->quiz_id
            ];
        });
        
        $fields = [
            ['name' => 'question_text', 'label' => 'Question text', 'type' => 'text', 'placeholder' => 'Question text'],
            ['name' => 'quiz_id', 'label' => 'Quiz', 'type' => 'select', 'placeholder' => 'Quiz','options'=>json_decode($quizzes),'multiple'=>false],
            ['name' => 'level', 'label' => 'Level', 'type' => 'text', 'placeholder' => 'Level'],
        ];
        return view('dashboard.questions.edit', ['question'=>$question,'fields'=>$fields]);
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
    public function destroy($id)
    {
        //
        $question = Question::find($id);
        $question->delete();
        return redirect()->route('questions.index')
            ->with('success', 'Question deleted successfully');
    }
}
