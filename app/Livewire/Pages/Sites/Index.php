<?php

namespace App\Livewire\Pages\Sites;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.sites.index')->layout('layouts.app', ['title' => 'Dashboard']);;
    }
}
