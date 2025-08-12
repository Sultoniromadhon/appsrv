{{-- <div>
    <button class="btn btn-primary" wire:click="showModal">Add DNS</button>

    <livewire:pages.domains.domain-table />


</div> --}}
<div>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Domain</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Domain</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section mt-10">
            <div class="row">
                <div class="col-12">
                    <x-alert.notification />
                    <x-layout.card>
                        <x-slot:header>
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">List Domain</h5>
                                <div class="card-toolbar">
                                    <button type="button" wire:click="openModal" class="btn btn-primary me-2">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                        </x-slot:header>
                        <x-slot:body>
                            <livewire:pages.domains.domain-table />
                        </x-slot:body>
                    </x-layout.card>
                </div>
            </div>
        </section>
    </div>

    <x-modal.centered _id="{{ $modal }}" title="{{ $is_edit ? 'Edit' : 'Tambah' }} Domain" form="submit">
        <x-slot:content>
            <x-alert.validation />
            <x-alert.notification />
            <div class="row">
                <div class="form-group">
                    <label for="code">Nama Domain</label>
                    <x-form.text name="Nama" model="name" />
                </div>
            </div>
        </x-slot:content>
        <x-slot:action>
            <button type="button" class="btn btn-secondary me-2" wire:click="closeModal">Batal</button>
            <x-button.submit label="Simpan" target="submit" class="btn-primary ml-1" />
        </x-slot:action>
    </x-modal.centered>
</div>
