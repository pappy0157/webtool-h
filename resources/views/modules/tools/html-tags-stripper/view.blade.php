@push('alpine-components')
    <script>
        window.bitflanToolHtmlTagsComponent = function() {
            return {
                content: '',

                stripTags() {
                    this.content = this.content.replace(/<\/?[^>]+(>|$)/g, "");
                }
            }
        };
    </script>
@endpush

<div x-data="window.bitflanToolHtmlTagsComponent()">
    <div class="mb-5 form-group">
        <label class="custom-label">{{ trans('webtools/tools/html-tags-stripper.label') }}</label>
        <div class="copy-textarea-btn">
            <textarea x-model="content" class="rounded custom-textarea" placeholder="{{ trans('webtools/tools/html-tags-stripper.placeholder') }}" rows="10"></textarea>
        </div>
        <button @click="stripTags()" class="btn custom--btn button__lg">{{ trans('webtools/tools/html-tags-stripper.submit') }}</button>
        <button x-on:click="window.writeClipboardText($event, content)" class="btn custom--btn button__lg copy-btn btn__dark float-end">{{ trans('webtools/general.copy') }}</button>
    </div>
</div>