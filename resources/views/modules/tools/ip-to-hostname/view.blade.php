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

<form x-data="window.bitflanComponentIpToHostname()" x-on:submit.prevent="getHostname()">
    <div class="form-group">
        <label for="domain" class="custom-label">{{ trans('webtools/tools/ip-to-hostname.label') }}</label>
        <input x-model="ip" type="text" id="domain" class="custom-input" placeholder="{{ trans('webtools/tools/ip-to-hostname.placeholder') }}">
    </div>


    <template x-if="status == 'success'">
        <div class="border-0 alert alert-success rounded bg-success d-flex align-items-center">
            <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break" x-text="hostname"></h5>
            <h5 class="float-end p-r-25 text-light flex-shrink-0"><a class="text-white text-underline" href="#" x-on:click="window.writeClipboardText($event, hostname)">{{ trans('webtools/general.copy') }}</a></h5>
        </div>
    </template>

    <template x-if="status == 'error'">
        <div class="border-0 alert alert-danger rounded-pill bg-danger">
            <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/ip-to-hostname.error-text') }}</h5>
            <h5 class="float-end p-r-25 text-light flex-shrink-0">{{ trans('webtools/tools/ip-to-hostname.error') }}</h5>
        </div>
    </template>

    <button class="btn custom--btn button__lg" wire:loading.class="disabled" wire:loading.attr="disabled">
        <span :class="loading && 'd-none'">
            {{ trans('webtools/tools/ip-to-hostname.submit') }}
        </span>

        <template x-if="loading">
            <span>
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
        </template>
    </button>
</form>