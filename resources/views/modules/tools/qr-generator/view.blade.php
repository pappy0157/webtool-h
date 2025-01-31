@push('alpine-components')
    <script text="text/javascript">
        window.bitflanQRGeneratorComponent = function() {
            return {
                type: 'url',
                src: 'https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=Hello',
                href: 'https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=Hello',
                content: '',
                srv_query: 'Hello',

                vcard: {
                    fname: '',
                    lname: '',
                    mobile: '',
                    phone: '',
                    fax: '',
                    email: '',
                    company: '',
                    job: '',
                    street: '',
                    city: '',
                    state: '',
                    zip: '',
                    country: '',
                    website: ''
                },

                email: {
                    email: '',
                    subject: '',
                    message: ''
                },

                sms: {
                    phone: '',
                    message: ''
                },

                generate() {
                    if(this.type == 'url' || this.type == 'text') {
                        this.srv_query = this.content;
                        this.src = `https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=${this.content}`;
                        this.href = `https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=${this.content}`;
                    } else if(this.type == 'email') {
                        let mstring = `MATMSG:TO:${this.email.email};SUB:${this.email.subject};BODY:${this.email.message};;`;
                        this.src = `https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=${encodeURIComponent(mstring)}`;
                        this.href = `https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=${encodeURIComponent(mstring)}`;
                        this.srv_query = mstring;
                    } else if(this.type == 'sms') {
                        let mstring = `SMSTO:${this.sms.phone}:${this.sms.message}`;
                        this.src = `https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=${encodeURIComponent(mstring)}`;
                        this.href = `https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=${encodeURIComponent(mstring)}`;
                        this.srv_query = mstring;
                    } else if(this.type == 'vcard') {
                        let mstring = 'BEGIN:VCARD\n';
                        mstring += 'VERSION:3.0\n';
                        mstring += `N:${this.vcard.lname},${this.vcard.fname}\nFN:${this.vcard.fname + ' ' + this.vcard.lname}\n`;
                        mstring += `ORG:${this.vcard.company}\n`;
                        mstring += `TITLE:${this.vcard.job}\n`;
                        mstring += `ADR:;;${this.vcard.street},${this.vcard.city},${this.vcard.state},${this.vcard.zip},${this.vcard.country}\n`;
                        mstring += `TEL;WORK;VOICE:${this.vcard.phone}\n`;
                        mstring += `TEL;CELL:${this.vcard.mobile}\n`;
                        mstring += `TEL;FAX:${this.vcard.fax}\n`;
                        mstring += `EMAIL;WORK;INTERNET:${this.vcard.email}\n`;
                        mstring += `URL:${this.vcard.website}\n`;
                        mstring += `END:VCARD`;
                        this.srv_query = mstring;

                        this.src = `https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=${encodeURIComponent(mstring)}`;
                        this.href = `https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=${encodeURIComponent(mstring)}`;
                    }
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanQRGeneratorComponent()" class="qr-sec-main">
    <div class="qr-sec-left">
        <div class="nav qr-tabs" id="nav-tab" role="tablist">
            <a @click="type = 'url'" x-bind:class="type == 'url' && 'active'" href="javascript:void(0)" aria-selected="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="5.686" viewBox="0 0 20 5.686">
                    <path id="Path_32" data-name="Path 32" d="M1.706-4.714A.168.168,0,0,1,1.544-4.8a.472.472,0,0,1-.054-.186L1.119-10.05a.38.38,0,0,1,.066-.241.2.2,0,0,1,.166-.109H2.5a.177.177,0,0,1,.166.087.425.425,0,0,1,.058.175l.131,2.274L3.7-10.138a.739.739,0,0,1,.112-.175A.236.236,0,0,1,4-10.4h.719a.177.177,0,0,1,.166.087.425.425,0,0,1,.058.175l.162,2.274.812-2.274a.54.54,0,0,1,.108-.175.247.247,0,0,1,.193-.087H7.489a.13.13,0,0,1,.135.115.432.432,0,0,1-.012.235L5.726-4.988a.54.54,0,0,1-.1.186.236.236,0,0,1-.189.087H4.4A.16.16,0,0,1,4.238-4.8a.655.655,0,0,1-.058-.186L3.886-7.2,3-4.988a.722.722,0,0,1-.108.186.225.225,0,0,1-.186.087Zm6.741,0A.168.168,0,0,1,8.285-4.8a.472.472,0,0,1-.054-.186L7.86-10.05a.38.38,0,0,1,.066-.241.2.2,0,0,1,.166-.109H9.244a.177.177,0,0,1,.166.087.425.425,0,0,1,.058.175L9.6-7.863l.843-2.274a.739.739,0,0,1,.112-.175.236.236,0,0,1,.189-.087h.719a.177.177,0,0,1,.166.087.425.425,0,0,1,.058.175l.162,2.274.812-2.274a.54.54,0,0,1,.108-.175.247.247,0,0,1,.193-.087H14.23a.13.13,0,0,1,.135.115.432.432,0,0,1-.012.235L12.468-4.988a.54.54,0,0,1-.1.186.236.236,0,0,1-.189.087H11.138A.16.16,0,0,1,10.98-4.8a.655.655,0,0,1-.058-.186L10.628-7.2,9.739-4.988a.722.722,0,0,1-.108.186.225.225,0,0,1-.186.087Zm6.741,0a.168.168,0,0,1-.162-.087.472.472,0,0,1-.054-.186L14.6-10.05a.38.38,0,0,1,.066-.241.2.2,0,0,1,.166-.109h1.152a.177.177,0,0,1,.166.087.425.425,0,0,1,.058.175l.131,2.274.843-2.274a.739.739,0,0,1,.112-.175.236.236,0,0,1,.189-.087H18.2a.177.177,0,0,1,.166.087.425.425,0,0,1,.058.175l.162,2.274.812-2.274a.539.539,0,0,1,.108-.175A.247.247,0,0,1,19.7-10.4h1.268a.13.13,0,0,1,.135.115.432.432,0,0,1-.012.235L19.209-4.988a.54.54,0,0,1-.1.186.236.236,0,0,1-.189.087H17.879a.16.16,0,0,1-.158-.087.655.655,0,0,1-.058-.186L17.369-7.2,16.48-4.988a.722.722,0,0,1-.108.186.225.225,0,0,1-.186.087Z" transform="translate(-1.118 10.4)" fill="#0a1420"/>
                </svg>
                {{ trans('webtools/tools/qr-generator.url') }}
            </a>
            <a @click="type = 'text'" x-bind:class="type == 'text' && 'active'" href="javascript:void(0)" class=" aria-selected="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="14.857" height="13" viewBox="0 0 14.857 13">
                    <path id="text-align-left" d="M19.929,9.357h-13a.929.929,0,1,1,0-1.857h13a.929.929,0,1,1,0,1.857Zm-3.714,3.714H6.929a.929.929,0,1,1,0-1.857h9.286a.929.929,0,1,1,0,1.857Zm3.714,3.714h-13a.929.929,0,0,1,0-1.857h13a.929.929,0,0,1,0,1.857ZM16.214,20.5H6.929a.929.929,0,0,1,0-1.857h9.286a.929.929,0,1,1,0,1.857Z" transform="translate(-6 -7.5)" fill="#0a1420" fill-rule="evenodd"/>
                </svg>
                {{ trans('webtools/tools/qr-generator.text') }}
            </a>
            <a @click="type = 'vcard'" x-bind:class="type == 'vcard' && 'active'" href="javascript:void(0)" aria-selected="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14.999" viewBox="0 0 20 14.999">
                    <path id="address-card-o" d="M10,9.8a1.527,1.527,0,0,1-.361,1.04,1.133,1.133,0,0,1-.889.415h-5a1.134,1.134,0,0,1-.889-.415A1.524,1.524,0,0,1,2.5,9.8a7.022,7.022,0,0,1,.088-1.147,4.578,4.578,0,0,1,.288-1.006,1.722,1.722,0,0,1,.591-.762A1.591,1.591,0,0,1,4.414,6.6q.058.039.293.176t.366.21q.132.073.347.171a2.072,2.072,0,0,0,.42.142,1.937,1.937,0,0,0,.82,0,2.072,2.072,0,0,0,.42-.142q.216-.1.347-.171t.366-.21q.235-.137.293-.176a1.589,1.589,0,0,1,.947.278,1.715,1.715,0,0,1,.591.762,4.648,4.648,0,0,1,.288,1.006A6.868,6.868,0,0,1,10,9.8ZM8.467,4.717a2.136,2.136,0,0,1-.649,1.567,2.136,2.136,0,0,1-1.567.649,2.136,2.136,0,0,1-1.567-.649,2.136,2.136,0,0,1-.649-1.567,2.136,2.136,0,0,1,.649-1.567A2.136,2.136,0,0,1,6.25,2.5a2.136,2.136,0,0,1,1.567.649A2.136,2.136,0,0,1,8.467,4.717ZM17.5,9.062v.625a.3.3,0,0,1-.312.312H11.563a.3.3,0,0,1-.312-.312V9.062a.3.3,0,0,1,.312-.312h5.625a.3.3,0,0,1,.312.312Zm0-2.461v.547a.338.338,0,0,1-.1.249.344.344,0,0,1-.249.1H11.6a.338.338,0,0,1-.249-.1.342.342,0,0,1-.1-.249V6.6a.338.338,0,0,1,.1-.249.342.342,0,0,1,.249-.1h5.547a.338.338,0,0,1,.249.1.342.342,0,0,1,.1.249Zm0-2.539v.625A.3.3,0,0,1,17.188,5H11.563a.3.3,0,0,1-.312-.312V4.062a.3.3,0,0,1,.312-.312h5.625a.3.3,0,0,1,.312.312Zm1.25,9.375V1.563a.317.317,0,0,0-.312-.313H1.563a.317.317,0,0,0-.313.313V13.438a.317.317,0,0,0,.313.313H5v-.938a.3.3,0,0,1,.312-.312h.625a.3.3,0,0,1,.312.312v.938h7.5v-.938a.3.3,0,0,1,.312-.312h.625a.3.3,0,0,1,.312.312v.938h3.438a.317.317,0,0,0,.313-.313ZM20,1.562V13.437A1.567,1.567,0,0,1,18.438,15H1.563a1.5,1.5,0,0,1-1.1-.459A1.506,1.506,0,0,1,0,13.438V1.563A1.5,1.5,0,0,1,.459.459,1.5,1.5,0,0,1,1.563,0H18.438a1.5,1.5,0,0,1,1.1.459A1.5,1.5,0,0,1,20,1.562Z" fill="#0a1420"/>
                </svg>
                {{ trans('webtools/tools/qr-generator.vcard') }}
            </a>
            <a @click="type = 'email'" x-bind:class="type == 'email' && 'active'" href="javascript:void(0)" class="" aria-selected="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="14.195" height="13.619" viewBox="0 0 14.195 13.619">
                    <path id="mailru" d="M6.853,3.558a4.069,4.069,0,0,1,2.853,1.23v0a.59.59,0,0,1,.579-.632h.086A.642.642,0,0,1,11,4.815l0,5.6a.363.363,0,0,0,.608.321c.9-.925,1.977-4.754-.56-6.974A6.073,6.073,0,0,0,3.835,3.2,5.451,5.451,0,0,0,2.01,9.746a5.519,5.519,0,0,0,6.757,2.806c1.046-.423,1.53.991.443,1.453A7.253,7.253,0,0,1,.864,10.937a6.766,6.766,0,0,1,2.46-9.166,7.465,7.465,0,0,1,9.11,1.17c2.431,2.54,2.29,7.3-.082,9.145a1.656,1.656,0,0,1-2.66-1.2l-.011-.4A3.989,3.989,0,0,1,6.852,11.66a4.139,4.139,0,0,1-4.03-4.029,4.163,4.163,0,0,1,4.03-4.073Zm2.7,3.917A2.554,2.554,0,0,0,6.9,4.963H6.845A2.523,2.523,0,0,0,4.32,7.689a2.469,2.469,0,0,0,2.517,2.65A2.642,2.642,0,0,0,9.554,7.793Z" transform="translate(0 -0.731)" fill="#0a1420"/>
                </svg>
                {{ trans('webtools/tools/qr-generator.email') }}
            </a>
            <a @click="type = 'sms'" x-bind:class="type == 'sms' && 'active'" href="javascript:void(0)" class="" aria-selected="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="15.194" height="14.109" viewBox="0 0 15.194 14.109">
                    <path id="Path_41" data-name="Path 41" d="M-10216.152-402.378l2.17-3.8h3.257a1.084,1.084,0,0,0,1.085-1.085v-6.512a1.086,1.086,0,0,0-1.085-1.085h-10.854a1.086,1.086,0,0,0-1.086,1.085v6.512a1.084,1.084,0,0,0,1.086,1.085h4.885v1.085h-4.885a2.17,2.17,0,0,1-2.171-2.171v-6.512a2.172,2.172,0,0,1,2.171-2.171h10.854a2.17,2.17,0,0,1,2.17,2.171v6.512a2.168,2.168,0,0,1-2.17,2.171h-2.625l-1.858,3.256Zm-4.342-5.971v-1.085h5.427v1.085Zm0-3.256v-1.085h8.683v1.085Z" transform="translate(10223.75 415.946)" fill="#0a1420"/>
                </svg>
                {{ trans('webtools/tools/qr-generator.sms') }}
            </a>
        </div>
        <hr class="">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade" x-bind:class="(type == 'url' || type == 'text') && 'show active'">
                <div class="form-group">
                    <label for="" class="custom-label" x-text="type == 'url' ? '{{ trans('webtools/tools/qr-generator.url-here-label') }}' : '{{ trans('webtools/tools/qr-generator.content-here-label') }}'">{{ trans('webtools/tools/qr-generator.content-here-label') }}</label>
                    <textarea x-model="content" type="email" class="rounded custom-textarea" rows="5"></textarea>
                </div>
                <button class="btn custom--btn button__lg" @click="generate()">{{ trans('webtools/tools/qr-generator.submit') }}</button>

            </div>
            <div class="tab-pane fade" x-bind:class="(type == 'vcard') && 'show active'">
                <div class="form-group">
                    <label for="" class="custom-label">{{ trans('webtools/tools/qr-generator.vcard-label') }}</label>
                </div>
                <form x-on:submit="$event.preventDefault(); generate();">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input x-model="vcard.fname" type="text" required class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-firstname') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input x-model="vcard.lname" type="text" required class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-lastname') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input x-model="vcard.mobile" type="text" required class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-mobile') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input x-model="vcard.phone" type="text" required class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-phone') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input x-model="vcard.fax" type="text" required required class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-fax') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input x-model="vcard.email" type="email" required class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-email') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input x-model="vcard.company" required type="text" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-company') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input x-model="vcard.job" required type="text" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-job') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input x-model="vcard.street" required type="text" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-street') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input x-model="vcard.city" required type="text" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-city') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input x-model="vcard.zip" required type="text" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-zip') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input x-model="vcard.state" required type="text" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-state') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input x-model="vcard.country" required type="text" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-country') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input x-model="vcard.website" required type="text" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.vcard-website') }}">
                            </div>
                        </div>
                    </div>
                    <button class="btn custom--btn button__lg">{{ trans('webtools/tools/qr-generator.submit') }}</button>
                </form>
            </div>

            <div class="tab-pane fade" x-bind:class="(type == 'email') && 'show active'">
                <div class="form-group">
                    <label for="" class="custom-label">{{ trans('webtools/tools/qr-generator.email-label') }}</label>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input x-model="email.email" type="text" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.email-email') }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input x-model="email.subject" type="text" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.email-subject') }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea x-model="email.message" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.email-message') }}" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn custom--btn button__lg" @click="generate()">{{ trans('webtools/tools/qr-generator.submit') }}</button>
            </div>
            <div class="tab-pane fade" x-bind:class="(type == 'sms') && 'show active'">
                <div class="form-group">
                    <label for="" class="custom-label">{{ trans('webtools/tools/qr-generator.sms-label') }}</label>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input x-model="sms.phone" type="text" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.sms-number') }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea x-model="sms.message" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/qr-generator.sms-message') }}" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn custom--btn button__lg" @click="generate()">{{ trans('webtools/tools/qr-generator.submit') }}</button>
            </div>
        </div>
    </div>
    <div class="qr-sec-right">
        <div class="qr-code-title-sec">
            <div class="qr-code-title">{{ trans('webtools/tools/qr-generator.result-label') }}</div>
        </div>
        <div class="qr-image"><img x-bind:src="src" src="https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=Hello" alt=""></div>
        <div class="text-center mt-3">
            <a :href="`{{ url('download-qr') }}/${srv_query}`" class="btn custom--btn button__lg">{{ trans('webtools/tools/qr-generator.download') }}</a>
        </div>
    </div>
</div>
