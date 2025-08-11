<?php

namespace App\Livewire\Pages\Domains;

use Livewire\Component;

class Index extends Component
{


    public function showModal()
    {
        // $body = view('components.modal.content')->with(['text' => 'Konten default modal.'])->render();
        $footer = view('components.modal.footer-close')->render();

        $body = "content";
        // $footer = "footer";

        $this->dispatch('openModal', title: 'Judul Modal : Test ', body: $body, footer: $footer);
    }


    public function render()
    {
        return view('livewire.pages.domains.index')->layout('layouts.app', ['title' => 'Domains']);
    }
}
