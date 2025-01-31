@push('alpine-components')
    <script type="text/javascript">
        window.bitflanComponentIpInfo = function() {
            return {
                loading: false,
                status: null,
                ip: '',
                data: null,

                getHostname() {
                    const url = `https://ipwho.is/${this.ip}`;

                    this.loading = true;
                    this.status = null;
                    this.data   = null;

                    fetch(url).then(response => response.json()).then(data => {
                        this.loading = false;

                        if(data.success) {
                            this.status = 'success';
                            this.data = data;
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

<form x-data="window.bitflanComponentIpInfo()" x-on:submit.prevent="getHostname()">
    <div class="form-group">
        <label for="domain" class="custom-label">{{ trans('webtools/tools/ip-information.label') }}</label>
        <input x-model="ip" type="text" id="domain" class="custom-input" placeholder="{{ trans('webtools/tools/ip-information.placeholder') }}">
    </div>

    <template x-if="status == 'error'">
        <div class="border-0 alert alert-danger rounded-pill bg-danger">
            <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/ip-information.error-text') }}</h5>
            <h5 class="float-end p-r-25 text-light flex-shrink-0">{{ trans('webtools/tools/ip-information.error') }}</h5>
        </div>
    </template>

    <button class="btn custom--btn button__lg" wire:loading.class="disabled" wire:loading.attr="disabled">
        <span :class="loading && 'd-none'">
            {{ trans('webtools/tools/ip-information.submit') }}
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

    <template x-if="data">
        <div class="mt-3">
            <div class="d-flex justify-content-between align-items-center bg-light py-2 px-3 rounded mb-1">
                <span>{{ trans('webtools/tools/ip-information.country') }}</span>
                <span x-text="data.country"></span>
            </div>
            <div class="d-flex justify-content-between align-items-center bg-light py-2 px-3 rounded mb-1">
                <span>{{ trans('webtools/tools/ip-information.region') }}</span>
                <span x-text="data.region"></span>
            </div>
            <div class="d-flex justify-content-between align-items-center bg-light py-2 px-3 rounded mb-1">
                <span>{{ trans('webtools/tools/ip-information.city') }}</span>
                <span x-text="data.city"></span>
            </div>
            <div class="d-flex justify-content-between align-items-center bg-light py-2 px-3 rounded mb-1">
                <span>{{ trans('webtools/tools/ip-information.isp') }}</span>
                <span x-text="data.connection.isp"></span>
            </div>
            <div class="d-flex justify-content-between align-items-center bg-light py-2 px-3 rounded mb-1">
                <span>{{ trans('webtools/tools/ip-information.latitude') }}</span>
                <span x-text="data.latitude"></span>
            </div>
            <div class="d-flex justify-content-between align-items-center bg-light py-2 px-3 rounded mb-1">
                <span>{{ trans('webtools/tools/ip-information.longitude') }}</span>
                <span x-text="data.longitude"></span>
            </div>
        </div>
    </template>
</form>