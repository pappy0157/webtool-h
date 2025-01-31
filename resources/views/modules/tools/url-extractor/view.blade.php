@push('alpine-components')
    <script>
        window.bitflanURLExtractorComponent = function() {
            return {
                editor: null,

                init() {
                    this.editor = ace.edit(this.$refs.editor_input);
                    this.editor.setOption("showPrintMargin", false);
                    this.editor.setTheme("ace/theme/clouds");
                },

                extractURLs(text) {
                    return text.match(/[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi);
                },

                convert() {
                    const val = this.editor.getValue();

                    this.editor.setValue(this.extractURLs(val).join('\n'));
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanURLExtractorComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/url-extractor.label') }}</label>
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
    <button x-on:click="convert()" class="btn custom--btn button__lg">{{ trans('webtools/tools/url-extractor.submit') }}</button>
</div>