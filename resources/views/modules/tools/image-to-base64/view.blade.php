<div x-data="window.bitflanToolBase64Component()">
    <div class="form-group">
        <label for="" class="custom-label">{{ trans('webtools/tools/image-to-base64.label') }}</label>
        <input x-ref="fileInput" type="file" class="form-control">
    </div>
    <button @click="convert()" class="btn custom--btn button__lg">{{ trans('webtools/tools/image-to-base64.submit') }}</button>
    <hr class="">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="" class="custom-label">{{ trans('webtools/tools/image-to-base64.b64-string') }}</label>
                <div class="copy-textarea-btn">
                    <textarea :value="ib64" type="email" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/image-to-base64.b64-string-placeholder') }}" rows="5"></textarea>
                    <button @click="window.writeClipboardText($event, ib64)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="custom-label">{{ trans('webtools/tools/image-to-base64.b64-durl') }}</label>
                <div class="copy-textarea-btn">
                    <textarea :value="durl" type="email" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/image-to-base64.b64-durl-placeholder') }}" rows="5"></textarea>
                    <button @click="window.writeClipboardText($event, durl)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('alpine-components')
<script type="text/javascript">
    window.bitflanToolBase64Component = function() {
        return {
            ib64: '',
            durl: '',

            convert() {
                const files = this.$refs.fileInput.files;

                if(files[0]) {
                    const reader = new FileReader();
                    reader.readAsDataURL(files[0]);
                    reader.onload = () => {
                        this.durl = reader.result.toString();

                        let encoded = reader.result.toString().replace(/^data:(.*,)?/, '');
                        if ((encoded.length % 4) > 0) {
                            encoded += '='.repeat(4 - (encoded.length % 4));
                        }

                        this.ib64 = encoded;
                    }
                    
                    reader.onerror = error => reject(error);
                }
            }
        }
    };
</script>
@endpush