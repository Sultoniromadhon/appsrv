<?php

namespace App\View\Components\Table\Custom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Action extends Component
{

    // public $row;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //

        // $this->row = $row;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.custom.action');
    }
}
