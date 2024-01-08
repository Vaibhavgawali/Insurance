<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Storage;

use App\Models\Quiz;
use App\Models\UserQuiz;
use Illuminate\Support\Carbon;

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
        // $quizzes = Quiz::all();
        $user = auth()->user();
        $completedQuizIds = $user->quizzes->where('pass_status', true)->pluck('quiz_id')->toArray();

        // If user has completed quizzes, get the next level quizzes
        if (!empty($completedQuizIds)) {
            $nextLevel = Quiz::whereNotIn('id', $completedQuizIds)->min('level');
            
            if ($nextLevel) {
                $quizzes = Quiz::where('level', $nextLevel)->get();
            } else {
                // User has completed all available levels
                $quizzes = collect();
            }
        } else {
            // User hasn't completed any quizzes, show level 1 quizzes
            $quizzes = Quiz::where('level', 1)->get();
        }

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
        return view('dashboard.candidate-quizes.index', ['data' => $quizzes, 'headers' => $headers, 'actions' => $actions]);
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
        $quiz_level = $quiz->level;
        $quiz_title = $quiz->title;
        $quiz_time = $quiz->quiz_time;
        $questions = $quiz->questions;
        $questions = $questions->map(function ($item) {
            $options = $item->answers->take(4);

            return [
                'id' => $item->id,
                'question_text' => $item->question_text,
                'option_1' => $options->get(0)->answer_text ?? null,
                'option_2' => $options->get(1)->answer_text ?? null,
                'option_3' => $options->get(2)->answer_text ?? null,
                'option_4' => $options->get(3)->answer_text ?? null,
            ];
        });

        $headers = ['id', 'question_text', 'option_1', 'option_2', 'option_3', 'option_4']; //, 'quiz_id', 'level'

        return view('dashboard.candidate-quizes.show', ['questions' => $questions, 'quiz_id' => $id, 'quiz_title' => $quiz_title, 'quiz_level' => $quiz_level, 'quiz_time' => $quiz_time]);
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

    public function submit(Request $request, $quizId)
    {

        $quiz = Quiz::findOrFail($quizId);

        $startTime = $request->session()->get('quiz_start_time') ? Carbon::parse($request->session()->get('quiz_start_time')) :"";
        $quizDurationInMinutes = $quiz->quiz_time + 1; // 1 hour
        $currentTime = Carbon::now();

        // Calculate quiz end time
        if($startTime){
            $quizEndTime = $startTime->copy()->addMinutes($quizDurationInMinutes);
        }
        
        // Check if the current time is within the valid time span
        if ($startTime && $currentTime->between($startTime, $quizEndTime)) {
            // User has submitted within the valid time span

        } else {
            // User has submitted outside the valid time span
            $message= "Quiz submission is outside the valid time span.";
            return Response(['success' => true, 'message' => $message], 200);
        }

        $userAnswers = $request->except('_token');

        $score = $this->calculateScore($userAnswers, $quizId);

        $passingScore = 2;
        $is_passed = $score >= $passingScore;

        $user_quiz = UserQuiz::where([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
        ])->first();

        if ($user_quiz && $score > $user_quiz->score) {
            $user_quiz->update(['score' => $score, 'pass_status' => $is_passed]);
        } elseif (!$user_quiz) {
            UserQuiz::create([
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id,
                'score' => $score,
                'pass_status' => $is_passed
            ]);
        }

        if ($is_passed) {
            // certificate logic
            
            $message="You have passed";

            try {
                $data = [
                    'title' => 'Welcome InsuranceNext',
                    'date' => date('m/d/Y'),
                    'users' => $users
                ]; 
                    
                // Your PDF generation code
                $pdf = PDF::loadView('dashboard.candidate-quizes.certificate',$data);
                print_r("ok");

            } catch (\Exception $e) {
                \Log::error($e->getMessage());
                // Handle the exception or return an error response
                print_r("ok");
            }       
         
            // Save the PDF to storage
            $pdfContents = $pdf->output();
            $pdfPath = 'public/documents/'.Auth::id().'_certificate.pdf';
            
            Storage::disk('local')->put($pdfPath, $pdfContents);

            return Response(['status'=>true,'message' => $message, 'pdf_path' => $pdfPath],200);
        }else{
            $message="You have failed";
            return Response(['status'=>false,'message' => $message], 200);
        }
        // Reset the quiz start time in the session
        $request->session()->forget('quiz_start_time');
        return Response(['success' => true, 'message' => $message], 200);
        // return redirect()->route('quizzes.show', $quiz->id)
        //     ->with(['quizSubmitted' => true, 'correctAnswers' => $correctAnswers]);
    }

    // Helper method to calculate score 
    private function calculateScore($userAnswers, $quizId)
    {
        $score = 0;
        $correctAnswersScore = 2;
        $quiz = Quiz::findOrFail($quizId);

        if (count($userAnswers) <= 0) {
            return 0;
        }
        foreach ($quiz->questions as $question) {
            $correctAnswerText = $question->answers()->where('is_correct', true)->value('answer_text');

            $userSelectedAnswerText = $userAnswers[$question->id];

            $score += ($userSelectedAnswerText == $correctAnswerText) ? $correctAnswersScore : 0;
        }

        return $score;
    }

    public function startQuiz(Request $request)
    {
        // Store the quiz start time in the session
        $startTime = $request->session()->get('quiz_start_time');

        if (!$startTime) {
            // Quiz not started  
            // Get the current timestamp with microseconds
            $timestampWithMicroseconds = microtime(true);
            // Format the timestamp with microseconds
            $currentDateTime = date('Y-m-d H:i:s', $timestampWithMicroseconds);
            $request->session()->put('quiz_start_time', $currentDateTime);
            $startTime = $request->session()->get('quiz_start_time');
        }

        return response()->json(['success' => true, 'start_time' => $startTime]);
    }

    public function generatePDF()
    {
        $users = Quiz::get();
  
        $data = [
            'title' => 'Welcome to InsuranceNext',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
            
        $pdf = PDF::loadView('dashboard.candidate-quizes.certificate', compact('data'))
                    ->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true])
                    ->setPaper('A4');

            $pdfContents = $pdf->output();

        // $pdfPath = 'public/certificate/'.Auth::id().'_certificate.pdf';
        
        // Storage::disk('local')->put($pdfPath, $pdfContents);
        return $pdf->download('itsolutionstuff.pdf');
    }
}
