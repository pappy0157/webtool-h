<form wire:submit.prevent="submit">
    <div class="form-group">
        <label for="domain" class="custom-label">{{ trans('webtools/tools/website-status-checker.label') }}</label>
        <input wire:model.defer="domain" type="text" id="domain" class="custom-input" placeholder="{{ trans('webtools/tools/website-status-checker.placeholder') }}">
    </div>

    @if($this->status !== 'none')
        <div class="form-group">
            @if($this->status == 'OK')
                <div class="border-0 alert alert-success rounded bg-success d-flex align-items-center">
                    <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/website-status-checker.success-running') }}</h5>
                    <h5 class="float-end p-r-25 text-light flex-shrink-0">{{ $this->code }} OK</h5>
                </div>
            @elseif($this->status == 'Redirect')
                <div class="border-0 alert alert-warning rounded-pill bg-warning">
                    <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/website-status-checker.redirect') }}</h5>
                    <h5 class="float-end p-r-25 text-light flex-shrink-0">{{ $this->code }} Redirect</h5>
                </div>
            @elseif($this->status == 'Client Error')
                <div class="border-0 alert alert-danger rounded-pill bg-danger">
                    <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/website-status-checker.client-error') }}</h5>
                    <h5 class="float-end p-r-25 text-light flex-shrink-0">{{ $this->code }} Client Error</h5>
                </div>
            @elseif($this->status == 'Server Error')
                <div class="border-0 alert alert-danger rounded-pill bg-danger">
                    <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/website-status-checker.server-error') }}</h5>
                    <h5 class="float-end p-r-25 text-light flex-shrink-0">{{ $this->code }} Server Error</h5>
                </div>
            @elseif($this->status == 'Unavailable')
                <div class="border-0 alert alert-danger rounded-pill bg-danger">
                    <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/website-status-checker.unavailable') }}</h5>
                    <h5 class="float-end p-r-25 text-light flex-shrink-0">{{ $this->code }} Unavailable</h5>
                </div>
            @endif
        </div>
    @endif

    <button class="btn custom--btn button__lg" wire:loading.class="disabled" wire:loading.attr="disabled">
        <span wire:loading.class="d-none">
            {{ trans('webtools/tools/website-status-checker.submit') }}
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