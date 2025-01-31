@push('alpine-components')
    <script>
        window.bitflanHtaccessComponent = function() {
            return {
                from: '',
                to: '',
                htaccess: '',

                init() {
                    this.editor = ace.edit(this.$refs.editor);
                    this.editor.setOption("showPrintMargin", false);
                },

                submit() {
                    this.htaccess = `<IfModule mod_rewrite.c>
RewriteEngine On
Redirect 301 ${this.from} ${this.to}
</IfModule>`;

                    this.editor.session.setValue(this.htaccess.trim());
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanHtaccessComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/htaccess-redirect-generator.from') }}</label>
        <input x-model="from" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/htaccess-redirect-generator.from_holder') }}" / >
    </div>

    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/htaccess-redirect-generator.to') }}</label>
        <input x-model="to" type="text" class="custom-input" placeholder="{{ trans('webtools/tools/htaccess-redirect-generator.to_holder') }}" / >
    </div>

    <button x-on:click="submit()" class="btn custom--btn button__lg">{{ trans('webtools/tools/htaccess-redirect-generator.submit') }}</button>

    <div class="row mt-3" x-cloak x-show="htaccess">
        <div class="col-12">
            <div class="form-group">
                <div class="form-group position-relative">
                    <button @click="window.writeClipboardText($event, editor.getValue())" class="btn custom--btn button__md ace-copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
                    <div x-ref="editor" id="editor"></div>
                </div>
            </div>
        </div>
    </div>
</div>