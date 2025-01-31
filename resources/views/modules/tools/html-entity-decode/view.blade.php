@push('alpine-components')
    <script>
        window.bitflanHtmlEntityDecodeComponent = function() {
            return {
                editor: null,
                element: null,

                init() {
                    this.editor = ace.edit(this.$refs.editor_input);
                    this.editor.session.setOption("showPrintMargin", false);
                    this.editor.setTheme("ace/theme/clouds");
                    this.editor.setTheme("ace/theme/html");
                    this.element = document.createElement('div');
                },

                decode(str) {
                    if(str && typeof str === 'string') {
                        // strip script/html tags
                        str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
                        str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
                        this.element.innerHTML = str;
                        str = this.element.textContent;
                        this.element.textContent = '';
                    }

                    return str;
                },

                convert() {
                    const val = this.editor.getValue();

                    this.editor.setValue(this.decode(val));
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanHtmlEntityDecodeComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/html-entity-decode.label') }}</label>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <div class="form-group position-relative">
                    <button @click="window.writeClipboardText($event, editor.getValue())" class="btn custom--btn button__md ace-copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
                    <div x-ref="editor_input" id="editor"></div>
                </div>
            </div>
        </div>
    </div>
    <button x-on:click="convert()" class="btn custom--btn button__lg">{{ trans('webtools/tools/html-entity-decode.submit') }}</button>
</div>