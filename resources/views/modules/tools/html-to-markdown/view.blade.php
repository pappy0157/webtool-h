@push('alpine-components')
    <script>
        window.bitflanHtmlToMarkdownComponent = function() {
            return {
                editor: null,
                output: null,
                md: '',

                init() {
                    this.editor = ace.edit(this.$refs.editor_input);
                    this.editor.setOption("showPrintMargin", false);

                    this.editor.setTheme("ace/theme/clouds");
                    this.editor.session.setMode("ace/mode/html");

                    
                    this.output = ace.edit(this.$refs.editor_output);

                    this.output.setOption("showPrintMargin", false);
                    this.output.setTheme("ace/theme/clouds");
                },

                convert() {
                    const converter = new showdown.Converter();

                    try {
                        this.md = converter.makeMarkdown(this.editor.getValue());

                        this.output.setValue(
                            this.md.trim()
                        );
                    } catch(e) {
                        console.error(e);

                        alert('Invalid HTML provided.');
                    }
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanHtmlToMarkdownComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/html-to-markdown.label') }}</label>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <div class="form-group position-relative">
                    <div x-ref="editor_input" id="editor"></div>
                </div>
            </div>
        </div>
    </div>
    <button x-on:click="convert()" class="btn custom--btn button__lg">{{ trans('webtools/tools/html-to-markdown.submit') }}</button>

    <div x-show="md" x-cloak class="row mt-3">
        <div class="col-12">
            <div class="form-group">
                <div class="form-group position-relative">
                    <button @click="window.writeClipboardText($event, output.getValue())" class="btn custom--btn button__md ace-copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
                    <div x-ref="editor_output" class="editor"></div>
                </div>
            </div>
        </div>
    </div>
</div>