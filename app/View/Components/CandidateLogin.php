<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CandidateLogin extends Component
{
    /**
     * Create a new component instance.
     */
    // public $data;
    public $user;

    public function __construct($data)
    {
        // $this->data = $data;
        $this->user = Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-candidate-login');
    }
}
