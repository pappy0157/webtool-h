<section>
    @if($this->error == 4)
        {!! trans('webtools/tools/domain-whois.error-unvailable') !!}
    @else
        <div class="form-group">
            <label class="custom-label">{!! trans('webtools/tools/domain-whois.label') !!}</label>
            <div class="copy-textarea-btn">
                <input type="text" wire:model.defer='domain' class="custom-input" placeholder="Enter the Domain Name you want to get the WHOIS information of." />
            </div>
            <button wire:loading.class="disabled" wire:click='getWhois' class="mt-2 btn custom--btn button__lg">
                <span wire:loading.class="d-none">
                    {{ trans('webtools/tools/domain-whois.submit') }}
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

        @if($this->error == 2)
            <div class="alert alert-danger input-alerts">{!! trans('webtools/tools/domain-whois.tld-unsupported') !!}</div>
        @endif

        @if($this->whoisInfo)
            <hr>
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/domain-whois.result-label') }}</label>
                <div class="copy-textarea-btn">
                    <textarea type="email" class="rounded custom-textarea" id="whois" placeholder="{!! trans('webtools/tools/domain-whois.result-placeholder') !!}" rows="20">{!! $this->whoisInfo !!}</textarea>
                    <button onclick="window.writeClipboardTextVanilla(this, document.getElementById('whois').value)" class="btn custom--btn button__md copy-btn btn__dark">{!! trans('webtools/general.copy') !!}</button>
                </div>
            </div>
        @endif
    @endif
</section>