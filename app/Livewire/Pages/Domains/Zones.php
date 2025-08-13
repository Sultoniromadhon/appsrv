<?php

namespace App\Livewire\Pages\Domains;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Zones extends Component
{
    public function render()
    {
        return view('livewire.pages.domains.zones')->layout('layouts.app')->layoutData(['title' => 'Zones   ']);
    }


    public $modal = 'domain_modal';

    public $name;

    public $is_edit = false;

    public $_id;

    protected $listeners = [
        'edit',
        'delete',
        'control'
    ];


    public $id;

    public function mount($id = null)
    {
        if ($id) {
            Session::put('id_ses', $id);
        }
        $this->id = Session::get('id_ses');
    }

    public function reset_form()
    {
        $this->name = null;
    }


    public function closeModal()
    {
        $this->resetErrorBag();
        $this->reset_form();
        // $this->dispatchBrowserEvent('modal-hide', ['modal' => $this->modal]);
        $this->dispatch('modal-hide', ['modal' => $this->modal]);
        $this->dispatch('focus-outside-modal');
    }

    public function openModal()
    {
        $this->resetErrorBag();
        $this->reset_form();

        $this->dispatch('modal-show', ['modal' => $this->modal]);
        $this->dispatch('focus-outside-modal');
    }


    public function submit()
    {
        $this->resetErrorBag();
        // $this->validate();

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
            $this->dispatch('re_render_table');
            $this->closeModal();
            session()->flash('success', 'Successfully saved Domain');
        } else {
            session()->flash('error', 'Failed to saved Domain');
        }
    }


    public function edit($id)
    {
        $this->resetErrorBag();
        $this->is_edit = true;

        $domain = Domain::where('id', $id)->first();
        $this->_id = $domain['id'];
        $this->name = $domain['name'];

        // $this->dispatchBrowserEvent('modal-show', ['modal' => $this->modal]);
        $this->dispatch('modal-show', ['modal' => $this->modal]);
    }



    public function delete($id)
    {

        $this->resetErrorBag();

        $id = Domain::where('id', $id)->delete();

        if ($id) {
            $this->dispatch('re_render_table');
            $this->closeModal();
            session()->flash('success', 'Successfully saved Domain');
        } else {
            session()->flash('error', 'Failed to saved Domain');
        }
    }
}
