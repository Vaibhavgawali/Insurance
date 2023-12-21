<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quiz = Quiz::find(1);
        $questions = $quiz->questions;
        $questions = $questions->map(function($item){
            return [
                'name'=>$item->question_text,
                'id'=>$item->id
            ];
        });

        $options = [['id'=>1,'name'=>'Yes'],['id'=>0,'name'=>'No']];
        
        // print_r($questions);die;
        $fields = [
            ['name' => 'answer_text', 'label' => 'Answer text', 'type' => 'text', 'placeholder' => 'Answer text'],
            ['name' => 'question_id', 'label' => 'Question', 'type' => 'select', 'placeholder' => 'Question','options'=>json_decode($questions),'multiple'=>false],
            ['name' => 'is_correct', 'label' => 'Is this correct answer', 'type' => 'radio', 'placeholder' => '','options'=>$options],
        ];
        return view('dashboard.answers.create', ['fields'=>$fields]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'answer_text' => 'required',
            'question_id' => 'required',
            'is_correct' => 'required|boolean',
        ]);

        $answer = Answer::create($request->all());
        return redirect()->route('answers.show', $answer->id)
        ->with('success', 'Answer created successfully');
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
