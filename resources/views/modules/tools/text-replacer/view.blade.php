@push('alpine-components')
    <script>
        window.bitflanTextReplacerComponent = function() {
            return {
                converted: false,

                escapeRegExp(string) {
                    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                },

                replaceAll(str, find, replace) {
                    return str.replace(new RegExp(this.escapeRegExp(find), 'g'), replace);
                },

                generate() {
                    let find    = this.$refs.find.value;
                    let repl    = this.$refs.replace.value;
                    let content = this.$refs.content.value;
                    
                    this.$refs.textarea.value = this.replaceAll(content, find, repl);
                
                    this.converted = true;
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanTextReplacerComponent()">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <input type="text" placeholder="Find" class="custom-input" x-ref="find">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <input type="text" placeholder="Replace by" class="custom-input" x-ref="replace">
            </div>
        </div>
    </div>
    <div class="form-group">
        <textarea x-ref="content" name="" class="rounded custom-textarea" rows="5" placeholder="{{ trans('webtools/tools/text-replacer.content') }}"></textarea>
    </div>

    <div class="form-group">
        <button x-on:click="generate()" class="btn custom--btn button__lg">{{ trans('webtools/tools/text-replacer.submit') }}</button>
    </div>

    <div class="form-group" x-cloak x-show="converted">
        <textarea id="textarea" class="custom-textarea rounded" cols="30" rows="5" x-ref="textarea"></textarea>
        <button x-on:click="window.writeClipboardText($event, $refs.textarea.value)" class="btn custom--btn button__md btn__dark">Copy</button>
    </div>
</div>