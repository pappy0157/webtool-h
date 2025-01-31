@push('alpine-components')
    <script>
        window.bitflanSlug = function() {
            return {
                content: '',
                converted: false,
            
                generate() {
                    this.$refs.textarea.value = this.content.replace(/ +(?= )/g, '').toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                    this.converted = true;
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanSlug()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/text-to-slug.label') }}</label>
        <input type="text" x-model="content" class="custom-input" placeholder="{{ trans('webtools/tools/text-to-slug.placeholder') }}" />
    </div>
    <div class="form-group">
        <button @click="generate()" class="btn custom--btn button__lg">{{ trans('webtools/tools/text-to-slug.submit') }}</button>
    </div>

    <div class="form-group" x-cloak x-show="converted">
        <textarea rows="4" id="textarea" class="custom-textarea rounded" rows="10" x-ref="textarea"></textarea>
        <button onclick="window.writeClipboardTextVanilla(this, document.getElementById('textarea').value)" class="btn custom--btn button__md copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
    </div>
</div>