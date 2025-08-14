<div>
    <input type="text" wire:model.defer="{{ $model }}" class="form-control @error($model) is-invalid @enderror" id="{{ $model }}"
           placeholder="사례 {{ $name }}" />
    @error($model)
    <x-form.error message="{{ $message }}" />
    @enderror
</div>