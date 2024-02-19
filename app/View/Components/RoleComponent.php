<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoleComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  mixed  $data
     */
    public $roles;

    public function __construct($roles)
    {
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.role-component', ['roles' => $this->roles]);
    }
}
