<?php

namespace App\Livewire\Components\Modal;

use Livewire\Component;

class Std extends Component
{

  public $show = false;
    public $title;
    public $body;
    public $footer;

    protected $listeners = ['openModal' => 'open', 'closeModal' => 'close'];

    public function open($title = '', $body = '', $footer = '')
    {
        $this->title = $title;
        $this->body = $body;
        $this->footer = $footer;
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.components.modal.std');
    }
}
