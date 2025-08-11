<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->

    {{-- <button wire:click="$emit('closeModal')" class="btn btn-secondary">Tutup</button> --}}

     <button class="btn btn-secondary" wire:click="$dispatch('closeModal')">Tutup</button>

     {{-- <button x-on:click="$dispatch('closeModal')">Tutup</button> --}}

     {{-- <button class="btn btn-secondary" x-on:click="$dispatch('closeModal')">Tutup</button> --}}


     {{-- <button x-on:click="$dispatch('closeModal')" class="btn btn-secondary"/>Tutup</button> --}}

     {{-- <button class="btn btn-secondary" @click="$dispatch('closeModal')">Tutup</button> --}}


     {{-- <button class="btn btn-secondary" @click="$dispatch('closeModal')">Tutup</button> --}}


     {{-- <button class="btn btn-secondary" @click="$dispatch('closeModal')">Tutup</button> --}}

</div>
