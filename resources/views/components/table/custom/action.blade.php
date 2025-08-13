<div class="d-flex justify-content-center">
    <button class="btn btn-secondary btn-sm me-2" wire:click="$dispatch('control', {{ json_encode($row) }})">
        Control Domain
    </button>
    <button class="btn btn-light-primary btn-sm me-2" wire:click="$dispatch('edit', {{ json_encode($row) }})">
        Edit
    </button>
    <button class="btn btn-danger btn-sm" type="button" wire:click="$dispatch('delete', {{ json_encode($row) }})"
        onclick="return confirm('Are you sure you want to delete this data?')|| event.stopImmediatePropagation()">
        Hapus
    </button>


        {{-- <button class="btn btn-danger btn-sm" type="button" wire:click="$dispatch('delete', { id: {{ json_encode($row) }} })"
        onclick="return confirm('Are you sure you want to delete this data?') || event.stopImmediatePropagation()">
        Hapus
    </button> --}}
</div>
