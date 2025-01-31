@push('alpine-components')
    <script>
        window.bitflanEmailComponent = function() {
            return {
                after: 'mark',

                init() {
                    this.editor = ace.edit(this.$refs.editor);
                    this.editor.setOption("showPrintMargin", false);
                },

                submit() {
                    const items = this.editor.getValue().replace(' - VALID', '').replace(' - INVALID', '').split(/\r?\n/);
                    
                    let text = '';

                    items.forEach(email => {
                        if(String(email).toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
                            if(this.after == 'mark')
                                text += '\n' + email + ' - VALID';
                            else
                                text += '\n' + email;
                        } else {
                            if(this.after == 'mark')
                                text += '\n' + email + ' - INVALID';
                        }
                    });

                    this.editor.session.setValue(text.trim());
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanEmailComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/email-validator.after_validate') }}</label>
        <select x-model="after" class="form-select custom-input">
            <option value="mark">{{ trans('webtools/tools/email-validator.mark') }}</option>
            <option value="delete">{{ trans('webtools/tools/email-validator.delete') }}</option>
        </select>
    </div>

    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/email-validator.label') }}</label>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <div class="form-group position-relative">
                    <button @click="window.writeClipboardText($event, editor.getValue())" class="btn custom--btn button__md ace-copy-btn btn__dark">{{ trans('webtools/general.copy') }}</button>
                    <div x-ref="editor" id="editor"></div>
                </div>
            </div>
        </div>
    </div>
    <button x-on:click="submit()" class="btn custom--btn button__lg">{{ trans('webtools/tools/email-validator.submit') }}</button>
</div>