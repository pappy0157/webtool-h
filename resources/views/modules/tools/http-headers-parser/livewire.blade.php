<div>
    <div class="mb-5 form-group">
        <label class="custom-label">{{ trans('webtools/tools/http-headers-parser.label') }}</label>
        <div class="copy-textarea-btn">
            <input type="text" wire:model.defer="url" class="custom-input" placeholder="{{ trans('webtools/tools/http-headers-parser.placeholder') }}" />
        </div>
        <button wire:loading.class="disabled" wire:click='submit' class="mt-2 btn custom--btn button__lg">
            <span wire:loading.class="d-none">
                {{ trans('webtools/tools/http-headers-parser.submit') }}
            </span>
    
            <span wire:loading>
                <svg width="40" height="10" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#fff">
                    <circle cx="15" cy="15" r="15">
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
    </div>

    @if($this->error == 0 && $this->headers != [])
        @foreach ($this->headers as $header => $value)
            <div class="px-3 py-2 mb-1 rounded d-flex justify-content-between align-items-center bg-light">
                <span class="w-25 d-inline-block">{{ $header }}</span>
                <span class="w-75 d-inline-block">{!! join('<br>', $value) !!}</span>
            </div>
        @endforeach
    @elseif($this->error == 1)
        <div class="alert alert-danger input-alerts">{{ trans('webtools/tools/http-headers-parser.error-text') }}</div>
    @endif
</div>