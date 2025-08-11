 <div>
    @if ($show)
        <div x-data x-show="true" x-cloak class="modal modal-blur fade show d-block"
            style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $title }}</h5>
                        <button type="button" class="btn-close" @click="$dispatch('closeModal')"></button>
                    </div>
                    <div class="modal-body">
                        {!! $body !!}
                    </div>
                    <div class="modal-footer">
                        {!! $footer !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
