<?php

namespace App\Livewire\Pages\TQuotas;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.t-quotas.index')->layout('layouts.app', ['title' => 'Dashboard']);;
    }
}
