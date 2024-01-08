<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $action;
    public $method;
    public $fields;
    public $layout;
    public $submitLabel;
    public $formClass;
    public $fieldColumn;
    public $modelData;


    public function __construct($action, $method = "POST", $fields, $layout, $submitLabel, $formClass, $fieldColumn = "row-cols-md-2", $modelData = [])
    {
        //
        $this->action = $action;
        $this->method = $method;
        $this->fields = $fields;
        $this->layout = $layout;
        $this->submitLabel = $submitLabel;
        $this->formClass = $formClass;
        $this->fieldColumn = $fieldColumn;
        $this->modelData = $modelData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-component');
    }
}
