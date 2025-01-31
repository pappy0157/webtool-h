@push('alpine-components')
    <script>
        window.bitflanRandomComponent = function() {
            return {
                min: 0,
                max: 10,
                converted: false,
            
                rand(min, max) {
                    min = Math.ceil(min);
                    max = Math.floor(max);
                    return Math.round(Math.random() * (max - min) + min); // The maximum is 
                },

                generate() {
                    this.$refs.textarea.value = this.rand(this.min, this.max);;
                    this.converted = true;
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanRandomComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/random-number-generator.min') }}</label>
        <input type="number" value="0" x-model="min" class="custom-input" />
    </div>
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/random-number-generator.max') }}</label>
        <input type="number" value="10" x-model="max" class="custom-input" />
    </div>
    <div class="form-group">
        <button @click="generate()" class="btn custom--btn button__lg">{{ trans('webtools/tools/random-number-generator.submit') }}</button>
    </div>

    <div class="form-group" x-cloak x-show="converted">
        <textarea rows="4" id="textarea" class="custom-textarea rounded" rows="10" x-ref="textarea"></textarea>
        <button onclick="window.writeClipboardTextVanilla(this, document.getElementById('textarea').value)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
    </div>
</div>