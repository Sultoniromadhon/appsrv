<?php

namespace App\Livewire\Pages\Domains;

use App\Models\DnsRecord;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class Zones extends Component
{

    public $modal = 'zones_modal';
    public $name;
    public $is_edit = false;
    public $_id;
    public $id;
    public $ttl;
    public $type;
    public $value;
    protected $listeners = [
        'edit',
        'delete',
        'control'
    ];



    // public function mount($id = null)
    // {
    //     if ($id) {
    //         Session::put('id_ses', $id);
    //     }
    //     $this->id = Session::get('id_ses');
    // }


    public function mount($id = null)
    {
        if ($id) {
            try {
                $decrypted = Crypt::decryptString($id);
                Session::put('id_ses', $decrypted);
            } catch (\Exception $e) {
                abort(404);
            }
        }
        $this->id = Session::get('id_ses');
    }


    public function reset_form()
    {
        $this->name = null;
        $this->name = null;
        $this->ttl = null;
        $this->type = null;
        $this->value = null;
    }


    public function closeModal()
    {
        $this->resetErrorBag();
        $this->reset_form();
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

        // dd($this->all());


        $this->resetErrorBag();
        // $this->validate();

        if ($this->is_edit) {
            $data = DnsRecord::where('id', $this->_id)->update([
                'name' => $this->name,
                'ttl' => $this->ttl,
                'type' => $this->type,
                'value' => $this->value

            ]);
        } else {
            $data = DnsRecord::create([
                'domain_id' => $this->id,
                'name' => $this->name,
                'ttl' => $this->ttl,
                'type' => $this->type,
                'value' => $this->value
            ]);
            // dd($data);
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

        $domain = DnsRecord::where('id', $id)->first();
        $this->_id = $domain['id'];
        $this->name = $domain['name'];
        $this->ttl = $domain['ttl'];
        $this->type = $domain['type'];
        $this->value = $domain['value'];

        // $this->dispatchBrowserEvent('modal-show', ['modal' => $this->modal]);
        $this->dispatch('modal-show', ['modal' => $this->modal]);
    }



    public function delete($id)
    {

        $this->resetErrorBag();

        $id = DnsRecord::where('id', $id)->delete();

        if ($id) {
            $this->dispatch('re_render_table');
            $this->closeModal();
            session()->flash('success', 'Successfully saved Domain');
        } else {
            session()->flash('error', 'Failed to saved Domain');
        }
    }


    public function render()
    {
        return view('livewire.pages.domains.zones')->layout('layouts.app')->layoutData(['title' => 'Zones   ']);
    }
}
