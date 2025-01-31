<div>
    <div class="mb-5 form-group">
        <label class="custom-label">{{ trans('webtools/tools/domain-generator.label') }}</label>
        <div class="copy-textarea-btn">
            <input type="text" wire:model.defer='keyword' class="custom-input" placeholder="{{ trans('webtools/tools/domain-generator.placeholder') }}" />
        </div>
        <button wire:loading.class="disabled" wire:click='generate' class="btn custom--btn button__lg mt-2">
            <span wire:loading.class="d-none">
                {{ trans('webtools/tools/domain-generator.submit') }}
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

    @if($this->error == 0 && count($this->domains))
        @foreach ($this->domains as $domain)
            <div class="d-flex justify-content-between align-items-center bg-light py-2 px-3 rounded mb-1">
                <span>{{ strtolower($domain['name']) }}</span>
                <a class="btn custom--btn px-2 py-1" target="_blank" href="{{ strtolower($domain['link']) }}">{{ trans('webtools/tools/domain-generator.buy') }}</a>
            </div>
        @endforeach
    @elseif($this->error == 1)
        <div class="alert alert-danger input-alerts">{{ trans('webtools/tools/domain-generator.error-1') }}</div>
    @elseif($this->error == 2)
        <div class="alert alert-danger input-alerts">{{ trans('webtools/tools/domain-generator.error-2') }}</div>
    @elseif($this->error == 3)
        <div class="alert alert-danger input-alerts">{{ trans('webtools/tools/domain-generator.error-3') }}</div>
    @endif
</div>