<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InstitutionLogin extends Component
{
    /**
     * Create a new component instance.
     */
    public $candidateCount;

    public function __construct($candidateCount)
    {
        $this->candidateCount = $candidateCount;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.institution-login');
    }
}
