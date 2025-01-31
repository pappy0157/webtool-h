@push('alpine-components')
    <script>
        window.bitflanTextSeparatorComponent = function() {
            return {
                editor: null,
                char: '.',

                init() {
                    this.editor = ace.edit(this.$refs.editor_input);
                    this.editor.setOption("showPrintMargin", false);
                    this.editor.setTheme("ace/theme/clouds");
                },

                convert() {;
                    this.editor.setValue(this.editor.getValue().split(this.char).join("\n"));
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanTextSeparatorComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/text-separator.label') }}</label>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="custom-label">{{ trans('webtools/tools/text-separator.char-label') }}</label>
                <div class="copy-textarea-btn">
                    <input type="text" value="." x-model="char" class="custom-input" placeholder="{{ trans('webtools/tools/text-separator.char-placeholder') }}" />
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="form-group position-relative">
                    <button @click="window.writeClipboardText($event, editor.getValue())" class="btn custom--btn button__md ace-copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
                    <div x-ref="editor_input" id="editor"></div>
                </div>
            </div>
        </div>
    </div>
    <button x-on:click="convert()" class="btn custom--btn button__lg">{{ trans('webtools/tools/text-separator.submit') }}</button>
</div>