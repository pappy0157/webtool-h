@push('alpine-components')
    <script type="text/javascript">
        window.bitflanComponentIpToHostname = function() {
            return {
                loading: false,
                status: null,
                ip: '',
                hostname: '',

                getHostname() {
                    const url = `https://ipwho.is/${this.ip}`;

                    this.loading = true;
                    this.status = null;

                    fetch(url).then(response => response.json()).then(data => {
                        this.loading = false;
                        if(data.connection.domain) {
                            this.status = 'success';
                            this.hostname = data.connection.domain;
                        } else {
                            this.status = 'error';
                        }

                    }).catch(e => {
                        this.loading = false;
                        console.error(e);

                        this.status = 'error';
                    });
                }
            }
        }
    </script>
@endpush

<form wire:submit.prevent="getIP">
    <div class="form-group">
        <label for="domain" class="custom-label">{{ trans('webtools/tools/hostname-to-ip.label') }}</label>
        <input wire:model.defer="hostname" type="text" id="domain" class="custom-input" placeholder="{{ trans('webtools/tools/hostname-to-ip.placeholder') }}">
    </div>


    @if($this->status == 'success')
        <div class="border-0 alert alert-success rounded bg-success d-flex align-items-center">
            <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ $this->ip }}</h5>
            <h5 class="float-end p-r-25 text-light flex-shrink-0"><a class="text-white text-underline" href="#" onclick="window.writeClipboardTextVanilla(this, '{{ $this->ip }}')">{{ trans('webtools/general.copy') }}</a></h5>
        </div>
    @elseif($this->status == 'error')
        <div class="border-0 alert alert-danger rounded-pill bg-danger">
            <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/hostname-to-ip.error-text') }}</h5>
            <h5 class="float-end p-r-25 text-light flex-shrink-0">{{ trans('webtools/tools/hostname-to-ip.error') }}</h5>
        </div>
    @endif

    <button class="btn custom--btn button__lg" wire:loading.class="disabled" wire:loading.attr="disabled">
        <span wire:loading.class="d-none">
            {{ trans('webtools/tools/hostname-to-ip.submit') }}
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