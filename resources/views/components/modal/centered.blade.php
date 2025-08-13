<style>
    .modal-body {
        overflow-y: auto !important;
        max-height: 400px !important;
    }
</style>
<div wire:ignore.self class="modal fade" tabindex="-1" aria-hidden="true" id="{{ $_id }}"
    aria-labelledby="{{ $_id }}Label">
    <div {{ $attributes->merge(['class' => 'modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable']) }}>
        <div class="modal-content">
            <div class="modal-header" id="{{ $_id }}_header">
                <h5 class="modal-title" id="{{ $_id }}Title">{{ $title }}
                </h5>


                <button type="button" class="btn btn-light rounded-circle p-2 border-0 close"
                    style="width: 32px; height: 32px;" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        viewBox="0 0 16 16">
                        <line x1="4" y1="4" x2="12" y2="12" />
                        <line x1="12" y1="4" x2="4" y2="12" />
                    </svg>
                </button>

            </div>
            @if ($form)
                <form wire:submit.prevent="{{ $form }}">
                    <div class="modal-body">
                        {{ $content }}
                    </div>
                    <div class="modal-footer">
                        {{ $action }}
                    </div>
                </form>
            @else
                <div class="modal-body">
                    {{ $content }}
                </div>
                <div class="modal-footer">
                    {{ $action }}
                </div>
            @endif
            {{--            --}}
            {{--            <div class="modal-footer"> --}}
            {{--                <button type="button" class="btn btn-light-secondary" --}}
            {{--                        data-bs-dismiss="modal"> --}}
            {{--                    <i class="bx bx-x d-block d-sm-none"></i> --}}
            {{--                    <span class="d-none d-sm-block">Close</span> --}}
            {{--                </button> --}}
            {{--                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal"> --}}
            {{--                    <i class="bx bx-check d-block d-sm-none"></i> --}}
            {{--                    <span class="d-none d-sm-block">Accept</span> --}}
            {{--                </button> --}}
            {{--            </div> --}}
        </div>
    </div>
</div>
