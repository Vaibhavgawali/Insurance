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
        $this->middleware(['role_or_permission:Superadmin|take_assessment']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd("ok");
        
        $quizzes = Quiz::all();
        $headers = ['id', 'title', 'description', 'level'];

        $actions = [
            [
                // 'icon' => 'mdi mdi-bullseye',
                'label' => 'Take Quiz',
                'action' => 'view',
                'url' => function ($item) {
                    return route('candidate-quizes.show', $item['id']);
                },
                'class' => 'info',
            ],
        ];

        // dd($headers);
        return view('dashboard.candidate-quizes.index', ['data'=>$quizzes,'headers'=>$headers,'actions'=>$actions]);
    }

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
    public function show($id)
    {
        $quiz = Quiz::find($id);
        $quiz_level=$quiz->level;
        $quiz_title=$quiz->title;
        $quiz_time=$quiz->quiz_time;
        $questions=$quiz->questions;
        $questions=$questions->map(function ($item){
            $options = $item->answers->take(4);

            return [
                'id'=> $item->id,
                'question_text'=>$item->question_text,
                'option_1'=>$options->get(0)->answer_text ?? null,
                'option_2'=>$options->get(1)->answer_text ?? null,
                'option_3'=>$options->get(2)->answer_text ?? null,
                'option_4'=>$options->get(3)->answer_text ?? null,
            ];
        });

        $headers = ['id', 'question_text','option_1','option_2','option_3','option_4'];//, 'quiz_id', 'level'

        return view('dashboard.candidate-quizes.show', ['questions'=>$questions,'quiz_id'=>$id,'quiz_title'=>$quiz_title,'quiz_level'=>$quiz_level,'quiz_time'=>$quiz_time]);
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

    public function submit(Request $request, $id)
    {
        dd("ok");
        $userAnswers = $request->input('answers');
        $correctAnswers = $this->calculateCorrectAnswers($quiz, $userAnswers);

        Auth::user()->quizzes()->attach($quiz->id, [
            'score' => count($correctAnswers),
        ]);

        return redirect()->route('quizzes.show', $quiz->id)
            ->with(['quizSubmitted' => true, 'correctAnswers' => $correctAnswers]);
    }

    // Helper method to calculate correct answers
    private function calculateCorrectAnswers(Quiz $quiz, $userAnswers)
    {
        $correctAnswers = [];

        foreach ($quiz->questions as $question) {
            $correctAnswerId = $question->answers()->where('is_correct', true)->value('id');

            if ($userAnswers[$question->id] == $correctAnswerId) {
                $correctAnswers[$question->id] = true;
            } else {
                $correctAnswers[$question->id] = false;
            }
        }

        return $correctAnswers;
    }
}
