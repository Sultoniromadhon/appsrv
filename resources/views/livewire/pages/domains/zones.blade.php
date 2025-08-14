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
                            <li class="breadcrumb-item active" aria-current="page">DNS Zone</li>
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

                                <div class="card-subtitle">
                                    <button type="button" wire:click="openModal" class="btn btn-primary me-2">
                                        글쓰기
                                    </button>

                                    {{-- <button type="button"
                                        wire:click="$dispatch('modal-show', { modal: '{{$modal}}' })"
                                        class="btn btn-primary me-2">
                                        Tambah
                                    </button> --}}

                                </div>
                            </div>
                        </x-slot:header>
                        <x-slot:body>
                            <livewire:pages.domains.zone-table />
                        </x-slot:body>
                    </x-layout.card>
                </div>
            </div>
        </section>
    </div>



    <x-modal.centered _id="{{ $modal }}" title="{{ $is_edit ? '@' : '#' }} 서브도메인" form="submit">




        {{-- {{dd($open)}} --}}
        {{-- <x-modal.centered _id="{{$modal}}" title="{{ $is_edit ? 'Edit' : 'Tambah' }} Domain" form="submit"
        x-data="{ show: false }" x-on:modal-show.window="if ($event.detail.modal === '{{$modal}}') show = true"
        x-show="show" x-cloak> --}}


        <x-slot:content>
            <x-alert.validation />
            <x-alert.notification />
            <div class="row">
                <div class="form-group">
                    <label for="code">서브도메인 이름</label>
                    <x-form.text name="이름" model="name" />
                </div>

                <div class="form-group">
                    <label for="code">TTL</label>
                    <x-form.text name="TTL" model="ttl" />
                </div>
                <div class="form-group">
                    <label for="type">타입</label>
                    <x-form.text name="A CNAME NS etc" model="type" />
                </div>

                <div class="form-group">
                    <label for="value">값</label>
                    <x-form.text name="IP @ ns1." model="value" />
                </div>

            </div>
        </x-slot:content>
        <x-slot:action>
            <button type="button" class="btn btn-secondary me-2" wire:click="closeModal">취소</button>
            {{-- <button type="button" class="btn btn-secondary me-2"  wire:click="$dispatch('modal-hide', { modal: 'domainModal' })">Batal</button> --}}
            <x-button.submit label="저장" target="submit" class="btn-primary ml-1" />
        </x-slot:action>
    </x-modal.centered>
</div>
