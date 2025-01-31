@push('alpine-components')
    <script>
        window.bitflanHtmlEntityEncodeComponent = function() {
            return {
                editor: null,

                init() {
                    this.editor = ace.edit(this.$refs.editor_input);
                    this.editor.setOption("showPrintMargin", false);
                    this.editor.setTheme("ace/theme/clouds");
                    this.editor.setTheme("ace/theme/html");
                },

                convert() {
                    const val = this.editor.getValue();

                    this.editor.setValue(val.replace(/[\u00A0-\u9999<>\&]/g, (i) => {
                        return "&#" + i.charCodeAt(0) + ";";
                    }));
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanHtmlEntityEncodeComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/html-entity-encode.label') }}</label>
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
    <button x-on:click="convert()" class="btn custom--btn button__lg">{{ trans('webtools/tools/html-entity-encode.submit') }}</button>
</div>