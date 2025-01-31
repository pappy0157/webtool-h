@push('alpine-components')
    <script type="text/javascript">
        window.bitflanPasswordGeneratorComponent = function() {
            return {
                length: 16,
                amount: 10,

                incSymbols: true,
                incNumbers: true,
                incLowercase: true,
                incUppercase: true,
                incAmbiguous: true,
                lessMount: false,
                maxMount: false,

                generate() {

                    if(this.amount < 1){
                        this.lessMount = true;
                        this.maxMount = false;
                    }
                    else if(this.amount > 1000){
                        this.lessMount = false;
                        this.maxMount = true;
                    }
                    else{
                        this.lessMount = false;
                        this.maxMount = false;

                        let items = [];
                        let list = '';

                        if(this.incSymbols)
                            list += '@#$%';

                        if(this.incNumbers)
                            list += '0123456789';

                        if(this.incLowercase)
                            list += 'abcdefghijklmnopqrstuvwxyz';

                        if(this.incUppercase)
                            list += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                        if(this.excAmbiguous)
                            list += '(){}[]/\\\'"`~,;:.<>';

                        for(let x = 0; x < this.amount; x++){

                            let password = '';

                            for(let i = 0; i < this.length; i++) {
                                password += list[Math.floor(Math.random() * ((list.length - 1) - 0 + 1) + 0)];
                            }

                            items.push(password);
                        }

                        this.$refs.password.value = items.join('\n');
                    }
                }
            };
        }
    </script>
@endpush

<div x-data="window.bitflanPasswordGeneratorComponent()">
    <div class="form-group">
        <label for="" class="custom-label">{{ trans('webtools/tools/password-generator.length') }}</label>
        <input type="number" class="custom-input" value="16" x-model="length" placeholder="e.g 12" max="100" min="1">
    </div>
    <div class="form-group">
        <label for="" class="custom-label">{{ trans('webtools/tools/password-generator.number-of-pass') }}</label>
        <input type="number" class="custom-input" value="10" x-model="amount" placeholder="e.g 10" max="100" min="1">
    </div>
    <template x-if="lessMount">
        <div class="form-group">
            <div class="border-0 alert alert-danger rounded bg-danger d-flex align-items-center">
                <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/password-generator.lesthan') }}</h5>
            </div>
        </div>
    </template>
    <template x-if="maxMount">
        <div class="form-group">
            <div class="border-0 alert alert-danger rounded bg-danger d-flex align-items-center">
                <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/password-generator.maxMount') }}</h5>
            </div>
        </div>
    </template>
    <hr class="small-marg">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="" class="custom-label">{{ trans('webtools/tools/password-generator.symbols') }}</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" x-model="incSymbols" checked role="switch" id="switch-1">
                    <label class="form-check-label" for="switch-1">( e.g. @#$% )</label>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="" class="custom-label">{{ trans('webtools/tools/password-generator.numbers') }}</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" x-model="incNumbers" checked role="switch" id="switch-2">
                    <label class="form-check-label" for="switch-2">( e.g. 123456 )</label>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="" class="custom-label">{{ trans('webtools/tools/password-generator.lowercase') }}</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" x-model="incLowercase" checked role="switch" id="switch-3">
                    <label class="form-check-label" for="switch-3">( e.g. abcdefgh )</label>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="" class="custom-label">{{ trans('webtools/tools/password-generator.uppercase') }}</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" x-model="incUppercase" checked role="switch" id="switch-4">
                    <label class="form-check-label" for="switch-4">( e.g. ABCDEFGH )</label>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="form-group">
                <label for="" class="custom-label">{{ trans('webtools/tools/password-generator.ambiguous') }}</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" x-model="incAmbiguous" checked role="switch" id="switch-6">
                    <label class="form-check-label" for="switch-6">( { } [ ] ( ) / \ ' " ` ~ , ; : . < > )</label>
                </div>
            </div>
        </div>
    </div>
    <button class="mb-5 btn custom--btn button__lg" @click="generate()">{{ trans('webtools/tools/password-generator.submit') }}</button>
    <div class="mb-5 form-group">
        <label for="" class="custom-label">{{ trans('webtools/tools/password-generator.result-label') }}</label>
        <div class="copy-textarea-btn">
            <textarea x-ref="password" type="text" class="custom-textarea" rows="5" value="{{ trans('webtools/tools/password-generator.result-placeholder') }}"></textarea>
            <button class="btn custom--btn button__md copy-btn btn__dark" @click="window.writeClipboardText($event, $refs.password.value)">{{ trans('webtools/general.copy') }}</button>
        </div>
    </div>
</div>
