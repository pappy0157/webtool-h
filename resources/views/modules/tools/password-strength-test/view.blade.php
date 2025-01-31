@push('alpine-components')
    <script>
        window.bitflancomponentPasswordStrength = function() {
            return {
                password: '',
                format: /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/,
                percentage: 0,
                className: '',

                init() {
                    this.$watch('password', () => this.onUpdate())
                },

                onUpdate() {
                    this.percentage = 0;

                    if(this.password.length >= 8)
                        this.percentage += 10;

                    if(this.password.length >= 10)
                        this.percentage += 10;

                    if(this.password.length >= 12)
                        this.percentage += 20;

                    if(this.password.length >= 14)
                        this.percentage += 20;

                    if(/\d/.test(this.password))
                        this.percentage += 20;

                    if(this.format.test(this.password))
                        this.percentage += 20;

                    if(this.percentage <= 50)
                        this.className = 'bg-danger';
                    else if(this.percentage <= 80)
                        this.className = 'bg-warning';
                    else
                        this.className = 'bg-success';
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflancomponentPasswordStrength()">
    <div class="form-group">
        <label for="domain" class="custom-label">{{ trans('webtools/tools/password-strength-test.label') }}</label>
        <div class="copy-input">
            <input x-model="password" x-ref="passInput" type="password" class="custom-input" placeholder="{{ trans('webtools/tools/password-strength-test.placeholder') }}">
            <button class="btn custom--btn button__md copy-btn btn__dark" x-on:click="$refs.passInput.type = $refs.passInput.type == 'password' ? 'text' : 'password' " x-text="$refs.passInput.type == 'password' ? 'Show' : 'Hide'">Show</button>
        </div>
    </div>

    <template x-if="password">
        <div>
            <ul style="list-style: none;">
                <li class="m-0" :class="password.length >= 10 ? 'text-success' : 'text-danger'"><i  :class="password.length >= 10 ? 'fa-check' : 'fa-times'" class="fas"></i> {{ trans('webtools/tools/password-strength-test.min10chars') }}</li>
                <li class="m-0" :class="/\d/.test(password) ? 'text-success' : 'text-danger'"><i :class="/\d/.test(password) ? 'fa-check' : 'fa-times'" class="fas"></i> {{ trans('webtools/tools/password-strength-test.min1num') }}</li>
                <li class="m-0" :class="format.test(password) ? 'text-success' : 'text-danger'"><i :class="format.test(password) ? 'fa-check' : 'fa-times'" class="fas"></i>  {{ trans('webtools/tools/password-strength-test.min1s') }}</li>
            </ul>
            
            <div class="progress">
                <div :style="`width: ${percentage}%;`" :class="`progress-bar ${className}`" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </template>
</div>