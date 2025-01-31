<form wire:submit.prevent="submit">
    <div class="form-group">
        <label for="url" class="custom-label">{{ trans('webtools/tools/ssl-checker.label') }}</label>
        <input wire:model.defer="url" type="text" id="url" class="custom-input" placeholder="{{ trans('webtools/tools/ssl-checker.placeholder') }}">
    </div>

    @if($this->status === 'success')
        @if($this->result['success'])
            <div class="form-group">
                <div class="border-0 rounded alert alert-success bg-success">
                    <h5 class="m-0 text-light p-l-25">{{ trans('webtools/tools/ssl-checker.is-valid') }}</h5>
                    <h5 class="m-0 text-light p-l-25">{{ trans('webtools/tools/ssl-checker.created-on') }} {{ date('M d, Y h:i:s A', strtotime($this->result['created_at'])) }}</h5>
                    <h5 class="m-0 text-light p-l-25">{{ trans('webtools/tools/ssl-checker.valid-until') }} {{ date('M d, Y h:i:s A', strtotime($this->result['valid_until'])) }}</h5>
                </div>
            </div>
        @else
            <div class="form-group">
                <div class="border-0 alert alert-danger rounded-pill bg-danger">
                    <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3">{{ trans('webtools/tools/ssl-checker.error-invalid') }}</h5>
                </div>
            </div>
        @endif
    @elseif($this->status === 'failure')
        <div class="form-group">
            <div class="border-0 alert alert-danger rounded-pill bg-danger">
                <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3">{{ trans('webtools/tools/ssl-checker.error-notfound') }}</h5>
            </div>
        </div>
    @endif

    <button class="btn custom--btn button__lg" wire:loading.class="disabled" wire:loading.attr="disabled">
        <span wire:loading.class="d-none">
            {{ trans('webtools/tools/ssl-checker.submit') }}
        </span>

        <span wire:loading>
            <svg width="40" height="10" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                <circle fill="currentColor" cx="15" cy="15" r="15">
                    <animate attributeName="r" from="15" to="15"
                             begin="0s" dur="0.8s"
                             values="15;9;15" calcMode="linear"
                             repeatCount="indefinite" />
                    <animate attributeName="fill-opacity" from="1" to="1"
                             begin="0s" dur="0.8s"
                             values="1;.5;1" calcMode="linear"
                             repeatCount="indefinite" />
                </circle>
                <circle cx="60" cy="15" r="9" fill-opacity="0.3">
                    <animate attributeName="r" from="9" to="9"
                             begin="0s" dur="0.8s"
                             values="9;15;9" calcMode="linear"
                             repeatCount="indefinite" />
                    <animate attributeName="fill-opacity" from="0.5" to="0.5"
                             begin="0s" dur="0.8s"
                             values=".5;1;.5" calcMode="linear"
                             repeatCount="indefinite" />
                </circle>
                <circle cx="105" cy="15" r="15">
                    <animate attributeName="r" from="15" to="15"
                             begin="0s" dur="0.8s"
                             values="15;9;15" calcMode="linear"
                             repeatCount="indefinite" />
                    <animate attributeName="fill-opacity" from="1" to="1"
                             begin="0s" dur="0.8s"
                             values="1;.5;1" calcMode="linear"
                             repeatCount="indefinite" />
                </circle>
            </svg>
        </span>
    </button>
</form>