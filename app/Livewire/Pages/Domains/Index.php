<?php

namespace App\Livewire\Pages\Domains;

use App\Models\Domain;
use Livewire\Component;

class Index extends Component
{


    public $modal = 'domain_modal';

    public $name;

    public $is_edit = false;

    public $_id;

    protected $listeners = [
        'edit',
        'delete'
    ];

    public function reset_form()
    {
        $this->name = null;
    }


    public function closeModal()
    {
        $this->resetErrorBag();
        $this->reset_form();
        $this->dispatchBrowserEvent('modal-hide', ['modal' => $this->modal]);
    }

    public function openModal()
    {
        $this->resetErrorBag();
        $this->reset_form();
        $this->dispatch('modal-show', ['modal' => $this->modal]);


    }

    // public function showModal()
    // {
    //     $this->resetErrorBag();
    //     $this->reset_form();

    //     // $body = view('components.modal.content')->with(['text' => 'Konten default modal.'])->render();
    //     $footer = view('components.modal.footer-close')->render();

    //     $body = "content";
    //     // $footer = "footer";

    //     $this->dispatch('openModal', title: 'Judul Modal : Test ', body: $body, footer: $footer);
    // }


    public function submit()
    {
        $this->resetErrorBag();
        $this->validate();

        if ($this->is_edit) {
            $data = Domain::where('id', $this->_id)->update([
                'name' => $this->name
            ]);
        } else {
            $data = Domain::create([
                'name' => $this->name
            ]);
        }

        if ($data) {
            $this->emit('re_render_table');
            $this->closeModal();
            session()->flash('success', 'Successfully saved Domain');
        } else {
            session()->flash('error', 'Failed to saved Domain');
        }
    }


    public function edit($data)
    {
        $this->resetErrorBag();
        $this->is_edit = true;

        $domain = Domain::where('id', $data['id'])->first();
        $this->_id = $domain['id'];
        $this->name = $domain['name'];

        $this->dispatchBrowserEvent('modal-show', ['modal' => $this->modal]);
    }

    public function delete($data)
    {
        $this->resetErrorBag();

        $data = Domain::where('id', $data['id'])->delete();

        if ($data) {
            $this->emit('re_render_table');
            $this->closeModal();
            session()->flash('success', 'Successfully saved Domain');
        } else {
            session()->flash('error', 'Failed to saved Domain');
        }
    }



    public function render()
    {
        return view('livewire.pages.domains.index')->layout('layouts.app')->layoutData(['title' => 'Domains']);
    }
}
