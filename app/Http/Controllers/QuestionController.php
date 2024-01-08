<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Auth;
use Validator;

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
        // print_r(intval($request->correct_answer));die;
        $quiz_id=$request->input('quiz_id');
        $validator = Validator::make($request->all(), [
            'question_text' => 'required|string',
            'answers' => 'required|array|min:4',
            'correct_answer' => 'required|integer|in:0,1,2,3',
            'answers.*' => 'required|string',
        ], [
            'answers.*.required' => 'Answer :attribute is required.',
        ]);
        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $question = Question::create([
            'question_text' => $request->input('question_text'),
            'quiz_id'=>$quiz_id
        ]);

        // Create answers for the question
        foreach ($request->input('answers') as $index => $answerText) {
            $correct = $index  == $request->input('correct_answer');
    
            $question->answers()->create([
                'answer_text' => $answerText,
                'is_correct' => $correct,
            ]);
        }
        return Response(['status' => true, 'message' => "Question created successfully"], 200);
        // return redirect()->route('quizes.show',$quiz_id)->with('success', 'Question created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::with('answers')->find($id);
        $question_text=$question->question_text;
        $quiz_id=$question->quiz_id;
        if ($question) {
            $answers = $question->answers;
            $correctOption = $answers->firstWhere('is_correct');
        }
        return view('dashboard.questions.show', ['question_text'=>$question_text,'correctOption'=>$correctOption,'answers'=>$answers,'question_id'=>$id,'quiz_id'=>$quiz_id]);

        // return view('dashboard.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $question = Question::with('answers')->find($id);
        $question_text=$question->question_text;
        $quiz_id=$question->quiz_id;
        if ($question) {
            $answers = $question->answers;
            $correctOption = $answers->firstWhere('is_correct');
        }
        return view('dashboard.questions.edit', ['question_text'=>$question_text,'correctOption'=>$correctOption,'answers'=>$answers,'question_id'=>$id,'quiz_id'=>$quiz_id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        
        $quiz_id=$request->input('quiz_id');
        $validator = Validator::make($request->all(), [
            'question_text' => 'required|string',
            'answers' => 'required|array|min:4',
            'correct_answer' => 'required|integer',
            'answers.*' => 'required|string',
        ], [
            'answers.*.required' => 'Answer :attribute is required.',
        ]);
        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }
    
        $question = Question::findOrFail($id);
    
        $question->update(['question_text' => $request->input('question_text'),]);
    
        // Update existing answers
        foreach ($request->input('answers') as $index => $answerText) {
    $correct = $index + 1 == $request->input('correct_answer');
    
    
            // Find the existing answer by its index
            $answer = $question->answers->get($index);
    
            // Update the answer if it exists
            if ($answer) {
                $answer->update([
                    'answer_text' => $answerText,
                    'is_correct' => $correct,
                ]);
            } else {
                // If the answer doesn't exist, create a new one
                $question->answers()->create([
                    'answer_text' => $answerText,
                    'is_correct' => $correct,
                ]);
            }
        }
        return Response(['status' => true, 'message' => "Question updated successfully"], 200);
        
        // return redirect()->route('quizes.show',$quiz_id)->with('success', 'Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $question = Question::find($id);
        $question->delete();
        return redirect()->back()->with('success', 'Question deleted successfully');

    }
}
