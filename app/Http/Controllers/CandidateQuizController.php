<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Storage;

use App\Models\Quiz;
use App\Models\UserQuiz;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use setasign\Fpdi\Fpdi;

class CandidateQuizController extends Controller
{
    private $pdf;
    public function __construct()
    {
        $this->middleware('auth:sanctum');

        //  Spatie middleware here
        $this->middleware(['role_or_permission:Superadmin|take_assessment']);
        $this->pdf = new Fpdi();
        $this->pdf->AddFont('Courierb', '', 'courierb.php');
        $this->pdf->AddFont('Courier', '', 'courier.php');
        $this->pdf->AddPage('L');
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

        $startTime = $request->session()->get('quiz_start_time') ? Carbon::parse($request->session()->get('quiz_start_time')) : "";
        $quizDurationInMinutes = $quiz->quiz_time + 1; // 1 hour
        $currentTime = Carbon::now();

        // Calculate quiz end time
        if ($startTime) {
            $quizEndTime = $startTime->copy()->addMinutes($quizDurationInMinutes);
        }

        // Check if the current time is within the valid time span
        if ($startTime && $currentTime->between($startTime, $quizEndTime)) {
            // User has submitted within the valid time span
            $userAnswers = $request->except('_token');

            $correctAnswersScore = 2;
            $score = $this->calculateScore($userAnswers, $quizId, $correctAnswersScore);

            if(!$score){
                // dd($score);
                $message = "Please select all questions !";
                return Response(['success' => true, 'message' => $message,'passed'=>'required'], 200);
            }

            $questionCount = $quiz->questions()->count();
            $maximumScore = $questionCount * $correctAnswersScore ; 

            $passingPercentage = 50; 
            $passingScore = round(($passingPercentage / 100) * $maximumScore, 2);
            
            $is_passed = $score > $passingScore;

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

            $request->session()->forget('quiz_start_time');
            if ($is_passed) {
                $message = "You have passed";

                $passed_quiz = UserQuiz::where([
                    'user_id' => Auth::id(),
                    'quiz_id' => $quiz->id,
                ])->first();

                return Response(['user_quiz_id' => $passed_quiz->id, 'success' => true, 'message' => $message, 'passed' => true, 'score' => $score], 200); //,'pdf'=>$pdf

            } else {
                $message = "You have failed";
                return Response(['success' => true, 'message' => $message,'score' => $score, 'passed' => false], 200);
            }

            return Response(['success' => true, 'message' => $message], 200);

        } else {
            // User has submitted outside the valid time span
            $message = "Quiz submission is outside the valid time span.";
            return Response(['success' => false, 'message' => $message], 200);
        }
    }


    // Helper method to calculate score 
    private function calculateScore($userAnswers, $quizId, $correctAnswersScore)
    {
        $score = 0;
 
        $quiz = Quiz::findOrFail($quizId);
        $total_questions=count($quiz->questions);
        // dd($total_questions);

        // Exclude the specified key
        $keyToExclude = 'quiz_id';
        $filteredArray = array_diff_key($userAnswers, [$keyToExclude => '']);

        // Get the count of elements in the filtered array
        $count = count($filteredArray);
        // dd($count);

        if ($count < 1 || $count < $total_questions) {
            return false;
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

    public function generatePDF($userQuizId)
    {
        $user_quiz = UserQuiz::findOrFail($userQuizId);
        $user_quiz = UserQuiz::with('user', 'quiz')
                ->where('id', $userQuizId)
                ->where('pass_status', 1)
                ->firstOrFail();

        $score = $user_quiz->score;
        $date = $user_quiz->updated_at ?? $user_quiz->created_at;

        // $this->pdf->setSourceFile("blankcertificate.pdf");

        $pdfPath = public_path('blankcertificate.pdf');
        $this->pdf->setSourceFile($pdfPath);

        $this->pdf->SetTextColor(0,0,0);

        $tplId = $this->pdf->importPage(1);

        $this->pdf->useTemplate($tplId, 0, 0, 298);
        $this->pdf->SetFont('Courierb', '', 16);

        $successfullCompletion = "Successful completion of Module ".$user_quiz->quiz->level."";

        // Get text width
        $textWidth = $this->pdf->GetStringWidth($successfullCompletion);

        // Get page dimensions
        $pageWidth = $this->pdf->getPageWidth();
        $pageHeight = $this->pdf->getPageHeight();

        // Calculate coordinates for centering text
        $x = ($pageWidth - $textWidth) / 2;
        $y = $pageHeight / 2;

        // Place text at calculated coordinates
        $this->pdf->Text($x, $y - 20, $successfullCompletion);
        $this->pdf->SetY($y);
      
        $studentName=$user_quiz->user->name;
        $bodyText="This is to certify that ".$studentName."has successfully completed the Insurance.";
        $textWidth = $this->pdf->GetStringWidth($bodyText);
        $x = ($pageWidth - $textWidth) / 2;
        $this->pdf->SetX($x+12);
        // Text with different styles
        $this->pdf->SetFont('Courier', '', 14);
        $this->pdf->Write(0,"This is to certify that ");
        $this->pdf->SetFont('Courierb', '', 16);
        $this->pdf->SetTextColor(255,0,0);
        $this->pdf->Write(0,$studentName);
        $this->pdf->SetFont('Courier', '', 14);
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->Write(0," has successfully completed the Insurance");
        $this->pdf->SetY($y+10);
        $this->pdf->SetX($x+12);
        $date = $date->format('m/d/Y');
        $marks=$score;
        $this->pdf->Write(0,"Module Assessment on ".$date." and achieved a score of ".$marks.".");
        $this->pdf->SetY($y+30);
        $this->pdf->SetX($x+12);
        $this->pdf->Write(0,"Awarded by InsuranceCareer.in");
        
        // adds current date
        $this->pdf->SetFont('Courier', '', 12);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetXY(17, 175);
        $date = date('F dS, Y');
        $this->pdf->Write(0, $date);

        $this->pdf->Output();
        exit;

    }
}
