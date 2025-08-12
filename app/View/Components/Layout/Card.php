<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $form;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $form = null)
    {

        $this->title = $title;
        $this->form = $form;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.card');
    }
}
