<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuizComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $questions;
    public $quizId;

    public function __construct($questions, $quizId)
    {
        $this->questions = $questions;
        $this->quizId = $quizId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.quiz-component');
    }
}
