<div x-data="window.bitflanDnsLookup()">
    <form x-on:submit="$event.preventDefault(); submit()">
        <div class="form-group">
            <label for="domain" class="custom-label">{{ trans('webtools/tools/dns-lookup.label') }}</label>
            <input x-model="domain" type="text" id="domain" class="custom-input"
            placeholder="{{ trans('webtools/tools/dns-lookup.placeholder') }}" >
        </div>
        <template x-if="error">
            <div class="form-group">
                <div class="border-0 alert alert-danger rounded bg-danger d-flex align-items-center">
                    <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/dns-lookup.empty_alert_text') }}</h5>
                </div>
            </div>
        </template>
        <template x-if="unknownDomain">
            <div class="form-group">
                <div class="border-0 alert alert-danger rounded bg-danger d-flex align-items-center">
                    <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/dns-lookup.unknownDomain_text') }}</h5>
                </div>
            </div>
        </template>
        <button class="btn custom--btn button__lg" :class="loading && 'disabled'">
            <span :class="loading && 'd-none'">
                {{ trans('webtools/tools/dns-lookup.submit') }}
            </span>
            <span style="display: none;" :class="loading && 'd-block'">
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


    <template x-if="data">
        <div>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('webtools/tools/dns-lookup.dns_records') }}</th>
                            <th>{{ trans('webtools/tools/dns-lookup.dns_ttl') }}</th>
                            <th>{{ trans('webtools/tools/dns-lookup.dns_class') }}</th>
                            <th>{{ trans('webtools/tools/dns-lookup.dns_entries_for') }} <span x-init="$el.textContent = domain"></span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-if="data.a.data">
                            <tr>
                                <td class="align-middle">
                                    <h4><span class="badge bg-primary">{{ trans('webtools/tools/dns-lookup.dns_a') }}</span></h4>
                                </td>
                                <td class="align-middle" x-text="data.a.ttl"></td>
                                <td class="align-middle" x-text="data.a.class"></td>
                                <td>
                                    <template x-for="row in data.a.data">
                                        <h5 class="text-dark" x-text="row.ip"></h5>
                                    </template>
                                </td>
                            </tr>
                        </template>
                        <template x-if="data.aaaa.data">
                            <tr>
                                <td class="align-middle">
                                    <h4><span class="badge bg-info">{{ trans('webtools/tools/dns-lookup.dns_aaaa') }}</span></h4>
                                </td>
                                <td class="align-middle" x-text="data.aaaa.ttl"></td>
                                <td class="align-middle" x-text="data.aaaa.class"></td>
                                <td>
                                    <template x-for="row in data.aaaa.data">
                                        <h5 class="text-dark" x-text="row.ipv6"></h5>
                                    </template>
                                </td>
                            </tr>
                        </template>
                        <template x-if="data.ns.data">
                            <tr>
                                <td class="align-middle">
                                    <h4><span class="badge bg-success">{{ trans('webtools/tools/dns-lookup.dns_ns') }}</span></h4>
                                </td>
                                <td class="align-middle" x-text="data.ns.ttl"></td>
                                <td class="align-middle" x-text="data.ns.class"></td>
                                <td>
                                    <template x-for="row in data.ns.data">
                                        <h5 class="text-dark" x-text="row.target"></h5>
                                    </template>
                                </td>
                            </tr>
                        </template>
                        <template x-if="data.mx.data">
                            <tr>
                                <td class="align-middle">
                                    <h4><span class="badge bg-danger">{{ trans('webtools/tools/dns-lookup.dns_mx') }}</span></h4>
                                </td>
                                <td class="align-middle" x-text="data.mx.ttl"></td>
                                <td class="align-middle" x-text="data.mx.class"></td>
                                <td>
                                    <template x-for="row in data.mx.data">
                                        <h5 class="text-dark" x-text="row.target"></h5>
                                    </template>
                                </td>
                            </tr>
                        </template>
                        <template x-if="data.soa.data">
                            <tr>
                                <td class="align-middle">
                                    <h4><span class="badge bg-warning">{{ trans('webtools/tools/dns-lookup.dns_soa') }}</span></h4>
                                </td>
                                <td class="align-middle" x-text="data.soa.ttl"></td>
                                <td class="align-middle" x-text="data.soa.class"></td>
                                <td>
                                    <h5 class="text-dark">{{ trans('webtools/tools/dns-lookup.dns_email') }}: <span x-text="data.soa.data.email"></span></h5>
                                    <h5 class="text-dark">{{ trans('webtools/tools/dns-lookup.dns_serial') }}: <span x-text="data.soa.data.serial"></span></h5>
                                    <h5 class="text-dark">{{ trans('webtools/tools/dns-lookup.dns_refresh') }}: <span x-text="data.soa.data.refresh"></span></h5>
                                    <h5 class="text-dark">{{ trans('webtools/tools/dns-lookup.dns_retry') }}: <span x-text="data.soa.data.retry"></span></h5>
                                    <h5 class="text-dark">{{ trans('webtools/tools/dns-lookup.dns_expire') }}: <span x-text="data.soa.data.expire"></span></h5>
                                    <h5 class="text-dark">{{ trans('webtools/tools/dns-lookup.dns_minimum_ttl') }}: <span x-text="data.soa.data.minimum_ttl"></span>
                                    </h5>
                                </td>
                            </tr>
                        </template>
                        <template x-if="data.txt.data">
                            <tr>
                                <td class="align-middle">
                                    <h4><span class="badge bg-secondary">{{ trans('webtools/tools/dns-lookup.dns_txt') }}</span></h4>
                                </td>
                                <td class="align-middle" x-text="data.txt.ttl"></td>
                                <td class="align-middle" x-text="data.txt.class"></td>
                                <td>
                                    <template x-for="row in data.txt.data">
                                        <h5 class="text-dark" x-text="row.txt"></h5>
                                    </template>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </template>

</div>

@push('alpine-components')
    <script type="text/javascript">
        window.bitflanDnsLookup = function() {
            return {
                domain: '',
                message: {},
                data: null,
                loading: false,
                error: false,
                unknownDomain: false,

                init(){
                    this.$watch('domain', (value) => {
                        if(value !== '') {
                            this.unknownDomain = false;
                            this.error = false;
                        }
                    });
                },

                async submit() {
                    if(!this.loading){
                        this.data = null;
                        this.message = {};
                        const domain = this.domain;
                        if (this.domain == '') {
                            this.error = true;
                            this.loading = false;
                        }
                        else{

                            this.loading = true;
                            const response = await fetch(`{{ url('dnsLookup') }}?url=${domain}`);
                            if(response.status == 200) {
                                this.message = await response.json();

                                if (this.message.type == 'success') {
                                    this.data = this.message.message;
                                }
                            } else {
                                this.unknownDomain = true;
                            }

                            this.loading = false;
                        }
                    }
                }
            }
        }
    </script>
@endpush
