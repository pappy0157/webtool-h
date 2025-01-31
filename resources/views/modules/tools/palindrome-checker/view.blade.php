@push('alpine-components')
    <script>
        window.bitflanTextReverserComponent = function() {
            return {
                converted: false,
                palindrome: false,

                generate() {
                    let content = this.$refs.content.value;
                
                    this.palindrome = content.split("").reverse().join("") == content;
                    this.converted  = true;
                }
            }
        }
    </script>
@endpush

<div x-data="window.bitflanTextReverserComponent()">
    <div class="form-group">
        <textarea x-ref="content" name="" class="rounded custom-textarea" rows="5" placeholder="{{ trans('webtools/tools/palindrome-checker.content') }}"></textarea>
    </div>

    <div class="form-group">
        <button @click="generate()" class="btn custom--btn button__lg">{{ trans('webtools/tools/palindrome-checker.submit') }}</button>
    </div>

    <div class="form-group" x-cloak x-show="converted">
        <template x-if="palindrome">
            <div class="alert alert-success">{{ trans('webtools/tools/palindrome-checker.ispalindrome') }}</div>
        </template>

        <template x-if="!palindrome">
            <div class="alert alert-danger">{{ trans('webtools/tools/palindrome-checker.notpalindrome') }}</div>
        </template>
    </div>
</div>