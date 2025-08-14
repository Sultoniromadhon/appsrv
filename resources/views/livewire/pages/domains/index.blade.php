<div>
    <div class="container">
        <div class="title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Page</h3>
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
                            <div class="d-flex justify-content-between align-items-center w-100">
                                {{-- Konten kiri (optional) --}}
                                <div>
                                    <h5 class="card-title m-0">SOA Record</h5>
                                </div>

                                {{-- Tombol kanan --}}
                                <div>
                                    <button type="button" wire:click="openModal" class="btn btn-primary">
                                        글쓰기
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




        {{-- {{dd($open)}} --}}
        {{-- <x-modal.centered _id="{{$modal}}" title="{{ $is_edit ? 'Edit' : 'Tambah' }} Domain" form="submit"
        x-data="{ show: false }" x-on:modal-show.window="if ($event.detail.modal === '{{$modal}}') show = true"
        x-show="show" x-cloak> --}}


        <x-slot:content>
            <x-alert.validation />
            <x-alert.notification />
            <div class="row">
                <div class="form-group">
                    <label for="code">Nama Domain</label>
                    <x-form.text name="Nama" model="name" />
                </div>
                 <div class="form-group">
                    <label for="ttl">TTL Domain</label>
                    <x-form.text name="ttl" model="ttl" />
                </div>
                 <div class="form-group">
                    <label for="soa_serial">SOA Serial</label>
                    <x-form.text name="soa_serial" model="soa_serial" />
                </div>
                 <div class="form-group">
                    <label for="code">SOA Refresh</label>
                    <x-form.text name="SOA Refresh" model="soa_refresh" />
                </div>
                 <div class="form-group">
                    <label for="code">SOA Exp</label>
                    <x-form.text name="SOA Exp" model="soa_expire" />
                </div>
                <div class="form-group">
                    <label for="code">SOA Min</label>
                    <x-form.text name="SOA Min" model="soa_minimum" />
                </div>
                <div class="form-group">
                    <label for="code">SOA NS</label>
                    <x-form.text name="SOA NS" model="soa_ns" />
                </div>
                <div class="form-group">
                    <label for="code">SOA Email</label>
                    <x-form.text name="SOA Email" model="soa_email" />
                </div>
            </div>
        </x-slot:content>
        <x-slot:action>
            <button type="button" class="btn btn-secondary me-2" wire:click="closeModal">Batal</button>
            {{-- <button type="button" class="btn btn-secondary me-2"  wire:click="$dispatch('modal-hide', { modal: 'domainModal' })">Batal</button> --}}
            <x-button.submit label="Simpan" target="submit" class="btn-primary ml-1" />
        </x-slot:action>
    </x-modal.centered>
</div>
