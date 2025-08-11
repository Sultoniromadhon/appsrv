<?php

namespace App\Livewire\Pages\Security;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.security.index')->layout('layouts.app', ['title' => 'Dashboard']);;
    }
}
