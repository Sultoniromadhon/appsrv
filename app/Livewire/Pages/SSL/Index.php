<?php

namespace App\Livewire\Pages\SSL;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.s-s-l.index')->layout('layouts.app', ['title' => 'Dashboard']);;
    }
}
