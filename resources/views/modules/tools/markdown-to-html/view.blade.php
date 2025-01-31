@push('alpine-components')
    <script>
        window.bitflanMarkdownToHtmlComponent = function() {
            return {
                editor: null,
                output: null,
                html: '',

                init() {
                    this.editor = ace.edit(this.$refs.editor_input);
                    this.editor.setOption("showPrintMargin", false);

                    this.editor.setTheme("ace/theme/clouds");

                    
                    this.output = ace.edit(this.$refs.editor_output);
                    this.output.setOption("showPrintMargin", false);

                    this.output.setTheme("ace/theme/clouds");
                    this.output.session.setMode("ace/mode/html");
                },

                convert() {
                    const converter = new showdown.Converter();

                    try {
                        this.html = converter.makeHtml(this.editor.getValue());

                        this.output.setValue(
                            html_beautify(
                                this.html
                            )
                        );
                    } catch(e) {
                        console.error(e);

                        alert('Invalid Markdown provided.');
                    }
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanMarkdownToHtmlComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/markdown-to-html.label') }}</label>
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
    <button x-on:click="convert()" class="btn custom--btn button__lg">{{ trans('webtools/tools/markdown-to-html.submit') }}</button>

    <div x-show="html" x-cloak class="row mt-3">
        <div class="col-12">
            <div class="form-group">
                <div class="form-group position-relative">
                    <button @click="window.writeClipboardText($event, output.getValue())" class="btn custom--btn button__md ace-copy-btn btn__dark">Copy</button>
                    <div x-ref="editor_output" class="editor"></div>
                </div>
            </div>
        </div>
    </div>
</div>