<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

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
        // $headers = ['id', 'title', 'description', 'level','quiz_time'];

        // $actions = [
        //     [
        //         // 'icon' => 'mdi mdi-square-edit-outline',
        //         'label' => 'Edit',
        //         'action' => 'edit',
        //         'url' => function ($item) {
        //             return route('quizes.edit', $item['id']);
        //         },
        //         'class' => 'primary',
        //     ],
        //     [
        //         // 'icon' => 'mdi mdi-bullseye',
        //         'label' => 'View',
        //         'action' => 'view',
        //         'url' => function ($item) {
        //             return route('quizes.show', $item['id']);
        //         },
        //         'class' => 'info',
        //     ],
        //     [
        //         // 'icon' => 'mdi mdi-delete',
        //         'label' => 'Delete',
        //         'action' => 'delete',
        //         'url' => function ($item) {
        //             return route('quizes.destroy', $item['id']);
        //         },
        //         'class' => 'danger',
        //     ],
        // ];

        // dd($headers);
        // return view('dashboard.quizes.index', ['data'=>$quizzes,'headers'=>$headers,'actions'=>$actions]);
        return view('dashboard.quizes.index');

    }
    public function getQuizesTableData(Request $request)
    {   
        $filterLevel = $request->input('filter_Level'); // Use the correct variable name

        $query = Quiz::query(); // Initialize the query
    
        if ($filterLevel) {
            $query->where('level', $filterLevel);
        }
    
        $data = $query->get();
    
        if ($data) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
    
                    $actions = '<a href="/quizes/'. $row->id .'/edit" class="btn btn-primary btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="Edit quiz"><i class="mdi mdi-pen"></i></a>';
                    $actions .= ' <a href="/show_quiz/'. $row->id .'" class="btn btn-info btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="View quiz"><i class="mdi mdi-eye"></i></a>';
                    $actions .= '<a href="/quizes/'. $row->id .'" class="btn btn-success btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="Add question"><i class="mdi mdi-comment-question-outline"></i></a>';
                    $actions .= '<form class="delete-form mx-1 d-inline" data-quiz-id="'. $row->id .'">';
                    $actions .= '<button type="submit" class="btn btn-danger btn-sm delete-button" data-toggle="tooltip" data-placement="top" title="Delete quiz"><i class="mdi mdi-delete"></i></button>';
                    $actions .= '</form>';
                    
                    return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
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
            ['name' => 'quiz_time', 'label' => 'Quiz Time', 'type' => 'text', 'placeholder' => 'Quiz time'],

        ];
        return view('dashboard.quizes.create', ['fields' => $fields]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = array_map('trim', $request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'level' => 'required',
            'quiz_time'=>'required|integer'
        ]);
        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $request['created_by'] = Auth::user()->user_id;
        

        $quiz = Quiz::create($request->all()); //if all data sent

        // return redirect()->route('quizes.index')
        // ->with('success', 'Quiz created successfully');
        return Response(['status' => true, 'message' => "Quiz created successfully"], 200);
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

        // $headers = ['id', 'question_text','option_1','option_2','option_3','option_4','is_correct'];//, 'quiz_id', 'level'

        // $actions = [
        //     [
        //         // 'icon' => 'mdi mdi-square-edit-outline',
        //         'label' => 'Edit',
        //         'action' => 'edit',
        //         'url' => function ($item) {
        //             return route('questions.edit', $item['id']);
        //         },
        //         'class' => 'primary',
        //     ],
        //     [
        //         // 'icon' => 'mdi mdi-bullseye',
        //         'label' => 'View',
        //         'action' => 'view',
        //         'url' => function ($item) {
        //             return route('questions.show', $item['id']);
        //         },
        //         'class' => 'info',
        //     ],
        //     [
        //         // 'icon' => 'mdi mdi-delete',
        //         'label' => 'Delete',
        //         'action' => 'delete',
        //         'url' => function ($item) {
        //             return route('questions.destroy', $item['id']);
        //         },
        //         'class' => 'danger',
        //     ],
        // ];

        // return view('dashboard.quizes.show', ['questions'=>$questions,'headers'=>$headers,'actions'=>$actions,'quiz_id'=>$id]);
        return view('dashboard.quizes.show',['quiz_id'=>$id]);

    }
    public function getQuestionsTableData($quiz_id)
    {   
        $quiz = Quiz::find($quiz_id);
        $questions=$quiz->questions;
        $data=$questions->map(function ($item){
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
            
    
        if ($data) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
    
                    $actions = ' <a href="/questions/'. $row['id'] .'/edit" class="btn btn-primary btn-sm mx-2">     Edit    </a>';
                    $actions .= '<a href="/questions/'. $row['id'] .'" class="btn btn-info btn-sm mx-2">     View</a>';
                    $actions .= '<form class="delete-question-form mx-2 d-inline" data-question-id="'. $row['id'] .'">';
                    $actions .= '<button class="btn btn-danger btn-sm delete-question-button" >Delete</button>';
                    $actions .= '</form>';
                    
                    return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
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
            ['name' => 'quiz_time', 'label' => 'Quiz Time', 'type' => 'text', 'placeholder' => 'Quiz time'],
        ];
        $quiz = Quiz::find($id);
        // dd($quiz);
        return view('dashboard.quizes.edit', compact('quiz', 'fields'));
    }

    public function show_quiz(string $id)
    {
        $fields = [
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'placeholder' => 'Quiz title'],
            ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'placeholder' => 'Quiz description'],
            ['name' => 'level', 'label' => 'Level', 'type' => 'text', 'placeholder' => 'Level'],
            ['name' => 'quiz_time', 'label' => 'Quiz Time', 'type' => 'text', 'placeholder' => 'Quiz time'],
        ];
        $quiz = Quiz::find($id);
        // dd($quiz);
        return view('dashboard.quizes.show_quiz', compact('quiz', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $input = array_map('trim', $request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'level' => 'required',
            'quiz_time'=>'required'
        ]);
        if ($validator->fails()) {
            return Response(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $quiz = Quiz::find($id);
        $quiz_updt=$quiz->update($request->all());

        // return redirect()->route('quizes.index')
        //     ->with('success', 'Quiz updated successfully');
        return Response(['status' => true, 'message' => "Quiz updated successfully"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        $quiz = Quiz::find($id);
        $quiz->delete();
        return redirect()->route('quizes.index')
            ->with('success', 'Quiz deleted successfully');
    }
}
