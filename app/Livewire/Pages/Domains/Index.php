<?php

namespace App\Livewire\Pages\Domains;

use App\Models\DnsRecord;
use App\Models\Domain;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Crypt;

class Index extends Component
{


    public $modal = 'domain_modal';

    public $name;
    public $ttl;
    public $soa_serial;
    public $soa_refresh;
    public $soa_expire;
    public $soa_minimum;
    public $soa_ns;
    public $soa_email;


    public $is_edit = false;

    public $_id;

    protected $listeners = [
        'edit',
        'delete',
        'control'
    ];


    public function reset_form()
    {
        $this->name = null;
        $this->name = null;
        $this->ttl = null;
        $this->soa_serial = null;
        $this->soa_refresh = null;
        $this->soa_expire = null;
        $this->soa_minimum = null;
        $this->soa_ns = null;
        $this->soa_email = null;
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
        // dd($this->all());

        $this->resetErrorBag();
        // $this->validate();

        if ($this->is_edit) {
            $data = Domain::where('id', $this->_id)->update([
                'name' => $this->name . ".",
                'ttl' => $this->ttl,
                'soa_serial' => $this->soa_serial,
                'soa_refresh' => $this->soa_refresh,
                'soa_expire' => $this->soa_expire,
                'soa_minimum' => $this->soa_minimum,
                'soa_ns' => $this->soa_ns . ".",
                'soa_email' => $this->soa_email . ".",
            ]);
        } else {
            $data = Domain::create([
                'name' => $this->name . ".",
                'ttl' => $this->ttl,
                'soa_serial' => $this->soa_serial,
                'soa_refresh' => $this->soa_refresh,
                'soa_expire' => $this->soa_expire,
                'soa_minimum' => $this->soa_minimum,
                'soa_ns' => $this->soa_ns . ".",
                'soa_email' => $this->soa_email . ".",
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
        $this->ttl = $domain['ttl'];
        $this->soa_serial = $domain['soa_serial'];
        $this->soa_refresh = $domain['soa_refresh'];
        $this->soa_expire = $domain['soa_expire'];
        $this->soa_minimum = $domain['soa_minimum'];
        $this->soa_ns = $domain['soa_ns'];
        $this->soa_email = $domain['soa_email'];

        // $this->dispatchBrowserEvent('modal-show', ['modal' => $this->modal]);
        $this->dispatch('modal-show', ['modal' => $this->modal]);
    }



    public function delete($id)
    {

        $this->resetErrorBag();

        if ($id) {
            Domain::where('id', $id)->delete();
            DnsRecord::where('domain_id', $id)->delete();
        } else {
            session()->flash('error', 'Failed to saved Domain');
        }

        if ($id) {
            $this->dispatch('re_render_table');
            $this->closeModal();
            session()->flash('success', 'Successfully saved Domain');
        } else {
            session()->flash('error', 'Failed to saved Domain');
        }
    }


    public function control($id)
    {
        // return $this->redirectRoute('pages.domains.zones', ['id' => $id], navigate: true);
        $encrypted = Crypt::encryptString($id);

        return $this->redirectRoute('pages.domains.zones', ['id' => $encrypted], navigate: true);
    }


    public function render()
    {
        return view('livewire.pages.domains.index')->layout('layouts.app')->layoutData(['title' => 'Domains']);
    }
}
