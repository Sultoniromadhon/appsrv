<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Submit extends Component
{
    public $target;

    public $label;

    public function __construct($target, $label)
    {
        $this->target = $target;
        $this->label = $label;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.submit');
    }
}
