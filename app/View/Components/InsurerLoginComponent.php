<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InsurerLoginComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $candidateCount;
    public $freshersCount;

    public function __construct($candidateCount,$freshersCount)
    {
        $this->candidateCount = $candidateCount;
        $this->freshersCount = $freshersCount;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.insurer-login-component');
    }
}
