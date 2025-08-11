<?php

namespace App\Livewire\Pages\UDisk;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.u-disk.index')->layout('layouts.app', ['title' => 'Dashboard']);;
    }
}
