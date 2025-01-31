@push('alpine-components')
    <script>
        window.bitflanToolHexToRgbComponent = function() {
            return {
                color: null,
                hex: '',
                error: false,

                convert() {
                    this.error = false;
                    try {
                        if(!this.hex.startsWith('#'))
                            this.hex = '#' + this.hex;

                        if(this.hex.length == 4) {
                            this.hex += this.hex.substr(this.hex.length - 3);
                        }

                        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(this.hex);
                        this.color = result ? {
                            r: parseInt(result[1], 16),
                            g: parseInt(result[2], 16),
                            b: parseInt(result[3], 16)
                        } : null;

                        if(this.color == null)
                            this.error = true;
                    } catch(error) {
                        this.error = true;
                    }
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanToolHexToRgbComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/hex-to-rgb.label') }}</label>
        <input x-model="hex" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/hex-to-rgb.placeholder') }}">
    </div>
    
    <template x-if="error">
        <div class="border-0 alert alert-danger rounded-pill bg-danger">
            <h5 class="m-0 d-inline-block text-light p-l-25 flex-grow-1 me-3 text-break">{{ trans('webtools/tools/hex-to-rgb.error') }}</h5>
        </div>
    </template>

    <button @click="convert()" class="btn custom--btn button__lg">{{ trans('webtools/tools/hex-to-rgb.submit') }}</button>

    <template x-if="color">
        <div class="mt-3">
            <div class="mt-3 row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="custom-label">{{ trans('webtools/tools/hex-to-rgb.red') }}</label>
                        <input :value="color.r" type="text" class="custom-input" placeholder="R">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="custom-label">{{ trans('webtools/tools/hex-to-rgb.green') }}</label>
                        <input  :value="color.g" type="text" class="custom-input" placeholder="G">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="custom-label">{{ trans('webtools/tools/hex-to-rgb.blue') }}</label>
                        <input :value="color.b" type="text" class="custom-input" placeholder="B">
                    </div>
                </div>
            </div>
            
            <button @click="window.writeClipboardText($event, `rgb(${color.r},${color.g},${color.b})`)" class="btn custom--btn button__lg">{{ trans('webtools/general.copy') }}</button>
        </div>
    </template>
</div>