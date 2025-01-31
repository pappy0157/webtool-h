@push('alpine-components')
    <script>
        window.bitflanDensityComponent = function() {
            return {
                converted: false,

                generate() {
                    let content = this.$refs.content.value;
                    
                    let split = content.split(/\s+/);
                
                    const obj = {};

                    split.forEach(word => {
                        word = word.trim().toLowerCase();

                        if(obj[word])
                            obj[word] += 1;
                        else
                            obj[word] = 1;
                    });

                    const occurences = Object.keys(obj).map(item => (`${item}: ${obj[item]}`)).join("\n");

                    this.$refs.textarea.value = occurences;

                    this.converted = true;
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanDensityComponent()">
    <div class="form-group">
        <textarea x-ref="content" name="" class="rounded custom-textarea" rows="5" placeholder="{{ trans('webtools/tools/word-density-counter.content') }}"></textarea>
    </div>

    <div class="form-group">
        <button x-on:click="generate()" class="btn custom--btn button__lg">{{ trans('webtools/tools/word-density-counter.submit') }}</button>
    </div>

    <div class="form-group" x-cloak x-show="converted">
        <textarea id="textarea" class="custom-textarea rounded" cols="30" rows="5" x-ref="textarea"></textarea>
        <button x-on:click="window.writeClipboardText($event, $refs.textarea.value)" class="btn custom--btn button__md btn__dark">Copy</button>
    </div>
</div>