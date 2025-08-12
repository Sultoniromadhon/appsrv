<?php

namespace App\View\Components\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Centered extends Component
{
    public $_id;

    public $title;

    public $form;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title, $form = null)
    {
        $this->_id = $id;
        $this->title = $title;
        $this->form = $form ?? null;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.centered');
    }
}
