<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  mixed  $data
     *
     * @return void
     */

    public $headers;
    public $items;
    public $tableClass;
    public $actions;
    public $data;

    public function __construct($headers, $items, $tableClass = "", $actions = []$data)
    {
        $this->data = $data;
        $this->headers = $headers;
        $this->items = $items;
        $this->tableClass = $tableClass;
        $this->actions = $actions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-component', ['data' => $this->data]);
    }
}
